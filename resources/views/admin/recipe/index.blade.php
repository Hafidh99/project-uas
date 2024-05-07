@extends('layouts.admin.app')

@section('title','Recipe')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        {{-- <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <a href="{{ route('recipe.create') }}" class="btn btn-success btn-sm mb-3">
            Create Information
        </a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Information</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Picture</th>
                                <!-- <th>Category</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                       <tbody>
                            @foreach ($recipe as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td><img width="100" src="{{ asset(Storage::url($item->picture))}}" ></td>
                                    <td><span class="badge badge-success">{{ $item->category }}</span></td>
                                    <td>
                                        <div class="input-group">
                                            <a href="{{ route('recipe.edit',$item->id) }}" class="btn btn-success mr-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('recipe.destroy',$item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
