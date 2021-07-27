@extends('layouts.main')
@section('title', 'Home')
@section('content')

        <div class="container">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center">Cari Judul Disini</h1>
                    <div class="input-group mb-3">
                        <input type="text" id="search_input" class="form-control" placeholder="Pencarian" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-dark" type="button" id="search_button">Search</button>
                        </div>
                        <hr>
                    </div>

                </div>
            </div>
        </div>





@endsection
