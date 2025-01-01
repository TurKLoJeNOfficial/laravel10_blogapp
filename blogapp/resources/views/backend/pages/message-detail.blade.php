@extends('backend.layout.layout')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$message->name }} kişinin mesajı</h6>
            </div>
            <div class="card-body">
                <div class="form-group input-group">
                    <input type="text" name="name" class="form-control" value="Gönderim Tarihi: {{ $message->created_at }}" disabled>
                </div>
                <br>
                <div class="form-group input-group">
                    <input type="text" name="name" class="form-control" value="Gönderen Adı: {{ $message->name }}" disabled>
                </div>
                <br>
                <div class="form-group input-group">
                    <input type="text" name="email" class="form-control" value="Gönderen Email: {{ $message->email }}" disabled>
                </div>
                <br>
                <div class="form-group input-group">
                    <textarea cols="4" name="message" type="text" class="form-control" disabled>Gönderen Mesaj: {{ $message->message }}</textarea>
                </div>
                <br>
            </div>

        </div>

    </div>
@endsection
