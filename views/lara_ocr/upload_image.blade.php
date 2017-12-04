@extends('lara_ocr.layout')
@section('content')
    <h2>Upload Image</h2>
    <form class="" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <input type="file" name="image" placeholder="select image">
        <button type="submit">Parse Text</button>
    </form>
@endsection