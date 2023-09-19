@extends('layout')

@section('title', 'Comments')

@section('content')
<div>
    @foreach (array_keys($sortedData) as $key)
    <button type="button" class="collapsible category">{{$key}}</button>
    <div class="content">
        @foreach ($sortedData[$key] as $order)
        <p></p>
        <button type="button" class="collapsible comment">{{ $order->comments }}</button>
        <div class="content">
            <li> Id: {{ $order->orderid }}</li>
            <li>Comment: {{ $order->comments }}</li>
            <li>Expected Ship Date: {{ $order->shipdate_expected }}</li>
            <p></p>
        </div>
        @endforeach
    </div>
    <p></p>
    @endforeach
</div>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

@endsection