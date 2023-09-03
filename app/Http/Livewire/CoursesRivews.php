<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Review;
use Livewire\Component;

class CoursesRivews extends Component
{
    public $course, $comment;
    public $rating = 5;

    public function mount(Course $plan)
    {
        $this->course = $plan;
    }
    public function render()
    {
        $course = $this->course->load(['students:id,name','reviews' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('livewire.courses-rivews', compact('course'));
    }
    public function store()
    {
       $this->course->reviews()->create([
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


/* public $course, $comment;
    public $rating = 5;

    protected $listeners = ['reviewAdded' => 'refreshReviews'];

    public function mount(Course $plan)
    {
        $this->course = $plan->load(['students:id,name','reviews' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
    }
    public function render()
    {
        return view('livewire.courses-rivews');
    }
    public function store()
    {
       $this->course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);

        $this->reset('comment', 'rating');
        $this->emit('reviewAdded');
    }
    public function destroy(Review $review)
    {
        $review->delete();
        $this->emit('reviewAdded');
    }
    public function refreshReviews()
    {
        $this->course->refresh();
    } */
