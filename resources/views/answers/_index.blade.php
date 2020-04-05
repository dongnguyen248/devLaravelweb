<div class="col-ml-12 mt-4">
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <h2>{{ $answersCount . " ". Str::plural('Answer', $answersCount) }}</h2>
        <hr>
        @include('layouts._message')
        @foreach( $answers as $answer)
        <div class="media">
          <div class="d-flex flex-column vote-controls">
            <a title="This answer is usefull" class="vote-up">
              <i class="fas fa-caret-up fa-3x"></i>
            </a>
            <span class="votes-count">121</span>
            <a title="This answer is not usefull" class="vote-down off">
              <i class="fas fa-caret-down fa-3x"></i>
            </a>
            <a title="Click to accept this is best answer" class="{{$answer->status}} mt-2"
              onclick="event.preventDefault(); document.getElementById('accepted-answer-{{$answer->id}}').submit();">
              <form id="accepted-answer-{{$answer->id}}" action="{{route('answers.bestanswer',$answer->id)}}"
                method="POST" style="display: none;">
                @csrf
              </form>
              <i class="fas fa-check fa-2x"></i>
            </a>
          </div>
          <div class="media-body">
            {{ $answer->body }}
            <div class="row">
              <div class="col-4">
                <div class="ml-auto">
                  <!-- update-answer and delete-answer are rules we set in AtuhServiceProvider -->
                  @if(Auth::user()->can('update',$answer))
                  <a href="{{Route('questions.answers.edit',[$question->id,$answer->id])}}"
                    class="btn btn-sm btn-outline-info">Edit</a>
                  @else(cannot('update',$answer))
                  @endif
                  @if(Auth::user()->can('delete',$answer))
                  <form class="formdelete" action="{{Route('questions.answers.destroy',[$question->id,$answer->id])}}"
                    method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onclick="return confirm('Are you soure?')"
                      class="btn btn-outline-danger btn-sm">Delete</button>

                  </form>
                  @else(cannot('delete',$answer))
                  @endif
                </div>
              </div>
              <div class="col-4">
                <!-- //future create something -->
              </div>
              <div class="col-4">
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
        </div>
        <hr>
        @endforeach
      </div>
    </div>
  </div>
</div>