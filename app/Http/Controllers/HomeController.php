<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }

    public function perfiltienda()
    {
        return view('pages.perfiltienda');
    }
}
