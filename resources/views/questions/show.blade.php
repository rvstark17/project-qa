@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
               <div class="card-title">
                    <div class="d-flex align-items-center">
                         <h1>{{ $question->title }}</h1>
                         
                         <div class="ml-auto">
                        <a href="{{ route('question.index') }}" class="btn btn-outline-secondary">Back to homepage</a>
                    </div>
                    </div>      
                    

                </div>
                <hr>
                <div class="media">
                    <div class="d-flex-column vote-controls">
                        <a title="This question is useful" class="vote-up">
                            <i class="fa fa-caret-up fa-3x"></i>
                        </a>
                        <span class="votes-count">123</span>
                        <a title="This question is not useful" class="vote-down off">
                        <i class="fa fa-caret-down fa-3x"></i>
                        </a>
                        <a  title="click to mark as favorite(Click again to undo)" 
                        class="favorite  mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '') }}" onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question->id }}').submit()">
                        <i class="fa fa-star fa-2x"></i>
                            <span class="favorite-count ">{{ $question->favorites()->count() }}</span>
                        </a>
                        <form id="favorite-question-{{ $question->id }}"  action="/question/{{ $question->id }}/favorite" method="post" style="display:none">
                            @csrf
                            @if($question->is_favorited)
                                @method('DELETE')
                            @endif
                        </form>
                    </div>
                    <div class="media-body">
                        {!! $question->body_html !!}
                     <div class="float-right">
                            <span class="text-muted">questioned {{ $question->created_date }}</span>
                            <div class="media mt-2">
                                <a href="{{ $question->user->url }}" class="pr-2">
                                    <img src="{{ $question->user->avatar }}">
                                </a>
                                <div class="media-body mt-1">
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
    @include('answers._index',[
        'answers'=>$question->answers,
        'answerCount'=>$question->answers_count
        ])
    @include('answers._create')
</div>
@endsection
