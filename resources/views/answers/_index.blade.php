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
                        @can ('accept', $answer)
                            <a title="Click to mark as accepted answer." class="answer {{ $answer->best_answer }}"
                                onclick="event.preventDefault(); document.getElementById('accepted-answer-{{ $answer->id }}').submit();"
                                >
                                <i class="fas fa-check fa-2x"></i>
                            </a>
                            <form action="{{ route('answers.accept', $answer->id) }}" method="POST" style="display: none" id="accepted-answer-{{ $answer->id }}">
                                @csrf
                            </form>
                       @else
                            @if($answer->is_best)
                                <a title="User accept this answer is best." class="answer {{ $answer->best_answer }}">
                                    <i class="fas fa-check fa-2x"></i>
                                </a>
                            @endif
                        @endcan
                    </div>
                    <div class="media-body">
                        {!! $answer->body_html !!}
                        <div class="row">
                            <div class="col-4">
                                @can ('update', $answer)
                                    <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                @endcan
                                @can ('delete', $answer)
                                    <form class="form-delete d-inline" method="post" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endcan
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
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
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>