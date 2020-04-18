@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-info">Back to Questions</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="media">
                        <div class="d-flex flex-column mr-4 vote-controls">
                            <a title="This question is usefull" class="vote-up">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="vote-count">123</span>
                            <a title="This question is not usefull" class="vote-down">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <a title="Click to mark as favorite" class="favorite">
                                <i class="fas fa-star"></i>
                            </a>
                            <span class="favorite-count">123</span>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Questioned {{ $question->created_at->diffForHumans() }}</span>
                                <div class="media">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="{{ $question->user->name }}">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>{{ $question->answers_count . " " . str_plural('Answer', $question->answers_count)}}</h3>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column mr-4 vote-controls">
                            <a title="This answer is usefull" class="vote-up">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="vote-count">123</span>
                            <a title="This answer is not usefull" class="vote-down">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <a title="Click to mark as accepted answer" class="accepted">
                                <i class="fas fa-check fa-2x"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answer {{ $answer->created_at->diffForHumans() }}</span>
                                <div class="media">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" alt="{{ $answer->user->name }}">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
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
@endsection
