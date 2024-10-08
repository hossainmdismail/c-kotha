@extends('dashboard.layout.app')
@section('content')
    {{-- <div class="container-fluid"> --}}
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="" class="disabled">Category</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">View Categories List</a></li>
        </ol>
        <div class="col-lg-12">
            <div class="card">
                @if (session('danger'))
                    <div class="alert alert-danger">{{ session('danger') }}</div>
                @endif

                <div class="card-header">
                    <h4 class="card-title">
                        Category List
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Sl. No</strong></th>
                                    <th><strong>Catergory</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $sl => $categories)
                                    <tr>
                                        <td><strong>{{ $sl + 1 }}</strong></td>

                                        <td>
                                            <div class="d-flex align-items-center"><img
                                                    src="{{ url('/' . $categories->image) }}" class="rounded-lg me-2"
                                                    width="20" alt=""> <span
                                                    class="w-space-no">{{ $categories->name }}</span></div>
                                        </td>

                                        <td><span
                                                class="badge light {{ $categories->status == 'inactive' ? 'badge-danger' : 'badge light' }} badge-success">{{ $categories->status }}</span>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('category.edit', $categories->id) }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-pencil"></i></a>

                                                <form action="{{ route('category.destroy', $categories->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></button>
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
    </div>
    {{-- </div> --}}
@endsection
