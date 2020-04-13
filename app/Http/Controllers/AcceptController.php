<?php

namespace App\Http\Controllers;

use App\Answer;

class AcceptController extends Controller
{
    public function __invoke(Answer $answer)
    {
        // dd('aaaaa');
        $answer->question->acceptBestAnswer($answer);
        return back();

    }
}