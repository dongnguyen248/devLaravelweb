<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Question::with('user')->latest()->paginate(5);

        // print_r($questions);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function showform()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    public function create()
    {
        $question = new Question();
        return view(compact('question'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect()->route('allquestion')->with('success', 'Your question has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = Question::findOrfail($id);
        if (Gate::denies('update-question', $question)) {
            abort(403, 'Access denies');
        }
        return view('questions.edit', compact('question'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, $id)
    {
        //
        $question = Question::findOrfail($id);
        if (Gate::denies('update-question', $question)) {
            abort(403, 'Access denies');
        }

        $question->update($request->only('title', 'body'));

        return redirect()->route('allquestion')->with('success', 'Your question has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $question = Question::findOrfail($id);
        // dd($question);
        if (Gate::denies('delete-question', $question)) {
            abort(403, 'Access denies');
        }
        $question->delete();
        return redirect()->route('allquestion')->with('success', 'Your question has been deleted');

    }
}