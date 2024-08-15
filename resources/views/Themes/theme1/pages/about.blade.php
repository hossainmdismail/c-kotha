@extends('Themes.theme1.layout.app')
{{-- @section('style')
    <script async type="application/javascript" src="https://a.magsrv.com/ad-provider.js"></script>
    <ins class="eas6a97888e14" data-zoneid="5370834"></ins>
    <script>
        (AdProvider = window.AdProvider || []).push({
            "serve": {}
        });
    </script>
@endsection --}}
@section('content')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-items"><a href="{{ route('home') }}">Home</a></li><span
                            class="breadcrumb-breaker">/</span>
                        <li class="breadcrumb-items active" aria-current="page">Abouts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="page-content bordered rounded padding-30">
                    <p>Welcome to <strong>Choti Kotha</strong>, your premier destination for Bangla Choti Golpo and Panu
                        Stories. At Choti Kotha, we take pride in offering a rich collection of captivating Bangla Choti
                        Golpo, Panu Stories, and engaging confessions that resonate with our readers.</p>

                    <h5>Our Mission</h5>
                    <p>Our mission at Choti Kotha is to provide a unique and immersive experience for those who enjoy Bangla
                        Choti Golpo. We strive to bring you authentic, well-crafted stories that entertain, intrigue, and
                        inspire. Whether you're looking for thrilling Choti Golpo or heartfelt confessions, our platform is
                        designed to cater to all your needs.
                    </p>
                    <h5>What Sets Us Apart</h5>
                    <p>
                        At Choti Kotha, we are committed to quality and originality. Our talented writers craft each story
                        with care, ensuring that you receive the best in Bangla Choti Golpo and Panu Stories. We
                        continuously update our content to keep you engaged with the latest and most exciting stories.
                    </p>

                    <h5>What We Offer</h5>
                    <p>At ChotiKotha, we offer a unique platform where users can:</p>
                    <ul>
                        <li>Read a diverse collection of adult stories and confessions written by fellow members of the
                            B' community.</li>
                        <li>Share their own personal stories and confessions anonymously, fostering a sense of connection
                            and understanding.</li>
                        <li>Engage in discussions and provide feedback on the stories shared by others.</li>
                    </ul>

                    <h5>Why Choose ChotiKotha?</h5>
                    <p>We understand the unique cultural nuances and experiences of the B' diaspora. ChotiKotha is
                        more than just a website; it's a community where you can feel at home. Here are a few reasons why
                        our members love ChotiKotha:</p>
                    <ul>
                        <li><strong>Privacy and Anonymity:</strong> We prioritize your privacy and ensure that you can share
                            your stories without revealing your identity.</li>
                        <li><strong>Respectful Environment:</strong> We maintain a respectful and supportive community where
                            everyone is welcome to share and engage.</li>
                        <li><strong>Quality Content:</strong> Our platform features a wide range of high-quality, engaging
                            content tailored to the interests of our community.</li>
                    </ul>

                    <h5>Join Our Community</h5>
                    <p>Explore the world of Choti Kotha and dive into a realm of exciting Bangla Choti Golpo and Panu
                        Stories. Follow us for regular updates and new content that will keep you coming back for more.
                        Thank you for being a part of our community! <br>

                        Feel free to reach out to us at <a href="mailto:support@chotikotha.com">support@chotikotha.com</a>.
                        with any questions or suggestions. <br></p>
                    <h2 style="font-size: 14px">
                        Choti Kotha – Where captivating Bangla Choti Golpo and Panu Stories come to life.
                    </h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget rounded">
                    <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png"
                        style="background-image: url(&quot;images/map-bg.png&quot;);">
                        <img src="{{ asset($config ? $config->logo : '') }}" title="Choti Kotha" alt="Choti Kotha"
                            class="mb-4">
                        <p class="mb-4">Choti Kotha is your ultimate destination for engaging Bangla Choti Golpo and
                            captivating Panu Stories. Our platform offers a wide range of authentic Bangla Choti Golpo, Panu
                            Stories, and heartfelt confessions, all crafted by talented writers. Whether you're looking for
                            thrilling narratives or intriguing confessions, Choti Kotha provides fresh and original content
                            to keep you entertained. Discover the best in Bangla storytelling with Choti Kotha today!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
