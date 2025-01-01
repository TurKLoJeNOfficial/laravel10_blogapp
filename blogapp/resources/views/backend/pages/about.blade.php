@extends('backend.layout.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">About</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->



        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hakkımda Düzenle</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('about.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group input-group">
                        <img src="{{ asset($about->image) }}" width="250">
                    </div>
                    <div class="form-group input-group">
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="form-group input-group">
                        <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                    </div>
                    <br>
                    <div class="form-group input-group">
                        <input type="text" name="subtitle" class="form-control" value="{{ $about->subtitle }}">
                    </div>
                    <br>
                    <div class="form-group input-group">
                        <textarea cols="4" id="editor" style="min-height: 300px; width: 100%;" name="content" type="text" class="form-control">{{ $about->content }}</textarea>
                    </div>
                    <br>
                    <button class="btn btn-info">Save</button>
                </form>

            </div>
        </div>

    </div>

    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <!-- CKEditor Initialization -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                // CKEditor için genişlik ve yükseklik ayarları
                height: '500px',  // Yüksekliği 500px yapıyoruz
                width: '100%'     // Genişlik %100 olarak ayarlanıyor
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
