@if($answersCount>0)
<div class="container mt-4">
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <h2 class="post">{{ $answersCount . " ". Str::plural('Answer', $answersCount) }}</h2>
        @include('layouts._message')
        @foreach( $question->answers as $answer)
        @include('answers._answers')
        @endforeach

      </div>
    </div>
  </div>
</div>

@endif