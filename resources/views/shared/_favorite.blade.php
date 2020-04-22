{{-- favorite question --}}
<a title="Click to add mark favorite question (Click again undo)"
  class="favorite mt-2 {{Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '')}}"
  onclick="event.preventDefault(); document.getElementById('favorites-question-{{$model->id}}').submit();">
  <i class="fas fa-star fa-2x"></i>
  <span class="favorite-count ">{{$model->favorites_count}}</span>
</a>
<form id="favorites-question-{{$model->id}}" action='/questions/{{$model->id}}/favorites' method="POST"
  style="display: none;">
  @csrf
  @if($model->is_favorited)
  @method('DELETE')
  @endif
</form>
