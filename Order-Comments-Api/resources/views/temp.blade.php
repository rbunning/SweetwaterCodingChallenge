@extends('layout')

@section('title', 'Comments')

@section('content')
<div>
    <h2>Candy</h2>

    @foreach ($sortedData->candy as $candyReferrence)
    <div>
        <li> Id: {{ $candyReferrence->orderid }}</li>
        <li>Comment: {{ $candyReferrence->comments }}</li>
        <li>Expected Ship Date: {{ $candyReferrence->shipdate_expected }}</li>
        <p></p>
    </div>
    @endforeach

    <h2>Call me / Don't call me</h2>

    @foreach ($sortedData->call as $callReferrence)
    <div>
        <li> Id: {{ $callReferrence->orderid }}</li>
        <li>Comment: {{ $callReferrence->comments }}</li>
        <li>Expected Ship Date: {{ $callReferrence->shipdate_expected }}</li>
        <p></p>
    </div>
    @endforeach

    <h2>Who referred me</h2>

    @foreach ($sortedData->referred as $referredReferrence)
    <div>
        <li> Id: {{ $referredReferrence->orderid }}</li>
        <li>Comment: {{ $referredReferrence->comments }}</li>
        <li>Expected Ship Date: {{ $referredReferrence->shipdate_expected }}</li>
        <p></p>
    </div>
    @endforeach

    <h2>Signature requirements upon delivery</h2>

    @foreach ($sortedData->signature as $signatureReferrence)
    <div>
        <li> Id: {{ $signatureReferrence->orderid }}</li>
        <li>Comment: {{ $signatureReferrence->comments }}</li>
        <li>Expected Ship Date: {{ $signatureReferrence->shipdate_expected }}</li>
        <p></p>
    </div>
    @endforeach

    <h2>Miscellaneous</h2>

    @foreach ($sortedData->misc as $miscReferrence)
    <div>
        <li> Id: {{ $miscReferrence->orderid }}</li>
        <li>Comment: {{ $miscReferrence->comments }}</li>
        <li>Expected Ship Date: {{ $miscReferrence->shipdate_expected }}</li>
        <p></p>
    </div>
    @endforeach
</div>
@endsection