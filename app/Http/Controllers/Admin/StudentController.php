<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CorreoAprobacionPlan;
use App\Models\Comprador;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\callback;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Comprador::where('nombre_usuario', 'LIKE','%'.$search.'%')
                                ->latest()
                                ->paginate(8);
      
        return view('admin.students.index', compact('students'));
    }

    public function aprobar(Comprador $student)
    {
        try {
            DB::beginTransaction();
            $this->user_id = $student->id_usuario;
            $this->plan_id = $student->id_plan;
            
            $curso = Course::find($this->plan_id); //encuentra La materia en la se inscribió;
            $curso->students()->attach($this->user_id); //asigna el estudiante al plan

            $alumno = User::where('id',$this->user_id)->select('name','email')->first();

            DB::afterCommit(function () use ($curso,$alumno){
                Mail::to($alumno->email)
                    ->cc('smith93svam@gmail.com')
                    ->send(new CorreoAprobacionPlan($curso,$alumno));
            });

            $nombre = $student->nombre_usuario;
            $nombrep = $student->nombre_curso;
            $variable = "El estudiante $nombre ha sido matriculado con exito al plan $nombrep"; 
            $student->delete();
            DB::commit();
            return redirect()->route('admin.students.index')->with('info', $variable);
        } catch (\Throwable $th) {
            DB::rollBack();
            $variable1 = "Ocurrio un error con la matricula del estudiante vuelve a intentarlo mas tarde"; 
            return redirect()->route('admin.students.index')->with('info1', $variable1);
        }
       
    }

    public function destroy(Comprador $student)
    {
        $student->delete();
        
        $variable1="La reservacion de $student->nombre_usuario a sido eliminada con exito";
        return redirect()->route('admin.students.index')->with('info', $variable1);

    }
}
