<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
class VoteAnswerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Answer $Answer)
    {
        $vote = (int)request()->vote;
        auth()->user()->voteAnswer($Answer,$vote);

        return back();
    }
}
