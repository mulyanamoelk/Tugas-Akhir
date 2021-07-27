@extends('layouts.main')
@section('content')
@foreach ($data as $record)
    <div class="my-3">
        <h2 class="m-0 p-0">
            <a href="{{url('/index/'.$record->id)}}">{{$record->title}}</a>
        </h2>
        <p class="m-0 p-0">Written at: {{$record->created_at}}</p>
    </div>
@endforeach
@endsection
