@php
    use Illuminate\Support\Facades\Route;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>الضيافة </title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/Layer 1.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="/assets/css/responsive.css">

</head>
<body>
	
	<!-- WhatsApp Floating Widget - Aldiafa Sweet -->
<div id="wa-widget" dir="rtl" aria-live="polite">
  <button id="wa-button" title="تواصل عبر واتساب" aria-label="تواصل عبر واتساب">
    <!-- WhatsApp SVG Icon -->
    <svg viewBox="0 0 32 32" width="28" height="28" aria-hidden="true">
      <path d="M19.11 17.38c-.27-.14-1.6-.79-1.85-.88-.25-.09-.43-.14-.61.14-.18.27-.7.88-.86 1.06-.16.18-.32.21-.59.07-.27-.14-1.12-.41-2.14-1.31-.79-.7-1.31-1.56-1.47-1.82-.16-.27-.02-.42.12-.56.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.34-.02-.48-.07-.14-.61-1.46-.84-2-.22-.53-.45-.46-.61-.46-.16 0-.34-.02-.52-.02s-.48.07-.73.34c-.25.27-.96.94-.96 2.29 0 1.35.99 2.65 1.13 2.83.14.18 1.95 2.98 4.73 4.17.66.29 1.18.46 1.58.59.66.21 1.27.18 1.75.11.53-.08 1.6-.66 1.83-1.3.23-.64.23-1.18.16-1.3-.07-.11-.25-.18-.52-.32zM26.65 5.33C23.93 2.6 20.29 1.11 16.44 1.11 8.78 1.11 2.62 7.27 2.62 14.93c0 2.36.62 4.65 1.79 6.68L2.07 30.9l9.49-2.49c1.95 1.06 4.15 1.62 6.4 1.62h.01c7.66 0 13.82-6.16 13.82-13.82 0-3.69-1.44-7.16-4.14-9.88zM16.96 27.64h-.01c-2.02 0-4-.54-5.73-1.56l-.41-.24-5.63 1.48 1.5-5.49-.26-.43c-1.12-1.82-1.71-3.91-1.71-6.05 0-6.34 5.16-11.5 11.5-11.5 3.07 0 5.96 1.2 8.14 3.38 2.17 2.18 3.36 5.07 3.36 8.14 0 6.34-5.16 11.5-11.5 11.5z"/>
    </svg>
    <span class="wa-pulse" aria-hidden="true"></span>
  </button>

  <div id="wa-toast" role="dialog" aria-label="تواصل عبر واتساب">
    <div class="wa-toast-header">
      <strong>اتصل بنا واتساب</strong>
      <button id="wa-toast-close" aria-label="إغلاق">×</button>
    </div>
    <div class="wa-toast-body">
      لأي استفسار عن الحلويات والطلبات السريعة 🍰
      <div class="wa-number">
        <span>واتساب:</span> <a id="wa-link-number" href="#" rel="noopener">+000000000000</a>
      </div>
      <a id="wa-cta" class="wa-cta" href="#" rel="noopener">ابدأ المحادثة</a>
    </div>
  </div>
</div>

<style>
  #wa-widget{position:fixed;right:16px;bottom:16px;z-index:9999;font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cairo,sans-serif}
  #wa-button{position:relative;border:0;outline:0;border-radius:999px;width:56px;height:56px;background:#25D366;box-shadow:0 8px 24px rgba(0,0,0,.18);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:transform .15s ease,box-shadow .15s ease}
  #wa-button:hover{transform:translateY(-2px);box-shadow:0 12px 30px rgba(0,0,0,.22)}
  #wa-button svg{fill:#fff}
  .wa-pulse{position:absolute;inset:0;border-radius:999px;box-shadow:0 0 0 0 rgba(37,211,102,.6);animation:wa-pulse 2.1s infinite}
  @keyframes wa-pulse { 0%{box-shadow:0 0 0 0 rgba(37,211,102,.6)} 70%{box-shadow:0 0 0 16px rgba(37,211,102,0)} 100%{box-shadow:0 0 0 0 rgba(37,211,102,0)} }

  /* Toast */
  #wa-toast{position:fixed;right:16px;bottom:84px;width:300px;max-width:92vw;background:#fff;border-radius:14px;box-shadow:0 18px 40px rgba(0,0,0,.18);border:1px solid #eee;overflow:hidden;transform:translateY(20px);opacity:0;pointer-events:none;transition:all .25s ease}
  #wa-toast.wa-show{transform:translateY(0);opacity:1;pointer-events:auto}
  .wa-toast-header{display:flex;align-items:center;justify-content:space-between;background:#f7f7f8;padding:10px 12px;border-bottom:1px solid #eee}
  .wa-toast-header strong{font-weight:700;color:#222}
  .wa-toast-header button{background:transparent;border:0;font-size:18px;line-height:1;cursor:pointer;color:#666}
  .wa-toast-body{padding:12px;color:#333;font-size:14px}
  .wa-number{margin:10px 0;padding:8px;background:#fcfcfd;border-radius:10px;border:1px dashed #e6e6e6}
  .wa-number a{color:#0a66c2;text-decoration:none}
  .wa-cta{display:inline-block;margin-top:8px;padding:10px 12px;border-radius:10px;background:#25D366;color:#fff;text-decoration:none;font-weight:600}
  @media (prefers-color-scheme: dark){
    #wa-toast{background:#111827;border-color:#1f2937}
    .wa-toast-header{background:#0f172a;border-color:#1f2937}
    .wa-toast-header strong{color:#f3f4f6}
    .wa-toast-header button{color:#9ca3af}
    .wa-toast-body{color:#e5e7eb}
    .wa-number{background:#0b1220;border-color:#1f2937}
    .wa-number a{color:#93c5fd}
  }
</style>

<script>
  (function(){
    // ✅ عدّل رقم واتساب الدولي أدناه (بدون + أو فراغات)
    // مثال: السعودية 9665xxxxxxx | العراق 9647xxxxxxxx | مصر 2010xxxxxxx
    const WHATSAPP_NUMBER = "+31630743570"; // ضع رقمك هنا
    const DEFAULT_TEXT = "مرحباً، أحتاج مساعدة بخصوص طلب من متجر الضيافة 🍰";
    const delayMs = 1200;           // تأخير ظهور التوست (ملّي ثانية)
    const remindEveryMs = 60*1000;  // إعادة إظهار التوست كل دقيقة إذا لم يُغلق

    const waBtn = document.getElementById('wa-button');
    const toast = document.getElementById('wa-toast');
    const closeBtn = document.getElementById('wa-toast-close');
    const waCta = document.getElementById('wa-cta');
    const waNumLink = document.getElementById('wa-link-number');

    // إعداد الروابط
    const page = encodeURIComponent(document.title + " - " + location.href);
    const text = encodeURIComponent(DEFAULT_TEXT + " (" + page + ")");
    const waUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${text}`;

    waCta.href = waUrl;
    waNumLink.href = waUrl;
    waNumLink.textContent = "+" + WHATSAPP_NUMBER;

    // فتح واتساب عند الضغط على الزر العائم
    waBtn.addEventListener('click', function(){
      window.open(waUrl, '_blank', 'noopener');
      // إظهار التوست أيضاً كتذكير بصلاحية الرقم
      showToast();
    });

    // إظهار/إغلاق التوست
    function showToast(){ toast.classList.add('wa-show'); }
    function hideToast(){ toast.classList.remove('wa-show'); }

    closeBtn.addEventListener('click', function(){
      hideToast();
      // لا نخزّن الإغلاق كي يظل يظهر "طول ما أنا فاتح الموقع" كل فترة
    });

    // الظهور الأول بعد تأخير بسيط
    setTimeout(showToast, delayMs);

    // تذكير دوري لطيف
    setInterval(function(){
      if(!toast.classList.contains('wa-show')) showToast();
    }, remindEveryMs);
  })();
</script>
<!-- /WhatsApp Floating Widget -->

	
	
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
								<img src="\assets\img\Layer 1.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="/">{{__('messages.home')}}</a></li>
								<li><a href="/category">{{__('messages.cat')}}</a></li>
								<li><a href="/products">{{__('messages.pro')}}</a></li>
								
								

								<li>
									@if(auth()->check()&& auth()->user()->user==='admin')
									<a href="{{url('/admin-dashboard')}}">{{__('messages.add')}} </a>
									@endif
								</li>
			

								<li><a href="/reviews">{{__('messages.view')}} </a></li>
 @guest
					
                            @if (Route::has('login'))
                                <li >
                                    <a href="{{ route('login') }}" >{{ __('messages.Login') }}</a>
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
                                    {{ auth()->user()->name }}
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




								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i></a>
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
							<h3>البحث في :</h3>
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



    @yield('content')

    <div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>In the world of hospitality, we strive to offer everything that reflects elegance and authenticity.
							At Dheyafa Store, we combine high quality with luxurious designs that suit all your special occasions.
							We provide everything you need for a complete hospitality experience — from coffee tools to serving essentials.
							.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li><a href=" /westzijde 41, 1506 EB Zaandam, Nederland "> westzijde 41, 1506 EB Zaandam, Nederland  </a> </li>
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
				
		 <!--QR-->
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
			<!-- مكتبة QRCode.js -->
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
			
	
	<!--end QR-->

			</div>
		</div>
	</div>
	<!-- end footer -->

{{-- changeing!!!!!!!!! --}}
	<!-- jquery -->
	<script src="/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="/assets/js/main.js"></script>
</body>
</html>