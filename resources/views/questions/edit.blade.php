<!-- @use Illuminate\Support\Str; -->

@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h2>Edit Question</h2>
            <div class="ml-auto">
              <a href="{{Route('allquestion')}}" class="btn btn-outline-primary">Back All Question</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{Route('updateQuestion',$question->id)}}" method="post">
            {{method_field('PUT')}}
            @include('layouts._form',['Button'=>'Update Question'])
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection