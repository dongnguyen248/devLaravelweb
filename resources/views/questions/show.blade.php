<!-- @use Illuminate\Support\Str; -->

@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <div class="d-flex align-items-center">
              <h2>{{ $question->title }}</h2>
              <div class="ml-auto">
                <a href="{{Route('allquestion')}}" class="btn btn-outline-primary">Back All Question</a>
              </div>
            </div>
          </div>
          <hr>

          <div class="media">
            @include('shared._vote',[
            'model'=>$question //add model is $question send to _vote
            ])
            <div class="media-body">
              <div class="d-flex align-items-center">
                <div class="ml-auto">
                  <!-- update-question and delete-question are rules we set in AtuhServiceProvider -->
                  @if(!Auth::guest())
                  @if(Auth::user()->can('update-question',$question))
                  <a href="{{Route('editQuestion',$question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                  @endif
                  @if(Auth::user()->can('delete-question',$question))
                  <form class="formdelete" action="{{Route('delQuestion',$question->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onclick="return confirm('Are you soure?')"
                      class="btn btn-outline-danger btn-sm">Delete</button>

                  </form>
                  @endif
                  @endif
                </div>

              </div>
              <div class="content">
                <p>{{ $question->body}}</p>
                <div class="float-right">
                  <!-- @include('shared._authord',[
                  'model'=>$question,
                  'label'=>'Asked'
                  ]) -->
                  <user-info :model="{{$question}}" label="Asked by"></user-info>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('answers._index',[
'answers'=>$question->answers, // get all answer in a question sent to _index answer
'answersCount'=>$question->answers_count //number answers a question.
])
@include('answers._create')
</div>
@endsection