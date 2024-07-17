@extends('Themes.theme1.layout.app')

@section('style')
    <link rel="canonical" href="{{ 'https://chotikotha.com/' . request()->getPathInfo() }}">
@endsection

@section('content')
    <section class="not-found d-flex align-items-center padding-30" style="height: 65vh;">
        <div class="container text-center">
            <h1 class="mb-4 mt-0 font-black">404 Not Found</h1>
            <p class="mb-4">Oops, the page you are looking for does not exist.</p>
            <a href="{{ route('home') }}" class="btn btn-default"><i class="fa-sharp fa-solid fa-house" aria-hidden="true"></i>
                Return Home</a>
        </div>
    </section>
@endsection
