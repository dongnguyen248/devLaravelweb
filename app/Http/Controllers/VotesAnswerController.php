<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class VotesAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Answer $answer)
    {
        $vote = (int) request()->vote;
        auth()->user()->voteAnser($answer ,$vote);
        return back();
    }
}