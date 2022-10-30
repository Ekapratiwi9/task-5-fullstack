@extends('layouts.template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category Table</h1>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables
                            <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm text-white float-right">Add Category</a>
                            </h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Name</th>
                                            <th width="30%">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @php 
                                             $i=1
                                        @endphp
                                        @foreach($category as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <a href="{{ url('category/'.$data->id.'/edit') }}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                <a href="{{ url('category/'.$data->id.'/delete') }}" class="btn btn-danger" ><i class="fas fa-fw fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
 @include('category.create')
 
 @include('sweetalert::alert')
@endsection