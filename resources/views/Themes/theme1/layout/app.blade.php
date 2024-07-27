@php
    use App\Models\Config;
    use App\Models\Category;
    use App\Models\CustomCode;
    $config = Config::where('status', 'active')->first();
    $categories = Category::where('status', 'active')->get();
    $code = CustomCode::first();
@endphp
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="rating" content="RTA-5042-1996-1400-1577-RTA" />
    <meta name="rating" content="adult" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($config ? $config->favicon : '') }}">
    <link href='https://fonts.googleapis.com/css?family=Anek Bangla' rel='stylesheet'>
    @include('Themes.theme1.layout.headerlink')
    {!! JsonLd::generate() !!}
    @if ($code)
        {!! $code->header !!}
    @endif
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JTZ99PXTJ8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-JTZ99PXTJ8');
    </script>
    @yield('style')
    @include('Themes.theme1.layout.header')
</head>

<body class="bd-font">
    <!-- preloader -->
    <div id="preloader">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    {{-- Search pop --}}
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="container">
            <div class="text-center mt-5">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form">
                <input class="form-control me-2 live-search" type="search" placeholder="Search and press enter ..."
                    aria-label="Search">
                <button class="btn btn-default btn-lg" type="button"><i class="icon-magnifier"></i></button>
            </form>

            <div class="container mt-3" id="search_content">

            </div>
        </div>
    </div>

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        @include('Themes.theme1.layout.headerNav')

        {{-- main body --}}

        @yield('content')
        {{-- main body --}}
    </div><!-- end site wrapper -->
    {{-- this is for custom codes --}}
    @include('Themes.theme1.layout.footerSection')
    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="{{ asset($config ? $config->logo : '') }}" alt="choti kotha" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.all') }}">চটি গল্প</a>
                </li>
                <li class="nav-item">
                    <a href="#">চটি ভান্ডার</a>
                    <ul class="submenu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('category.view', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://t.me/+parvyvrA_7Y1ZjJl" rel="nofollow">Share Story</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('privacy') }}">Privacy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                </li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>
    @include('Themes.theme1.layout.footer')
    @yield('scripts')
    @include('Themes.theme1.layout.footerlink')
    @if ($code)
        {!! $code->footer !!}
    @endif
    <script>
        $(document).ready(function() {

            // Live search
            let x = $('.live-search').on('input', function() {
                var query = $(this).val();
                const container = document.getElementById('search_content');
                container.innerHTML = '';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {
                        search: query,
                    },
                    success: function(response) {
                        response.data.forEach(post => {
                            // Create the row element
                            const rowElement = document.createElement('div');
                            rowElement.className = 'row mb-3';

                            // Create the title element
                            const titleElement = document.createElement('h6');
                            titleElement.className = 'my-0 bd-font fw-bolder';
                            const titleLink = document.createElement('a');
                            titleLink.href = `/view/${post.slug}`;
                            titleLink.textContent = post.title;
                            titleLink.style.color = '#203656';
                            titleElement.appendChild(titleLink);

                            // Create the meta element
                            const metaElement = document.createElement('ul');
                            metaElement.className = 'meta list-inline mt-1 mb-0';
                            const dateItem = document.createElement('li');
                            dateItem.className = 'list-inline-item';
                            dateItem.textContent = new Date(post.created_at)
                                .toLocaleDateString('bn-BD', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                });
                            metaElement.appendChild(dateItem);

                            // Append the title and meta to the row element
                            rowElement.appendChild(titleElement);
                            rowElement.appendChild(metaElement);
                            // Append the row element to the container
                            container.appendChild(rowElement);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Check if the user has already visited in the last minute
            if (!getCookie('ageVerified')) {
                var myModal = new bootstrap.Modal(document.getElementById('ageVerification'), {
                    backdrop: 'static',
                    keyboard: false
                });
                myModal.show();
            }

            // Set the cookie when the user clicks the enter button
            document.getElementById('enterButton').addEventListener('click', function() {
                setCookie('ageVerified', 'true', 180);
            });

            // Function to set a cookie
            function setCookie(name, value, minutes) {
                var d = new Date();
                d.setTime(d.getTime() + (minutes * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = name + "=" + value + ";" + expires + ";path=/";
            }

            // Function to get a cookie
            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }
        });
    </script>
</body>

</html>
