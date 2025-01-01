@extends('backend.layout.layout')

@section('content')

    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New Blog</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Yeni Yazı </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <!-- Resim Önizlemesi Alanı -->
                    <div class="form-group input-group">
                        <img id="preview-image" src="" width="250" style="display: block;">
                    </div>
                    <br>

                    <!-- Resim Yükleme Alanı -->
                    <div class="form-group input-group">
                        <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(this)">
                    </div>
                    <br>

                    <!-- Blog Başlığı -->
                    <div class="form-group input-group">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Başlık girin">
                    </div>
                    <br>

                    <!-- Blog Alt Başlığı -->
                    <div class="form-group input-group">
                        <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Alt başlık girin">
                    </div>
                    <br>

                    <!-- Blog İçeriği -->
                    <div class="form-group">
                        <textarea name="content" class="form-control" id="editor" style="min-height: 300px; width: 100%;" placeholder="Blog içeriği girin"></textarea>
                    </div>
                    <br>

                    <!-- Kaydet Butonu -->
                    <button type="submit" class="btn btn-info">Save</button>
                </form>
            </div>
        </div>

    </div>



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
