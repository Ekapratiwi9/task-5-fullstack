@extends('layouts.template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Form Category
                            <a href="{{ url('/category') }}" class="btn btn-success btn-sm text-white float-right">Back</a>
                            </h6>
                            
                        </div>

                      
                        <div class="card-body">
                                 <form action="{{ url('/category/'.$category->id) }}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                                            <input type="text" name="name" value="{{ $category->name }}" class="form-control form-control-user">
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-md float-end">Save</button>
                                        </div>
                                </form>                         
                        </div>
                    </div>

@endsection