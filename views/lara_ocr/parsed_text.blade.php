@extends('lara_ocr.layout')
@section('content')
    <h2>Output</h2>
    @if(!empty($parsedText))
        <p style="text-align: left;">{{$parsedText}}</p>
    @else
        <p style="text-align: left; color: grey;">NO TEXT FOUND</p>
    @endif
    <a href="{{route('home')}}">Parse another image</a>
@endsection