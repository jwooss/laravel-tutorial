<ul>
    @foreach($items as $item)
        <li>{{$item}}</li>
    @endforeach
    @forelse($nums as $num)
        <li>{{$num}}</li>
    @empty
        <li>엥?</li>
    @endforelse
</ul>