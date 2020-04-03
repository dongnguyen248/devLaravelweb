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
            <div class="d-flex flex-column vote-controls">
              <a title="This question is usefull" class="vote-up">
                <i class="fas fa-caret-up fa-3x"></i>
              </a>
              <span class="vote-count">121</span>
              <a title="This question is not usefull" class="vote-down off">
                <i class="fas fa-caret-down fa-3x"></i>
              </a>
              <a title="Click to add mark favorite question (Click again undo)" class="favorite">
                <i class="fas fa-star fa-2x"></i>
                <span class="favorite-count">1211</span>
              </a>
            </div>
            <div class="media-body">
              <div class="d-flex align-items-center">
                <div class="ml-auto">
                  <!-- update-question and delete-question are rules we set in AtuhServiceProvider -->
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
                </div>

              </div>
              <div class="content">
                <p>{{ $question->body}}</p>
                <div class="float-right">
                  <span class="text-muted">Ansered {{$question->created_date}}</span>
                  <div class="media mt-2">
                    <a href="{{$question->user->url}}" class="pr-2">
                      <img src="{{$question->user->avatar}}" alt="avatar user">
                    </a>
                    <div class="media-body mt-1">
                      <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-ml-12 mt-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h2>{{ $question->answers_count . " ". Str::plural('Answer', $question->answers_count) }}</h2>
          <hr>
          @foreach( $question->answers as $answer)
          <div class="media">
            <div class="media-body">
              {{ $answer->body }}
              <div class="float-right">
                <span class="text-muted">Ansered {{$answer->created_date}}</span>
                <div class="media mt-2">
                  <a href="{{$answer->user->url}}" class="pr-2">
                    <img src="{{$answer->user->avatar}}" alt="avatar user">
                  </a>
                  <div class="media-body mt-1">
                    <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection