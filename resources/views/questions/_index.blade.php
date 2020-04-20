    <div class="row justify-content-center mb-4">
        <div class="col-md-12">
            @include('layouts._messages');
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
                            <a title="This question is usefull" class="vote-up {{ Auth::guest() ? 'off' : '' }}"
                            onclick="event.preventDefault(); document.getElementById('up-vote-question-{{ $question->id }}').submit()"
                            >
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <form action="{{ route('questions.vote', $question->id) }}" id="up-vote-question-{{ $question->id }}" method="post" style="display:none">
                                @csrf
                                <input type="hidden" name="vote" value="1">
                            </form>
                            <span class="vote-count">{{ $question->votes_count }}</span>
                            <a title="This question is not usefull" class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                            onclick="event.preventDefault(); document.getElementById('down-vote-question-{{ $question->id }}').submit()"
                            >
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <form action="{{ route('questions.vote', $question->id) }}" id="down-vote-question-{{ $question->id }}" method="post" style="display:none">
                                @csrf
                                <input type="hidden" name="vote" value="-1">
                            </form>
                            <a title="Click to mark as favorite" class="favorite {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '') }}"
                                onclick="event.preventDefault(); document.getElementById('favorite-{{ $question->id }}').submit()">
                                <i class="fas fa-star"></i>
                            </a>
                            <form action="{{ route('questions.favorite', $question->id) }}" id="favorite-{{ $question->id }}" method="post" style="display:none">
                                @csrf
                            </form>
                            <span class="favorite-count">{{ $question->favorites_count }}</span>
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