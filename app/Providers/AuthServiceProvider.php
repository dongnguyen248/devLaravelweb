<?php

namespace App\Providers;

use App\Answer;
use App\Policies\AnswerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Answer::class => AnswerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('create-question', function(){

        // });

        //define policies for update and delete
        Gate::define('update-question', function ($user, $question) {
            // dd($question->user_id);
            return $user->id == $question->user_id;

        });
        Gate::define('delete-question', function ($user, $question) {
            return $user->id == $question->user_id;

        });
    }
}