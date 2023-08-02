<h1>{{$key1}}</h1>
@foreach($ClickAbleLists as $ClickAble)
    <h2>
        {{$ClickAble['sound']}}
    </h2>
    <p>
        {{$ClickAble['text']}}
    </p>
@endforeach
