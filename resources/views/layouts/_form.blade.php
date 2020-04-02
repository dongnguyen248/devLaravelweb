@csrf
<div class="form-group">
  <label for="question-title">Question Title</label>
  <input type="text" name="title" value="{{ old('title', $question->title) }}" placeholder="title question"
    class="form-control @error('title') is-invalid @enderror" required id="question-title">
  @error('title')
  <span class="invalid-feedback">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
<div class="form-group">
  <label for="question-body">Explain Your Question</label>
  <textarea type="text" name="body" class="form-control @error('body') is-invalid @enderror" id="question-body" required
    rows="10">{{old('body', $question->body)}}</textarea>
  @error('body')
  <span class="invalid-feedback">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
<div class="form-group">
  <button type="submit" class="btn btn-outline-primary btn-lg">{{$Button}}</button>
</div>