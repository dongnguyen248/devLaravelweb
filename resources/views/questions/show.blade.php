<!-- @use Illuminate\Support\Str; -->

@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h2>Question Detail</h2>
            <div class="ml-auto">
              <a href="{{Route('allquestion')}}" class="btn btn-outline-primary">Back All Question</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="media">
            <div class="media-body">
              <div class="d-flex align-items-center">
                <h3 class="mt-0"> {{ $question->title }}</h3>
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
                <div class="media">
                  <a href="{{$answer->user->url}}" class="pr-2">
                    <img src="{{$answer->user->avarta}}" alt="avarta user">
                  </a>
                  <div class="media-body">
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