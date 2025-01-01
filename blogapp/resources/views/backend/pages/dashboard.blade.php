@extends('backend.layout.layout')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">

                                <div class="h5 mb-0 font-weight-bold text-gray-800">Hoşgeldiniz Sayın {{ strtoupper(auth()->user()->name) }} </div>
                                <br>
                                <div class="text-l font-weight-bold text-primary text-uppercase mb-1">
                                    {{ now()->format('H:i:s | d.m.Y') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tüm Yazılarım</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Create Date</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Create Date</th>
                            <th>View</th>
                        </tr>

                        </tfoot>
                        <tbody>
                        @foreach($blog as $post)
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
                                <td>{{$post->created_at->format('H:i:s | d.m.Y')}}</td>
                                <td>
                                    @if($post->status == '1')
                                        <a href="{{ route('post', ['slug' => $post->slug]) }}" class="btn btn-success" target="_blank">View</a>
                                    @endif
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
                            {{ $blog->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
