<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
        $this->authotize('accept',$answer);
        $answer->question->acceptBestAnswer($answer);

        return back();
    } 

}
