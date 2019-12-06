@if(isset($flash))
    @foreach($flash as $item)
        <div class="alert alert-{{ $item['type'] }}" role="alert">{{ $item['message'] }}</div>
    @endforeach
@endif
