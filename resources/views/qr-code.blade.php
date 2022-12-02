@extends('layouts.default')

@section('content')

<div class="visible-print text-center">
	<h1> Laravel QR Code Generator Example </h1>
     
    {!! QrCode::size(250)->generate('codingdriver.com'); !!}
    {{QrCode::size(100)->generate('https://home.gattscom.com')}}
</div>

@endsection