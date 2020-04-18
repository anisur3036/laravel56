@extends('layouts.app')

@section('content')
<div class="container">
    @include('questions._index')
    @include('answers._index')
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Your Answer</h3>
            <form action="{{ route('questions.answers.store', $question->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="3"></textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
