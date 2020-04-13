<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\User;


class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->delete();
        $users = User::pluck('id')->all();
        // dd($user);
        $numberOfUsers = count($users);
        // dd($numberOfUsers);
        //  dd(rand(1,$numberOfUsers));
        foreach(Question::all() as $question){
            for($i= 0; $i < rand( 1, $numberOfUsers); $i++){
                //  dd($question);
                $user = $users[$i];
                // dd($user);
                $question->favorites()->attach($user);
            }
        }
    }
}