@extends('homepage.layout.layout')

@section('content')


<header class="masthead" style="background-image: url('{{asset($about->image ?? '')}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>{{$about->title}}</h1>
                    <span class="subheading">{{{$about->subtitle}}}</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {!! $about->content !!}
              </div>
        </div>
    </div>
</main>

@endsection
