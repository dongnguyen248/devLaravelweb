<div class="container mt-4">
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <h2>{{ $answersCount . " ". Str::plural('Answer', $answersCount) }}</h2>
        <hr>
        @include('layouts._message')
        @foreach( $question->answers as $answer)
        <div class="media">
          @include('shared._vote',[
            'model'=>$answer // add model is $answer send to _vote
          ])
          <div class="media-body">
            {!! $answer->body_html !!}
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
                      @endif
                    </div>
                  </div>
                  <div class="col-4">
                    <!-- //future create something -->
                  </div>
                  <div class="col-4">
                    @include('shared._authord',[
                                      //add $label is string Answered send to _authord
                    'model'=>$answer, // add $model is $answer send it to _authord 
                    'label'=>'Answered']) 
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