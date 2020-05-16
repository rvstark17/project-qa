@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                         <h2>All Questions</h2>
                         <div class="ml-auto">
                        <a href="{{ route('question.create') }}" class="btn btn-outline-secondary">Ask question</a>
                    </div>
                    </div>      
                    

                </div>

                <div class="card-body">
                    @include ('layouts._messages')
                  @foreach($questions as $question)
                        @include('questions._excerpt')
                  @endforeach
                    
                         {{ $questions->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
