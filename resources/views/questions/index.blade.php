<!-- @use Illuminate\Support\Str; -->

@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h2>All Question</h2>
            <div class="ml-auto">
              <a href="{{Route('showform')}}" class="btn btn-outline-primary">Ask Question</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          @include('layouts._message')
          @foreach($questions as $question)
          <div class="media">
            <div class="media-body">
              <div class="d-flex align-items-center">
                <h3 class="mt-0"> <a href="{{ $question->url }}">{{ $question->title }}</a></h3>
              </div>
              <p class="lead">
                Asked by <a href="{{$question->user->url}}"> {{$question->user->name}}</a>
                <small class="text-muted"> {{ $question->created_date }}</small>
                <i class="fa fa-comment-o status {{ $question->status }}"> </i> <strong> {{ $question->answers }}
                </strong>
                <i class="fa fa-star vote status {{ $question->vote }}" aria-hidden="true"></i> <strong>
                  {{ $question->votes }}</strong>
                <i class="fa fa-eye view"> </i> {{ $question->views }}
              </p>
              <p>{{ str_limit($question->body,250) }}</p>
            </div>
          </div>
          <hr>
          @endforeach
          <div class="mx-auto">
            {{$questions->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection