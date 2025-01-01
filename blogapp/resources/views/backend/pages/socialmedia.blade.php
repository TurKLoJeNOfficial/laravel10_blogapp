@extends('backend.layout.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sosyal Medya Hesaplarım</h6>&nbsp;
        </div>
        <div class="card-body">
            <div class="card-body">
                <a href="{{ route('socialmedia.create') }}" class="btn btn-primary"> + ADD</a>

                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Edit | Delete | View</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Edit | Delete | View</th>
                        </tr>

                        </tfoot>
                        <tbody>
                        @foreach($socialmedias as $socialmedia)
                            <tr>
                                <td>

                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-{{$socialmedia->icon}} fa-stack-1x fa-inverse"></i>
                                    </span>
                                </td>
                                <td>{{$socialmedia->title}}</td>
                                <td>{{$socialmedia->link}}</td>
                                <td>
                                    @if($socialmedia->status == '1')
                                        <div class="alert alert-success">Aktif</div>
                                    @endif
                                    @if($socialmedia->status == '0')
                                        <div class="alert alert-danger">Pasif</div>
                                    @endif
                                </td>
                                <td style="display: flex; align-items: center; gap: 10px;">
                                    <a href="{{ route('socialmedia.edit', $socialmedia->id) }}" class="btn btn-warning">Edit</a>

                                    <!-- Silme işlemi -->
                                    <form action="{{ route('socialmedia.destroy', $socialmedia->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>


                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                    <div class="clearfix">
                        <div class="float-right">
                            {{ $socialmedias->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
