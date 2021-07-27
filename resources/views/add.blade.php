@extends('layouts.main')

@section('title', 'menambah_article')

@section('content')
<div class="col-md-8 col-sm-12 bg-white p-4">
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">judul artikel</label>
            <input type="text" class="form-control" name="title" placeholder="judul artikel">
        </div>
        <div class="form-group">
            <label for="">Isi artikel</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        @endsection
        @section('sidebar')
        <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
            <div class="form-group">
                <label class="text-center">Upload</label>
                <input type="submit" class="form-control btn btn-primary" value="Upload">
            </div>
        </div>
    </form>
</div>

@endsection
