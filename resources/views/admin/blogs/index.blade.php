@extends('admin.layouts.admin')
@section('title','المدونة')
@section('content')
<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li href="" class="breadcrumb-item" aria-current="page">
                المدونة
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        <div class="up_element mb-2">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
          إضافة
        </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>صورة</th>
                        <th>العنوان</th>
                        <th>المحتوي</th>
                        <th>تاريخ الانشاء</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)

                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>
                            @if($blog->image)
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->name }}" class="img-thumbnail" width="100px">
                            @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $blog->name }}" class="img-thumbnail" width="100px">
                            @endif
                        </td>
                        <td>{{ $blog->substrTitle() }}</td>
                        <td>{!! $blog->substrBody() !!}</td>
                        <td>{{ $blog->created_at() }}</td>
                        <td>
                            <a href="{{ route('admin.blogs.show', $blog->id ) }}" class="btn btn-purple btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.blogs.edit', $blog->id ) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $blog->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            @include('admin.blogs.delete-modal',['blog'=>$blog])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection
