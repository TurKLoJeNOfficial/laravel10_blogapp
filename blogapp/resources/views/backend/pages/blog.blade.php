@extends('backend.layout.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tüm Yazılarım</h6>&nbsp;
        </div>
        <div class="card-body">
            <div class="card-body">
                <a href="{{ route('blog.create') }}" class="btn btn-primary"> + ADD</a>

                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Create Date</th>
                            <th>Edit | Delete | View</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Create Date</th>
                            <th>Edit | Delete | View</th>
                        </tr>

                        </tfoot>
                        <tbody>
                        @foreach($blogs as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->subtitle}}</td>
                                <td>{{$post->slug}}</td>
                                <td>
                                    @if($post->status == '1')
                                        <div class="alert alert-success">Aktif</div>
                                    @endif
                                    @if($post->status == '0')
                                        <div class="alert alert-danger">Pasif</div>
                                    @endif
                                </td>
                                <td>{{$post->created_at->format('d.m.Y')}}</td>
                                <td style="display: flex; align-items: center; gap: 10px;">
                                    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning">Edit</a>

                                    <!-- Silme işlemi -->
                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                    <!-- Görüntüleme işlemi -->
                                    @if($post->status == '1')
                                        <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-success" target="_blank">View</a>
                                    @endif

                                    <!-- NULL durumunda buton -->
                                    @if($post->status == '0')
                                        <a href="#" class="btn btn-danger">NULL</a>
                                    @endif
                                </td>


                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                    <div class="clearfix">
                        <div class="float-right">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
