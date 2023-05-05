<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonObserve
{
    //Observer
    public function creating(Lesson $lesson){
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        if($platform_id == 1){
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>';
        }else{
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            /* $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>'; */
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '&amp;badge=0&amp;loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" 
                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" data-ready="true"></iframe>';
        }
    }

    public function updating(Lesson $lesson){
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        if($platform_id == 1){
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }else{
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            /* $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>'; */
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '&amp;badge=0&amp;loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" 
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" data-ready="true"></iframe>';
        }
    }

    public function deleting(Lesson $lesson)
    {
        if($lesson->resource)
        {
            Storage::delete($lesson->resource->url);
            $lesson->resource->delete();
        }
    }
}
