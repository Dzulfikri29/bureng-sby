 @php
     $general = App\Models\General::first();
     $social_media = App\Models\SocialMedia::all();
     $footer_blogs = App\Models\Blog::orderBy('created_at', 'desc')
         ->where('status', 'active')
         ->limit(2)
         ->get();
 @endphp
 <footer class="site-footer">
     <div class="site-footer__top">
         <div class="container">
             <div class="site-footer__top-inner">
                 <div class="site-footer-shape-1 float-bob-x" style="background-image: url({{ asset('assets/images/shapes/site-footer-shape-1.png') }});"></div>
                 <div class="row">
                     <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                         <div class="footer-widget__column footer-widget__about">
                             <div class="footer-widget__logo">
                                 <a href="{{ route('index') }}"><img src="{{ asset('storage/' . $general->logo_short) }}" alt="" width="122px"></a>
                             </div>
                             <div class="footer-widget__about-text-box">
                                 <p class="footer-widget__about-text">{{ $general->tagline }}</p>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                         <div class="footer-widget__column footer-widget__Explore">
                             <div class="footer-widget__title-box">
                                 <h3 class="footer-widget__title">Menu</h3>
                             </div>
                             <ul class="footer-widget__Explore-list list-unstyled">
                                 <li class="menu-profile">
                                     <a href="{{ route('profile') }}">{{ Str::headline('profil') }}</a>
                                 </li>
                                 {{-- <li class="menu-structure">
                                     <a href="{{ route('structure') }}">{{ Str::headline('struktur') }}</a>
                                 </li> --}}
                                 <li class="menu-product">
                                     <a href="{{ route('product') }}">{{ Str::headline('produk') }}</a>
                                 </li>
                                 <li class="menu-activity">
                                     <a href="{{ route('activity') }}">{{ Str::headline('kegiatan') }}</a>
                                 </li>
                                 <li class="menu-tutorial">
                                     <a href="{{ route('tutorial') }}">{{ Str::headline('e-learning') }}</a>
                                 </li>
                                 <li class="menu-blog">
                                     <a href="{{ route('blog') }}">{{ Str::headline('blog') }}</a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                         <div class="footer-widget__column footer-widget__news">
                             <div class="footer-widget__title-box">
                                 <h3 class="footer-widget__title">Blog</h3>
                             </div>
                             <ul class="footer-widget__news-list list-unstyled">
                                 @foreach ($footer_blogs as $footer_blog)
                                     <li>
                                         <div class="footer-widget__news-img">
                                             <img src="{{ asset('storage/' . $footer_blog->image) }}" alt="">
                                         </div>
                                         <div class="footer-widget__news-content">
                                             <p class="footer-widget__news-date">{{ Carbon\Carbon::parse($footer_blog->created_at)->translatedFormat('d F Y') }}</p>
                                             <h5 class="footer-widget__news-sub-title"><a href="{{ route('blog.show', ['slug' => $footer_blog->slug]) }}">{{ $footer_blog->title }}</a></h5>
                                         </div>
                                     </li>
                                 @endforeach
                             </ul>
                         </div>
                     </div>
                     <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                         <div class="footer-widget__column footer-widget__Contact">
                             <div class="footer-widget__title-box">
                                 <h3 class="footer-widget__title">Kontak</h3>
                             </div>
                             <ul class="footer-widget__Contact-list list-unstyled">
                                 <li>
                                     <div class="icon">
                                         <span class="fas fa-phone-square-alt"></span>
                                     </div>
                                     <div class="text">
                                         <p><a href="tel:{{ $general->phone }}">+{{ $general->phone }}</a></p>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="icon">
                                         <span class="fas fa-envelope"></span>
                                     </div>
                                     <div class="text">
                                         <p><a href="mailto:{{ $general->email }}">{{ $general->email }}</a></p>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="icon">
                                         <span class="icon-pin"></span>
                                     </div>
                                     <div class="text">
                                         <p>{{ $general->address }}</p>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="site-footer__bottom">
         <div class="container">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="site-footer__bottom-inner">
                         <p class="site-footer__bottom-text">© Copyright {{ date('Y') }} by <a href="#">{{ $general->website_name }}</a></p>
                         <div class="site-footer__social">
                             @foreach ($social_media as $social_account)
                                 <a href="{{ $social_account->link }}"><i class="fab fa-{{ $social_account->name }}"></i></a>
                             @endforeach
                         </div>
                         <div class="site-footer__bottom-scroll">
                             <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
