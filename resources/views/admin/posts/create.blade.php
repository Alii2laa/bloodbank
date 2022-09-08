@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/_select2.scss')}}">
@endsection
@section('current-page-title')
    Add Post
@endsection
@section('main-page')
    Posts
@endsection
@section('sub-page')
    Add post
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Title</label>
                                <input type="text" id="inputName" name="title" value="{{old('title')}}" class="form-control">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Content</label>
                                <input type="text" id="inputName" name="content_data" value="{{old('content_data')}}" class="form-control">
                                @error('content_data')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" style="width: 100%" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image Upload</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose File...</label>
                                    </div>

                                </div>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Create" class="btn btn-success">
                </div>
            </div>
        </form>

    </section>
@endsection
@section('scripts')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        bsCustomFileInput.init();

    });
</script>

@endsection
