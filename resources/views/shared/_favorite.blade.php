<a  title="click to mark as favorite(Click again to undo)" 
    class="favorite  mt-2 {{ Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '') }}" onclick="event.preventDefault(); document.getElementById('favorite-{{ $name }}-{{ $model->id }}').submit()">
    <i class="fa fa-star fa-2x"></i>
        <span class="favorite-count ">{{ $model->favorites()->count() }}</span>
    </a>
    <form id="favorite-{{ $name }}-{{ $model->id }}"  action="/{{ $name }}/{{ $model->id }}/favorite" method="post" style="display:none">
        @csrf
        @if($model->is_favorited)
            @method('DELETE')
        @endif
    </form>