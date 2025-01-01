@extends('backend.layout.layout')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Social Media</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Yeni Sosyal Medya</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('socialmedia.store') }}" method="POST">
                    @csrf
                    <!-- Blog Title -->
                    <div class="form-group">
                        <label for="status">Başlık</label>
                        <input type="text" name="title" class="form-control" value="">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="icon">Platform</label>
                        <select id="icon" name="icon" class="form-control" required>
                            <option value="facebook">Facebook</option>
                            <option value="twitter">Twitter</option>
                            <option value="instagram">Instagram</option>
                            <option value="youtube" >YouTube</option>
                            <option value="linkedin">Linkedln</option>
                            <option value="github">Github</option>
                        </select>
                    </div><br>

                    <!-- Blog Subtitle -->
                    <div class="form-group">
                        <label for="status">URL</label>
                        <input type="text" name="link" class="form-control"">
                    </div>
                    <br>
                    <!-- Submit Button -->
                    <button class="btn btn-info">Save</button>
                </form>
            </div>
        </div>

    </div>

@endsection
