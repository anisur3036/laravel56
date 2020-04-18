@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>{{ $question->title }}</h3>
                        <div class="ml-auto">
                            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-secondary">Back Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media-body">
                        <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" cols="30" rows="10"
                                    class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body', $answer->body) }}</textarea>
                                @if($errors->has('body'))
                                    <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                                @endif
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-lg" type="submit">Edit Answer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection