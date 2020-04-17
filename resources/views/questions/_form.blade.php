@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title"
        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
        value="{{ old('title', $question->title) }}">
    @if($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    @endif
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" cols="30" rows="10"
        class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body', $question->body) }}</textarea>
    @if($errors->has('body'))
        <div class="invalid-feedback">{{ $errors->first('body') }}</div>
    @endif
</div>
<div class="form-group"><button class="btn btn-primary btn-lg" type="submit">{{ $title }}</button></div>
