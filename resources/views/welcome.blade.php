@php
    use Illuminate\Support\Facades\Route;
	
@endphp
 {{-- dir="{{ app()->getLocale()=='ar'?'rtl':'ltr' }} --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>الضيافة</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/Layer 1.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->s
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
	
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="/">
								<img src="assets/img/Layer 1.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a></li>						
								<li><a href="/category">الاقسام</a></li>
								<li><a href="/products">المنتجات</a></li>
								
					 @guest
                            @if (Route::has('login'))
                                <li >
                                    <a href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li >
                                    <a href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a  href="#">
                                    {{auth()->user()->name }}
                                </a>
							</li>

							<li>

                               <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
<!--
<li> <div class="language-selector">
        <div class="btn-group">
            <a href="{{ route('language.switch', 'en') }}" class="btn btn-sm btn-outline-primary {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
            <a href="{{ route('language.switch', 'ar') }}" class="btn btn-sm btn-outline-primary {{ app()->getLocale() == 'ar' ? 'active' : '' }}">AR</a>
            <a href="{{ route('language.switch', 'nl') }}" class="btn btn-sm btn-outline-primary {{ app()->getLocale() == 'nl' ? 'active' : '' }}">NL</a>
        </div>
    </div>
	</li>
-->
							
								<li>
									<div class="header-icons">
										
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<form action="/search" method="post">
								@csrf
							<input type="text"name="searchkey" placeholder="البحث هنا">
							<button type="submit">البحث عن منتج <i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh & Organic</p>
								<h1>Sweet Moment Start Here</h1>
								<div class="hero-btns">
									<a href="/category" class="boxed-btn">Products Collection</a>
									<a href="/" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh Everyday</p>
								<h1> Order Now And Savor The Flavor </h1>
								<div class="hero-btns">
									<a href="/category" class="boxed-btn">Visit Shop</a>
									<a href="/" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Mega Sale Going On!</p>
								<h1>Get December Discount</h1>
								<div class="hero-btns">
									<a href="/category" class="boxed-btn">Visit Shop</a>
									<a href="/" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80 ">
		<div class="container ">

			<div class="row ">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free delivery</h3>
							<p>When order over $100</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6  mb-4 mb-lg-0">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p> No Refund !</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">our</span> Products</h3>

					</div>
				</div>
			</div>

			<div class="row">
                @for($i=1 ; $i<=12 ; $i++)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/products"><img src="assets/img/products/product-img-{{$i}}.jpg" alt=""></a>
						</div>
						
					</div>
				</div>
                @endfor
		
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="\assets\videos\website.mp4" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						
						<h2>We are <span class="orange-text">AL-Deafa</span></h2>
						<p>In the world of hospitality, we strive to offer everything that reflects elegance and authenticity.
At Dheyafa Store, we combine high quality with luxurious designs that suit all your special occasions.
We provide everything you need for a complete hospitality experience — from coffee tools to serving essentials.
Every detail matters to us, ensuring products that earn your trust and satisfaction.
Choosing us means creating a warm welcome that leaves a lasting impression on your guests.</p>
							
						<a href="/category" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	
	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> News</h3>
					</div>
				</div>
			</div>

			<div class="row">
				 @for($i=1 ; $i<=3 ; $i++)
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="/products"><div class="latest-news-bg news-bg-{{$i}}"></div></a>
						<p>hi hi hi hij </p>
					</div>
				</div>
				@endfor
			</div>
		
		</div>
	</div>
	<!-- end latest news -->

	
	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p> In the world of hospitality, we strive to offer everything that reflects elegance and authenticity.
							At Dheyafa Store, we combine high quality with luxurious designs that suit all your special occasions.
							We provide everything you need for a complete hospitality experience — from coffee tools to serving essentials.
							.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li><a href=" westzijde 41, 1506 EB Zaandam, Nederland "> westzijde 41, 1506 EB Zaandam, Nederland  </a> </li>
							<li>zaandam@aldiafa.nl</li>
							<li>+31 6 30743570</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="/category">Category</a></li>
							<li><a href="/products">Products</a></li>
							
							
						</ul>
					</div>
				</div>
	 <div  class="col-lg-3 col-md-6 "> 
		<div class="footer-box ">
		<div style="display:flex;flex-direction:row;align-items:center;gap:20px">

  			<!-- QR Code Box -->
			 	

  			<div style="background:#fff;padding:20px;border-radius:16px;box-shadow:0 8px 24px rgba(0,0,0,0.08);">
   				<div id="qr-main"></div>
   						 <p style="margin-top:12px;font-weight:600;color:#333;text-align:center">روابط المتجر</p>
  		
					</div>
	

 			 <!-- Links -->
  				<div style="display:flex;flex-direction:column;gap:15px;width:240px;text-align:center ">
    					<a href="https://www.facebook.com/aldiafa.sweet" target="_blank"
       						style="display:block;padding:12px;border-radius:8px;background:#1877f2;color:#fff;
             				 font-weight:600;text-decoration:none;box-shadow:0 4px 10px rgba(24,119,242,0.3)">
     							 فيسبوك
    					</a>
    					<a href="https://www.instagram.com/aldiafa.b.v" target="_blank"
      						 style="display:block;padding:12px;border-radius:8px;background:#e1306c;color:#fff;
              				font-weight:600;text-decoration:none;box-shadow:0 4px 10px rgba(225,48,108,0.3)">
     							 إنستغرام
    					</a>
    					<a href="https://wa.me/201000000000" target="_blank"
       						style="display:block;padding:12px;border-radius:8px;background:#25d366;color:#fff;
              				font-weight:600;text-decoration:none;box-shadow:0 4px 10px rgba(37,211,102,0.3)">
      							واتساب
    					</a>
						<a href="https://www.tiktok.com/@aldiafa.b.v" target="_blank"
       						style="display:block;padding:12px;border-radius:8px;background:#25d366;color:#fff;
              				font-weight:600;text-decoration:none;box-shadow:0 4px 10px rgba(240, 97, 14, 0.3)">
      							tiktok
    					</a>
  				</div>


				
		</div>
		
		</div>
			</div>

	</div> 

			
			</div>
		</div>
	</div>
	<!-- end footer -->
				{{-- <!-- مكتبة QRCode.js -->
			<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
			<script>
  			// 👇 الكيو آر يفتح نفس الصفحة (اللي فيها الروابط)
  			const linkPage = window.location.href;

  				new QRCode(document.getElementById("qr-main"), {
    				text: linkPage,
  					  width: 200,
   						 height: 200
					  });
			</script>
			 --}}
	
	<!--end QR-->
	{{-- kjhk --}}

<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const linkPage = window.location.href;
    const qrElement = document.getElementById("qr-main");
    if (qrElement) {
      new QRCode(qrElement, {
		//linkPage 
         text: 'https://www.facebook.com/aldiafa.sweet',
        width: 200,
        height: 200
      });
    }
  });
</script>

	{{-- jbhjk --}}

	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>