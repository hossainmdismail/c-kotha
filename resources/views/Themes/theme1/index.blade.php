@php
    function convert_to_bengali($number)
    {
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($englishDigits, $bengaliDigits, $number);
    }
    use App\Models\Config;
    $config = Config::where('status', 'active')->first();
@endphp
@extends('Themes.theme1.layout.app')
@section('style')
    <script async type="application/javascript" src="https://a.magsrv.com/ad-provider.js"></script>
@endsection
@section('content')
    {{-- Age modal --}}
    <div class="modal fade" id="ageVerification" tabindex="-1" aria-labelledby="ageVerificationLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content" style="color: rgba(0, 0, 0, 0.816);padding: 18px">
                <div class="mt-5 d-flex justify-content-center">
                    <img src="{{ asset($config->logo) }}" alt="choti kotha / choti golpo" width="140">
                </div>
                <div class="modal-body text-center">
                    <strong style="font-size: 24px" class="mb-4">This is an adult story website</strong>
                    <p style="color: rgb(15, 14, 14);font-size: 16px">This website contains age-restricted materials
                        including nudity and explicit depictions of sexual
                        activity. By entering, you affirm that you are at least 18 years of age or the age of majority
                        in the jurisdiction you are accessing the website from and you consent to viewing sexually
                        explicit content.</p>
                    <div class="row gx-3">
                        <div class="col-md-6 mb-1">
                            <button type="button" id="enterButton" class="btn btn-default btn-full"
                                data-bs-dismiss="modal">I'm 18 or
                                older - Enter</button>
                        </div>
                        <div class="col-md-6 mb-1">
                            <a href="https://www.google.com/" rel="nofollow" type="button"
                                class="btn btn-secondary btn-full">I'm under 18 - Exit</a>
                        </div>
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    <div class="col-md-9">
                        <p>Google <a href="https://safety.google/families/parental-supervision/" rel="nofollow">parental
                                controls
                                page</a> explains how you can easily
                            block access to this site.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="hero">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">
                    @if ($banner)
                        <!-- featured post large -->
                        <div class="post featured-post-lg">
                            <div class="details clearfix">
                                <a href="{{ route('category.view', $banner->category ? $banner->category->slug : '#') }}"
                                    class="category-badge bd-font">{{ $banner->category ? $banner->category->name : 'Non' }}</a>
                                <h2 class="post-title bd-font" style="letter-spacing: 2px;"><a
                                        href="{{ route('blog.view', $banner->slug) }}">{{ $banner->title }}</a>
                                </h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $banner->author }}</a></li>
                                    <li class="list-inline-item">{{ $banner->gettingDate() }}</li>
                                </ul>
                            </div>
                            <a href="{{ route('blog.view', $banner->slug) }}">
                                <div class="thumb rounded">
                                    @if ($banner->image)
                                        <div class="inner data-bg-image"
                                            data-bg-image="{{ asset('Themes/Theme1/images/posts/featured-lg.jpg') }}"></div>
                                    @else
                                        <div class="inner data-bg-image" data-bg-image="{{ asset($banner->image) }}"></div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endif

                </div>

                <div class="col-lg-4">
                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill bd-font" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true"
                                    class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab"
                                    role="tab" type="button">জনপ্রিয়</button></li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false"
                                    class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab"
                                    role="tab" type="button">নতুন</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">
                                @foreach ($bestMonth as $key => $blog)
                                    <x-blog-list :blog="$blog" key="{{ convert_to_bengali($key + 1) }}" />
                                @endforeach
                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                @foreach ($recent as $key => $blog)
                                    <x-blog-list :blog="$blog" key="{{ convert_to_bengali($key + 1) }}" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title bd-font">জনপ্রিয়</h3>
                        <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>

                    <div class="row gy-5">
                        {{-- item --}}
                        @foreach ($bests as $blog)
                            <div class="col-lg-6 mb-2">
                                <x-blog-main :blog="$blog" />
                            </div>
                        @endforeach
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center" style="overflow: hidden">
                        <ins class="eas6a97888e2" data-zoneid="5370854" data-sub="123450000"></ins>
                        <script>
                            (AdProvider = window.AdProvider || []).push({
                                "serve": {}
                            });
                        </script>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    {{-- <div class="section-header">
                            <h3 class="section-title">বিখ্যাত</h3>
                                <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>

                            <div class="row gy-5">
                            @foreach ($bests as $blog)
                                <div class="col-lg-6 mb-2">
                                    <x-blog-main :blog="$blog" />
                                </div>
                            @endforeach
                        </div> --}}


                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title bd-font">অনুপ্রেরণা</h3>
                        <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        <div class="slick-arrows-top">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="row post-carousel-twoCol post-carousel">
                        @foreach ($recent as $blog)
                            {{-- item --}}
                            <div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('blog.view', $blog->slug) }}" class="fw-bolder bd-font"
                                                style="color: #203656 !important;font-size: 1.25rem">
                                                {{ $blog->title }}</a>
                                            <p class="text-secondary mt-3">
                                                {{ $blog->description() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" style="font-size: 13px">
                                        <div class="col-6 text-secondary">
                                            by <span class="text-uppercase fw-bolder">{{ $blog->author }}</span>
                                        </div>
                                        <div class="col-6 fw-bolder" style="text-align: end">
                                            <p class="text-secondary" style="display: flex;justify-content: flex-end;">
                                                <img src="{{ asset('Themes/Theme1/images/eyebig.svg') }}"
                                                    alt="{{ $blog->author }}">{{ $blog->view_count }} view
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title bd-font">নতুন</h3>
                        <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        <div class="slick-arrows-top">
                            <a href="{{ route('blog.all') }}" class="btn btn-sm btn-default">View all</a>
                        </div>
                    </div>

                    <div class="row gy-5">
                        @foreach ($recent as $blog)
                            <div class="col-lg-6 mb-2">
                                <x-blog-main :blog="$blog" />
                            </div>
                        @endforeach
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center" style="overflow: hidden">
                        <ins class="eas6a97888e2" data-zoneid="5370854" data-sub="123450000"></ins>
                        <script>
                            (AdProvider = window.AdProvider || []).push({
                                "serve": {}
                            });
                        </script>
                    </div>


                </div>

                <div class="col-lg-4">
                    <!-- widget about -->
                    <div class="widget rounded">
                        <div class="widget-about data-bg-image text-center"
                            data-bg-image="{{ asset('Themes/Theme1/images/map-bg.png') }}">
                            <p class="mb-4 bd-font">চটি কথা, একটি অনন্য অনলাইন প্ল্যাটফর্ম যেখানে আপনি আপনার অভিজ্ঞতা ও
                                স্বীকারোক্তি শেয়ার করতে পারেন। গোপনীয়তা বজায় রেখে, আপনার কাহিনী শুনুন ও অন্যদের
                                কাহিনী পড়ুন
                            </p>
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
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

                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title bd-font">চিরকাল বিখ্যাত</h3>
                            <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            @foreach ($bests as $key => $blog)
                                <x-blog-list :blog="$blog" key="{{ convert_to_bengali($key + 1) }}" />
                            @endforeach
                        </div>
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded bd-font">
                        <div class="widget-header text-center">
                            <h3 class="widget-title bd-font">বিভাগ</h3>
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
                                        type="email" aria-label="Descriptive Name" name="email">
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
                                @foreach ($recent as $blog)
                                    <div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('blog.view', $blog->slug) }}">
                                                        <h5 class="fw-bolder bd-font"
                                                            style="color: #203656 !important;font-size: 1.25rem">
                                                            {{ $blog->title }}</h5>
                                                    </a>
                                                    <p class="text-secondary mt-3">{{ $blog->description() }}</p>
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
                                                            alt="">{{ $blog->view_count }} view</p>
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
