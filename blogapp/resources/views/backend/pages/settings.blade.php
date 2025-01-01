@extends('backend.layout.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Settings</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->



        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Site Ayarları</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Meta Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $settings->title }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="title">Menu Title</label>
                        <input type="text" name="header" class="form-control" value="{{ $settings->header }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name="author" class="form-control" value="{{ $settings->author }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="description">Meta Description</label>
                        <textarea cols="2" id="description" style="width: 100%;" name="description" type="text" class="form-control">{{ $settings->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Meta Keyworad</label>
                        <textarea cols="2" id="keywords" style="width: 100%;" name="keywords" type="text" class="form-control">{{ $settings->keywords }}</textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="author">Footer</label>
                        <input type="text" name="footer" class="form-control" value="{{ $settings->footer }}">
                    </div>
                    <button class="btn btn-info">Save</button>
                </form>

            </div>
        </div>

    </div>


@endsection
