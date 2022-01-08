<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Course $plan)
    {
        return $plan->students->contains($user->id);
    }

    public function published(?User $user, Course $plan)
    {
        if ($plan->status == 3) {
            return true;
        }else{
            return false;
        }
    }

    public function dicatated(User $user, Course $plan)
    {
        if ($plan->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    public function revision(User $user, Course $plan)
    {
        if ($plan->status == 2) {
            return true;
        }else{
            return false;
        }
    }

    public function valued(User $user, Course $plan)
    {
        if (Review::where('user_id', $user->id)->where('course_id', $plan->id)->count()) {
            return false;
        }else {
            return true;
        }
    }

}
