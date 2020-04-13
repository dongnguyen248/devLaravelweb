@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-ml-12 mt-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h2>Edit Answer for question : <strong>{{$question->title}}</strong></h2>
        </div>
        <form action="{{ Route('questions.answers.update', [$question->id,$answer->id]) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body')is-invalid @enderror"
              required>{{ old('body',$answer->body)}}</textarea>
            @error('body')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-lg btn-outline-primary" type="submit">Update Answer</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@stop