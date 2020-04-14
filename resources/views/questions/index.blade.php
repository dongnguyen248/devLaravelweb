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
          @forelse($questions as $question)
          @include('questions._excerpt')
          @empty
          <dv class="alert alert-warning">
            <strong>Sorry</strong> There are no question available.
          </dv>
          @endforelse
          <div class="mx-auto">
            {{$questions->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
