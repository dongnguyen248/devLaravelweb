@if($model instanceof App\Question)
@php
$name = 'question';
$firstURISegment = 'questions';
@endphp
@elseif($model instanceof App\Answer)
@php
$name = 'answer';
$firstURISegment = 'answers';
@endphp


@endif

<div class="d-flex flex-column vote-controls">
  {{-- vote question --}}
  <a title="This {{$name}} is usefull" class="vote-up {{Auth::guest() ? 'off': ''}}"
    onclick="event.preventDefault(); document.getElementById('vote-up-{{$name}}-{{$model->id}}').submit();">
    <i class="fas fa-caret-up fa-3x"></i>
  </a>
  <form id="vote-up-{{$name}}-{{$model->id}}" action='/{{$firstURISegment}}/{{$model->id}}/vote' method="POST"
    style="display: none;">
    @csrf
    <input type="hidden" name="vote" value="1">
  </form>
  <span class="votes-count">{{$model->votes_count}}</span>
  <a title="This {{$name}} is not usefull" class="vote-down {{Auth::guest() ? 'off': ''}}"
    onclick="event.preventDefault(); document.getElementById('vote-down-{{$name}}-{{$model->id}}').submit();">
    <i class="fas fa-caret-down fa-3x"></i>
  </a>
  <form id="vote-down-{{$name}}-{{$model->id}}" action='/{{$firstURISegment}}/{{$model->id}}/vote' method="POST"
    style="display: none;">
    @csrf
    <input type="hidden" name="vote" value="-1">
  </form>
  @if($model instanceof App\Question)
  @include('shared._favorite',[
  'model'=>$model //add model is $model send to _favorite
  ])
  @elseif($model instanceof App\Answer)
  @include('shared._accept',[
  'model'=>$model //add model is $model send to _accept
  ])

  @endif


</div>