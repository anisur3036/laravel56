@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h1>{{ $question->title }}</h1>
                </div>
                <div class="card-body">
                        <div class="media-body">
                            {!! $question->body_html !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
