@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                         <h2>Edit Question</h2>
                         <div class="ml-auto">
                        <a href="{{ route('question.index') }}" class="btn btn-outline-secondary">Back to homepage</a>
                    </div>
                    </div>      
                    

                </div>

                <div class="card-body">
                    <form action="{{ route('question.update',$question->id) }}" method="post">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label for="question-title">
                                 Question Title
                            </label>
                            <input type="text" name="title" id="questionTitle" value="{{ old('title',$question->title) }}" class="form-control {{  $errors->has('title')  ? 'is-invalid' : '' }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong> {{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body">
                                 Question Body
                            </label>
                            <textarea name="body" id="questionBody" cols="30" rows="10" class="form-control {{  $errors->has('body')  ? 'is-invalid' : '' }}"> {{ old('body',$question->body) }}</textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong> {{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Update question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
