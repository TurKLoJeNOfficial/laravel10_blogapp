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
                <h6 class="m-0 font-weight-bold text-primary">Sosyal Medya Düzenle</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('socialmedia.update', $socialmedia->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$socialmedia->id}}">
                    <!-- Blog Title -->
                    <div class="form-group">
                        <label for="status">Başlık</label>
                        <input type="text" name="title" class="form-control" value="{{ $socialmedia->title }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="status">Platform</label>
                        <select id="status" name="icon" class="form-control" required>
                            <option value="facebook" {{ $socialmedia->icon == 'facebook' ? 'selected' : '' }}>
                                Facebook
                            </option>
                            <option value="twitter" {{ $socialmedia->icon == 'twitter' ? 'selected' : '' }}>Twitter</option>
                            <option value="instagram" {{ $socialmedia->icon == 'instagram' ? 'selected' : '' }}>Instagram</option>
                            <option value="youtube" {{ $socialmedia->icon == 'youtube' ? 'selected' : '' }}>YouTube</option>
                            <option value="linkedin" {{ $socialmedia->icon == 'linkedin' ? 'selected' : '' }}>Linkedln</option>
                            <option value="github" {{ $socialmedia->icon == 'github' ? 'selected' : '' }}>Github</option>
                        </select>
                    </div><br>

                    <!-- Blog Subtitle -->
                    <div class="form-group">
                        <label for="status">URL</label>
                        <input type="text" name="link" class="form-control" value="{{ $socialmedia->link }}">
                    </div>
                    <br>

                    <!-- Blog Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="1" {{ $socialmedia->status == '1' ? 'selected' : '' }}>Yayınla</option>
                            <option value="0" {{ $socialmedia->status == '0' ? 'selected' : '' }}>Yayından Kaldır</option>
                        </select>
                    </div><br>

                    <!-- Submit Button -->
                    <button class="btn btn-info">Save</button>
                </form>
            </div>
        </div>

    </div>

@endsection
