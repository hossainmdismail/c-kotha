@extends('dashboard.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="" class="disabled">Blogs</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">View Blogs List</a></li>
            </ol>
            <div class="col-lg-12">
                <div class="card">
                    @if (session('danger'))
                        <div class="alert alert-danger">{{ session('danger') }}</div>
                    @endif
                    <div class="card-header" style="justify-content: space-between">
                        <div class="row" style="width: 100%">
                            <div class="col-md-4">
                                <h4 class="card-title">Blogs List</h4>
                            </div>
                            <div class="col-md-8">
                                <form action="" method="get">
                                    <div class="row">
                                        <div class="col-md-8 d-flex">
                                            <select class="form-control" name="category" id="">
                                                <option value="">Selecet Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ request()->has('category') && request()->category == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <input class="form-control" type="text" name="search"
                                                value="{{ request()->search }}" placeholder="Search">
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="{{ route('blog.create') }}" class="btn btn-danger">Clear</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Sl. No</strong></th>
                                        <th><strong>Blog Title</strong></th>
                                        <th><strong>Category Name</strong></th>
                                        <th><strong>Author's Name</strong></th>
                                        <th><strong>Image</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog as $sl => $blogs)
                                        <tr>
                                            <td><strong>{{ $sl + 1 }}</strong></td>

                                            <td><span class="w-space-no">{{ $blogs->title }}</span>
                        </div>
                        </td>

                        <td><span class="w-space-no">{{ $blogs->category->name }}</span></td>

                        <td><span class="w-space-no">{{ $blogs->author }}</span></td>

                        <td>
                            <div class="d-flex align-items-center"><img src="{{ url('/' . $blogs->image) }}"
                                    class="rounded-lg me-2" width="20" alt="">
                        </td>
                        <td><span
                                class="badge light {{ $blogs->status == 'inactive' ? 'badge-danger' : 'badge light' }} badge-success">{{ $blogs->status }}</span>
                        </td>

                        <td>
                            <div class="d-flex">
                                <a href="{{ route('blog.edit', $blogs->id) }}"
                                    class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>

                                <a href="{{ route('blog.show', $blogs->id) }}"
                                    class="btn btn-info shadow btn-xs sharp me-1"><i class="fa fa-eye"></i></a>

                                <form action="{{ route('blog.destroy', $blogs->id) }}" method="POST">
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
                    <div>
                        {{ $blog->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
