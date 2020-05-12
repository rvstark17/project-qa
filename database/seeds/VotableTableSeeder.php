<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
use App\Answer;
class VotableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::all();
        $userCount = $user->count();
        $votes = [-1,1];
        
        foreach(Question::all() as $question)
        {
            for($i=0;$i<rand(1,$userCount);$i++)
            {
                $u = $user[$i];
                $u->voteQuestion($question,$votes[rand(0,1)]);
            }
        }

        foreach(Answer::all() as $Answer)
        {
            for($i=0;$i<rand(1,$userCount);$i++)
            {
                $u = $user[$i];
                $u->voteAnswer($Answer,$votes[rand(0,1)]);
            }
        }
    }
}
