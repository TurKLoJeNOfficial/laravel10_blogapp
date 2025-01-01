@extends('backend.layout.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">HomePage</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->



        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Anasayfa Düzenle</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('home.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group input-group">
                        <img src="{{ asset($home->image) }}" width="250">
                    </div>
                    <div class="form-group input-group">
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="form-group input-group">
                        <input type="text" name="title" class="form-control" value="{{ $home->title }}">
                    </div>
                    <br>
                    <div class="form-group input-group">
                        <input type="text" name="subtitle" class="form-control" value="{{ $home->subtitle }}">
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-info">Save</button>
                </form>

            </div>
        </div>

    </div>
@endsection
