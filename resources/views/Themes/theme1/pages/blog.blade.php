@php
    function convert_to_bengali($number)
    {
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($englishDigits, $bengaliDigits, $number);
    }
@endphp
@extends('Themes.theme1.layout.app')
@section('style')
    <script async type="application/javascript" src="https://a.magsrv.com/ad-provider.js"></script>
@endsection
@section('content')
    <section class="main-content mt-3">
        <div class="container-xl">

            <nav aria-label="breadcrumb"
                style="display: flex; justify-content: space-between;align-items: center;margin-bottom: 10px">
                <ol class="breadcrumb" style="margin-bottom: 0 !important">
                    <li class="breadcrumb-items"><a href="{{ route('home') }}">Home</a></li><span
                        class="breadcrumb-breaker">/</span>
                    <li class="breadcrumb-items"><a href="#">Blogs</a></li>
                </ol>

                <div class="d-md-none">
                    <form method="get">
                        @csrf
                        <div style="display: flex;align-items: center;column-gap: 4px;">
                            <select class="form-control form-control-sm" name="category_id">
                                <option value="">Filter clear</option>
                                @foreach ($cats as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ request()->has('category_id') && request()->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <div class="ml-1">
                                <button class="btn btn-default btn-sm">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>

            <div class="row gy-4">
                <div class="col-lg-8">
                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center" style="overflow: hidden; padding: 10px 0">
                        <ins class="eas6a97888e2" data-zoneid="5370854" data-sub="123450000"></ins>
                        <script>
                            (AdProvider = window.AdProvider || []).push({
                                "serve": {}
                            });
                        </script>
                    </div>
                    <div class="row gy-4">
                        @foreach ($blogs as $blog)
                            <div class="col-12 col-md-6 mb-2">
                                <x-blog-main :blog="$blog" />
                            </div>
                        @endforeach
                    </div>

                    <div class="spacer" data-height="50" style="height: 30px;"></div>

                    <div class="row">
                        {{ $blogs->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- widget about -->
                    <div class="widget rounded">
                        <div class="widget-about data-bg-image text-center"
                            data-bg-image="{{ asset('Themes/Theme1/images/map-bg.png') }}">
                            <p class="mb-4 bd-font">টি কথা, একটি অনন্য অনলাইন প্ল্যাটফর্ম যেখানে আপনি আপনার অভিজ্ঞতা ও
                                স্বীকারোক্তি শেয়ার করতে পারেন। গোপনীয়তা বজায় রেখে, আপনার কাহিনী শুনুন ও অন্যদের
                                কাহিনী পড়ুন
                            </p>
                        </div>
                    </div>

                    <div class="widget rounded">
                        {{-- ex ads number one --}}
                        <div id="ad-one" class="ad"
                            style="display: flex; justify-content: center; padding-bottom: 13px;">
                            <ins class="eas6a97888e2" data-zoneid="5370890" data-sub="123450000"></ins>
                            <script>
                                (AdProvider = window.AdProvider || []).push({
                                    "serve": {}
                                });
                            </script>
                        </div>
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded bd-font">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">বিভাগ</h3>
                            <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                @foreach ($cats as $cat)
                                    <li><a
                                            href="{{ route('category.view', $cat->slug) }}">{{ $cat->name }}</a><span>({{ $cat->blogs ? $cat->blogs->count() : '0' }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title bd-font">চিরকাল বিখ্যাত</h3>
                            <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            @foreach ($bests as $key => $best)
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="{{ route('blog.view', $best->slug) }}">
                                            <div class="inner">
                                                <span class="inner-text bd-font">{{ convert_to_bengali($key + 1) }}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0 bd-font"><a
                                                href="{{ route('blog.view', $best->slug) }}">{{ $best->title }}</a>
                                        </h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $best->gettingDate() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- widget newsletter -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title bd-font">সংযুক্ত থাকুন</h3>
                            <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <span class="newsletter-headline text-center mb-3">Join ৭০,০০০ subscribers!</span>
                            <form>
                                <div class="mb-2">
                                    <input class="form-control w-100 text-center" placeholder="Email address…"
                                        type="email">
                                </div>
                                <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                            </form>
                            <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a
                                    href="{{ route('privacy') }}">Privacy Policy</a></span>
                        </div>
                    </div>

                    <!-- widget post carousel -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Celebration</h3>
                            <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <div class="post-carousel-widget">
                                <!-- post -->
                                @foreach ($recent as $blog)
                                    <div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('blog.view', $blog->slug) }}">
                                                        <h5 class="fw-bolder" style="color: #C60B0D !important;">
                                                            {{ $blog->title }}</h5>
                                                    </a>
                                                    <p class="text-secondary mt-3">{{ $blog->seo_description }}</p>
                                                </div>
                                            </div>
                                            <div class="row" style="font-size: 13px">
                                                <div class="col-6 text-secondary">
                                                    by <span class="text-uppercase fw-bolder">{{ $blog->author }}</span>
                                                </div>
                                                <div class="col-6 fw-bolder" style="text-align: end">
                                                    <p class="text-secondary"
                                                        style="display: flex;justify-content: flex-end;"><img
                                                            src="{{ asset('Themes/Theme1/images/eyebig.svg') }}"
                                                            alt="">156 view</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- carousel arrows -->
                            <div class="slick-arrows-bot">
                                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons"
                                    aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons"
                                    aria-label="Next"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- widget advertisement -->
                    <div class="widget no-container rounded text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        {{-- ex ads number one --}}
                        <div id="ad-one" class="ad"
                            style="display: flex; justify-content: center; padding-bottom: 13px;">
                            <ins class="eas6a97888e2" data-zoneid="5370852"></ins>
                            <script>
                                (AdProvider = window.AdProvider || []).push({
                                    "serve": {}
                                });
                            </script>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
