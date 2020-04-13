<a title="Click to accept this is best answer" class="{{$model->status}} mt-2"
  onclick="event.preventDefault(); document.getElementById('accepted-answer-{{$model->id}}').submit();">
  <i class="fas fa-check fa-2x"></i>
</a>
<form id="accepted-answer-{{$model->id}}" action="{{route('answers.bestanswer',$model->id)}}"
  method="POST" style="display: none;">
  @csrf
</form>