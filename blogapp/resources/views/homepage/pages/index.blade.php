@extends('homepage.layout.layout')

@section('content')
    <header class="masthead" style="background-image: url('{{asset($home->image ?? '')}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{$home->title}}</h1>
                        <span class="subheading">{{$home->subtitle}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                @foreach($blog as $post)
                    <div class="post-preview d-flex align-items-start mb-4" style="width: 100%; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
                        <img src="{{asset($post->image ?? '')}}" alt="Blog Image" class="img-fluid me-4" style="width: 300px; height: auto; object-fit: cover;">
                        <div>
                            <a href="{{ route('post', $post->slug) }}">
                                <h2 class="post-title">{{$post->title}}</h2>
                            </a>
                            <p class="post-meta">
                                {{ strip_tags(substr($post->content, 0, 50)) . '...' }}
                            </p>
                            <p class="post-meta">
                                Posted by
                                <a href="#" style="color: darkred">{{$post->user->name}}</a>
                            </p>
                        </div>
                    </div>
                @endforeach

                <!-- Pager -->
                    <div class="clearfix">
                        <div class="float-right">
                            {{ $blog->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
            </div>

        </div>
    </div>
@endsection
