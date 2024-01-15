@extends('admin.layouts.admin')
@section('title', 'عرض المقال')
@section('content')
    <section class="show-user">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الواجهة</a></li>
                <li href="" class="breadcrumb-item" aria-current="page">
                    عرض المقال
                </li>
            </ol>
        </nav>
        <div class="content_view">
            <div class="row g-3">
                <h1 class="text-center">{{ $blog->title }}</h1>
            </div>
            <div class="row g-3">
                @if ($blog->image)
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"class="img-thumbnail img-preview" width="200px">
                @else
                    <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                @endif
            </div>
            <div class="row g-3">
                <p class="">{!! $blog->body !!}</p>
            </div>

        </div>

    </section>
@endsection
