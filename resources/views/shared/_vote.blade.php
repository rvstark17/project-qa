@if($model instanceof App\Question)
    @php
        $name = 'question';
    @endphp
@elseif($model instanceof App\Answer)
    @php
        $name = 'answer';
    @endphp    
@endif
<div class="d-flex-column vote-controls">
    <a title="This {{ $name }} is useful" 
    class="vote-up {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('vote-up-{{ $name }}-{{ $model->id }}').submit()" >
        <i class="fa fa-caret-up fa-3x"></i>
    </a>
    <form id="vote-up-{{ $name }}-{{ $model->id }}"  action="/{{ $name }}/{{ $model->id }}/vote" method="post" style="display:none">
        @csrf
        <input type="hidded" name="vote" value="1">
    </form>
    <span class="votes-count">{{  $model->votes_count }}</span>
    <a title="This {{ $name }} is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('vote-down-{{ $name }}-{{ $model->id }}').submit()">
    <i class="fa fa-caret-down fa-3x"></i>
    </a>
    <form id="vote-down-{{ $name }}-{{ $model->id }}"  action="/{{ $name }}/{{ $model->id }}/vote" method="post" style="display:none">
        @csrf
        <input type="hidded" name="vote" value="-1">
    </form>
    @if($model instanceof App\Question)
        @include('shared._favorite',['model'=>$model])
    @elseif($model instanceof App\Answer)
        @include('shared._accept',['model'=>$model])   
    @endif
</div>