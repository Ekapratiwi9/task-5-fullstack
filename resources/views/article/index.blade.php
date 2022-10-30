@extends('layouts.template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Article Table</h1>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables
                            <a href="{{ url('article/create') }}" class="btn btn-primary btn-sm text-white float-right">Add Article</a>
                            </h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>title</th>
                                            <th>content</th>
                                            <th>image</th>
                                            <th>User</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @php 
                                             $i=1
                                        @endphp
                                        @foreach($article as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->content }}</td>
                                            <td>
                                            <img src="{{ asset('upload/'.$data->image) }}" width="120px">
                                            </td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->categories->name }}</td>
                                            <td>
                                                <a href="{{ url('article/'.$data->id.'/edit') }}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                <a href="{{ url('article/'.$data->id.'/delete') }}" class="btn btn-danger" ><i class="fas fa-fw fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    

 
 @include('sweetalert::alert')
@endsection