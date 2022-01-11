<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Review;
use Livewire\Component;

class CoursesRivews extends Component
{
    public $course_id, $comment;

    public $rating = 5;

    public function mount(Course $plan)
    {
        $this->course_id = $plan->id;
    }
    public function render()
    {
        $course = Course::find($this->course_id);
        return view('livewire.courses-rivews', compact('course'));
    }

    public function store()
    {
        $course = Course::find($this->course_id);

        $course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);

        $this->reset('comment', 'rating');
    }

    public function destroy(Review $review)
    {
        $review->delete();
    }
}
