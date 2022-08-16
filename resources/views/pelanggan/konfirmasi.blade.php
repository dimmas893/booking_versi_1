<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Hotel</title>
    
    <!-- favicon -->
    <link rel=icon href="/assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/vendor.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">

</head>
<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>

    <!-- search popup start-->
    <div class="td-search-popup" id="td-search-popup">
        <form action="index.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- search popup end-->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- header start -->
    <div class="navbar-area">


        <!-- adbar end-->

        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo d-lg-none d-block">
                        <a class="main-logo" href="index.html"><img src="/assets/img/logo.png" alt="img"></a>
                    </div>
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#nextpage_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="nextpage_main_menu">
                    <ul class="navbar-nav menu-open">
                        <li class="current-menu-item">
                            <a href="#banner">Home</a>
                        </li>                        
                        <li class="current-menu-item">
                            <a href="#trending">Trending News</a>
                        </li>                        
                        <li class="current-menu-item">
                            <a href="#latest">Latest News</a>
                        </li>                        
                        <li class="current-menu-item">
                            <a href="#grid">News Grid</a>
                        </li>                        
                        <li class="current-menu-item">
                            <a target="_blank" href="https://1.envato.market/5OQX2">Pro Version</a>
                        </li>
                                    <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();"> {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <div class="menu-search-inner">
                        <input type="text" placeholder="Search For">
                        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>

 
    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        Confirmation Booking
                    </div>
                    @foreach ($booking as $p)
                        @if ($p->id_status == 4)
                            
                            <div class="card-body">
                                <p class="card-text"><img src="{{ asset('storage/'.$p->bukti_bayar) }}" class="img-fluid" width="50px"></p>
                                <p class="card-text">#{{ $p->no_invoice }}</p>
                                <p class="card-text">{{ $p->products->name }}</p>
                                <p class="card-text">{{ $p->user->name }}</p>
                                <p class="card-text">{{ $p->status->name }}</p>
                                <p class="card-text">{{ $p->jumlah }}</p>
                                <p class="card-text">{{ $p->tagihan }}</p>
                                <p>tunjukan nomor invoice untuk mendapatkan kunci kamar</p>
                                <a href="{{ route('bayar') }}" type="submit" class="btn btn-success text-right">Kembali</a>
                            </div>
                            <div class="card-footer text-muted">
                                {{ $p->tanggal }}
                            </div>
                        @endif
                    @endforeach
            </div>
        </div>
    </div>



     <div class="footer-area bg-black pd-top-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">ABOUT US</h5>
                        <div class="widget_about">
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <ul class="social-area social-area-2 mt-4">
                                <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_tag_cloud">
                        <h5 class="widget-title">TAGS</h5>
                        <div class="tagcloud">
                            <a href="#">Consectetur</a>
                            <a href="#">Video</a>
                            <a href="#">App</a>
                            <a href="#">Food</a>
                            <a href="#">Game</a>
                            <a href="#">Internet</a>
                            <a href="#">Phones</a>
                            <a href="#">Development</a>
                            <a href="#">Video</a>
                            <a href="#">Game</a>
                            <a href="#">Gadgets</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">CONTACTS</h5>
                        <ul class="contact_info_list">
                            <li><i class="fa fa-map-marker"></i> 829 Cabell Avenue Arlington, VA 22202</li>
                            <li><i class="fa fa-phone"></i> +088 012121240</li>
                            <li><i class="fa fa-envelope-o"></i> Info@website.com <br> Support@mail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_recent_post">
                        <h5 class="widget-title">POPULAR NEWS</h5>
                        <div class="single-post-list-wrap style-white">
                            <div class="media">
                                <div class="media-left">
                                    <img src="/assets/img/post/list/1.png" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="#">Himachal Pradesh rules in order to allow tourists </a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post-list-wrap style-white">
                            <div class="media">
                                <div class="media-left">
                                    <img src="/assets/img/post/list/2.png" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="#">Himachal Pradesh rules in order to allow tourists </a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <ul class="widget_nav_menu">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">rivacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <p>Copyright ©2021 <a href="https://solverwp.com/">SolverWp</a></p>
            </div>
        </div>
    </div>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- all plugins here -->
    <script src="/assets/js/vendor.js"></script>
    <!-- main js  -->
    <script src="/assets/js/main.js"></script>
</body>
</html>