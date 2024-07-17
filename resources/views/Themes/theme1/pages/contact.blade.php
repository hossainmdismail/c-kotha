@extends('Themes.theme1.layout.app')

@section('content')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-items"><a href="{{ route('home') }}">Home</a></li><span
                            class="breadcrumb-breaker">/</span>
                        <li class="breadcrumb-items active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="main-content">
        <div class="container-xl">

            <div class="row">

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-phone"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">Phone</h3>
                            <p class="mb-0">Unknown</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30" style="height: 30px;"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-envelope-open"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">E-Mail</h3>
                            <p class="mb-0">{{ $config ? $config->email : 'Unknown' }}</p>
                        </div>
                    </div>
                    <div class="spacer d-md-none d-lg-none" data-height="30" style="height: 30px;"></div>
                </div>

                <div class="col-md-4">
                    <!-- contact info item -->
                    <div class="contact-item bordered rounded d-flex align-items-center">
                        <span class="icon icon-map"></span>
                        <div class="details">
                            <h3 class="mb-0 mt-0">Location</h3>
                            <p class="mb-0">{{ $config ? $config->address : 'Unknown' }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="spacer" data-height="50" style="height: 50px;"></div>

            <!-- section header -->
            {{-- <div class="section-header">
                <h3 class="section-title">Send Message</h3>
                <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave">
            </div> --}}
            <div class="row">
                <div class="col-4 m-auto">
                    <!-- widget about -->
                    <div class="widget rounded">
                        <div class="widget-about data-bg-image text-center"
                            data-bg-image="{{ asset('Themes/Theme1/images/map-bg.png') }}">
                            <p class="mb-4 bd-font mb-3" style="color: #203656">চটি কথা, একটি অনন্য অনলাইন প্ল্যাটফর্ম
                                যেখানে আপনি আপনার সত্যি ঘটনা ও গোপন কাহিনি শেয়ার করতে পারেন। গোপনীয়তা বজায় রেখে, আপনার
                                কাহিনি শুনুন ও অন্যদের কাহিনি পড়ুন।
                            </p>
                            <button class="btn btn-default btn-full" type="submit">Share story</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            {{-- <form id="contact-form" class="contact-form" method="post">

                <div class="messages"></div>

                <div class="row">
                    <div class="column col-md-6">
                        <!-- Name input -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="InputName" id="InputName"
                                placeholder="Your name" required="required" data-error="Name is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-6">
                        <!-- Email input -->
                        <div class="form-group">
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                placeholder="Email address" required="required" data-error="Email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-12">
                        <!-- Email input -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="InputSubject" name="InputSubject"
                                placeholder="Subject" required="required" data-error="Subject is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-12">
                        <!-- Message textarea -->
                        <div class="form-group">
                            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="4" placeholder="Your message here..."
                                required="required" data-error="Message is required."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit
                    Message</button><!-- Send Button -->

            </form> --}}
            <!-- Contact Form end -->
        </div>
    </section>
@endsection
