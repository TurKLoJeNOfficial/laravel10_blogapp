@extends('backend.layout.layout')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blog</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Yazı Düzenle</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$blog->id}}">

                    <!-- Blog Image -->
                    <div class="form-group input-group">
                        <img src="{{ asset($blog->image) }}" width="250">
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group input-group">
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>

                    <!-- Blog Title -->
                    <div class="form-group input-group">
                        <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                    </div>
                    <br>

                    <!-- Blog Subtitle -->
                    <div class="form-group input-group">
                        <input type="text" name="subtitle" class="form-control" value="{{ $blog->subtitle }}">
                    </div>
                    <br>

                    <!-- CKEditor for Blog Content -->
                    <div class="form-group">
                        <textarea name="content" id="editor" class="form-control" style="min-height: 300px; width: 100%;">{{ $blog->content }}</textarea>
                    </div>
                    <br>

                    <!-- Blog Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="1" {{ $blog->status == '1' ? 'selected' : '' }}>Yayınla</option>
                            <option value="0" {{ $blog->status == '0' ? 'selected' : '' }}>Yayından Kaldır</option>
                        </select>
                    </div><br>

                    <!-- Submit Button -->
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
