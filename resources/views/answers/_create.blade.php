<div class="col-ml-12 mt-4">
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <h3>Your Answer</h3>
      </div>
      <form action="{{ Route('questions.answers.store', $question->id) }}" method="post">
        @csrf
        <div class="form-group">
          <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body')is-invalid @enderror"
            required></textarea>
          @error('body')
          <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-lg btn-outline-primary" type="submit">Submit</button>
        </div>

      </form>
    </div>
  </div>
</div>