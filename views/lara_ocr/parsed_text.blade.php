@extends('lara_ocr.layout')
@section('content')
    <h2>Output</h2>
    <p style="text-align: left;">{{$parsedText}}</p>
    <a href="{{route('home')}}">Parse another image</a>
@endsection