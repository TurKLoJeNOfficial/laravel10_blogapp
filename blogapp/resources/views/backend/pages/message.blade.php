@extends('backend.layout.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gelen Mesajlarım</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Create Date</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Create Date</th>
                        <th>View</th>
                    </tr>

                    </tfoot>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td style="">{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->message}}</td>
                            <td>{{$message->created_at->format('H:i:s | d.m.Y')}}</td>
                            <td>
                                <a href="{{ route('messages.show', $message->id) }}" class="btn btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>

                </table>
                <div class="clearfix">
                    <div class="float-right">
                        {{ $messages->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
