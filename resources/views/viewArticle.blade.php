@extends('layouts.main')

@section('title', $data->title)

@section('content')
@section('style')
@csrf_token();
    <h2 class="m-5 p-0"> {{$data->title}} </h2>
    <p class="content p-2">{!! $data->content !!}</p>
@endsection
