@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>Ask Question</h3>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back to all Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media-body">
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"  class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div> 
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body') }}</textarea>
                                @if ($errors->has('body'))
                                    <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                                @endif
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-lg" type="submit">Add Question</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
