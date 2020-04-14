<div class="media post">
  <div class="media-body">
    <div class="d-flex align-items-center">
      <h3 class="mt-0"> <a href="{{ $question->url }}">{{ $question->title }}</a></h3>
    </div>
    <p class="lead">
      Asked by <a href="{{$question->user->url}}"> {{$question->user->name}}</a>
      <small class="text-muted"> {{ $question->created_date }}</small>
      <i class="fas fa-comment status {{ $question->status }}"> </i> <strong> {{ $question->answers_count }}
      </strong>
      <i class="fas fa-star favorite  {{ $question->is_favorited ? 'favorited' : ''}}"></i> <strong>
        {{ $question->favorites_count }}</strong>
      <i class="fas fa-eye view"> </i> {{ $question->views }}
    </p>
    <div class="excerpt">{{ $question->excerpt(400) }}</div>
  </div>
</div>