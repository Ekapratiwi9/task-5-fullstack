@extends('layouts.template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Article</h1>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

@if($errors->any())
   <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
   </ul>
@endif

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Article
                            <a href="{{ url('/category') }}" class="btn btn-success btn-sm text-white float-right">Back</a>
                            </h6>
                            
                        </div>

                      
                        <div class="card-body">
                            <form action="{{ url('/article/'.$article->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label for="title" class="col-md-4 col-form-label text-md-end">Tittle</label>
                                            <input type="text" name="title" value="{{ $article->title }}" class="form-control form-control-user">
                                        </div>
                                        <div class="form-group">
                                        <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>
                                            <textarea name="content"  class="form-control form-control-user" id="article-text" cols="30" rows="10">{{ $article->content }}</textarea>
                                        </div>
                                        <div class="form-group">
                                        <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                                            <input type="file" name="image" class="form-control form-control-user">
                                            <img src="{{ asset('upload/'.$article->image) }}" width="120px">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="hidden" name="user_id" readonly value="{{ Auth::user()->id }}" class="form-control form-control-user">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id" class="col-md-4 col-form-label text-md-end">Category</label>
                                            <select class="default-select wide form-control" name="category_id">
                                                <option value="{{$article->category_id}}" selected disabled>{{$article->categories->name}}</option>
                                                @foreach($category as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-md float-end">Save</button>
                                        </div>
                            </form>                         
                        </div>
                    </div>

@endsection

@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#article-text' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection