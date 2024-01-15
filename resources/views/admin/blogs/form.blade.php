@extends('admin.layouts.admin')
@section('title', isset($blog) ? __("تعديل مقال") : __("اضافة مقال")  )
@section('content')
    <section class="" id="app">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-light p-3">
                <li href="" class="breadcrumb-item" aria-current="page">
                    {{ isset($blog) ? __('تعديل مقال') : __('اضافة مقال') }}
                </li>
            </ol>
        </nav>
        <div class="content_view">
            <form action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store')  }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row row-gap-24">
                    @csrf
                    @isset($blog)
                        @method('put')
                    @endisset
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="" class="small-label">عنوان المقال <span class="text-danger">*</span></label>
                        <input type="text" required name="title" class="form-control" value="{{ isset($blog) ? old('title', $blog->title) : old('title') }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="" class="small-label">محتوي المقال <span class="text-danger">*</span></label>

                        <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ isset($blog) ? old('body', $blog->body) : old('body') }}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>صورة المقال </label>
                                <input class="form-control img" name="image" type="file" accept="image/*">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                        @isset($blog)
                            @if ($blog->image)
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"class="img-thumbnail img-preview" width="200px">
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                            @endif
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="200px">
                        @endisset
                        </div>
                        
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center mt-3">
                        <button type="submit" class="btn btn-success">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('js')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');


</script>
    @endpush
@endsection
