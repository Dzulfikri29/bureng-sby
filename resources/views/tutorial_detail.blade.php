   @extends('layouts.app', ['custom_meta' => true])

   @section('title', Str::headline($tutorial->title))

   @section('custom_meta')
       <meta name="description" content="{{ $tutorial->title }}">
       <meta name="keyword" content="{{ $tutorial->title }}">

       <!-- Google / Search Engine Tags -->
       <meta itemprop="name" content="{{ $tutorial->title }}">
       <meta itemprop="description" content="{{ $tutorial->title }}">
       <meta itemprop="image" content="{{ asset('storage/' . $tutorial->image) }}">

       <!-- Facebook Meta Tags -->
       <meta property="og:type" content="website">
       <meta property="og:title" content="{{ $tutorial->title }}">
       <meta property="og:description" content="{{ $tutorial->title }}">
       <meta property="og:image" content="{{ asset('storage/' . $tutorial->image) }}">

       <!-- Twitter Meta Tags -->
       <meta name="twitter:card" content="summary_large_image">
       <meta name="twitter:title" content="{{ $tutorial->title }}">
       <meta name="twitter:description" content="{{ $tutorial->title }}">
       <meta name="twitter:image" content="{{ asset('storage/' . $tutorial->image) }}">
   @endsection

   @section('css')
       <link rel="stylesheet" href="{{ asset('assets/vendors/js-social/dist/jssocials.css') }}">
   @endsection

   @section('content')
       <!--Blog Details Start-->
       <section class="blog-details">
           <div class="container">
               <div class="row">
                   <div class="col-xl-8 col-lg-7">
                       <div class="blog-details__left">
                           <div class="blog-details__img">
                               <a href="{{ $tutorial->youtube_link }}" class="video-popup blog-video-play">
                                   <div class="about-one__video-icon">
                                       <span class="fa fa-play"></span>
                                       <i class="ripple"></i>
                                   </div>
                               </a>
                               <img src="{{ asset('storage/' . $tutorial->image) }}" alt="">
                               <div class="blog-details__date">
                                   <span>{{ Carbon\Carbon::parse($tutorial->created_at)->format('d') }}</span>
                                   <p>{{ Carbon\Carbon::parse($tutorial->created_at)->translatedFormat('F') }}</p>
                               </div>
                           </div>
                           <div class="blog-details__content">
                               <ul class="list-unstyled blog-details__meta">
                                   <li>
                                       <a href="#"><i class="fas fa-user-circle"></i> {{ $tutorial->user->name }}</a>
                                   </li>
                               </ul>
                               <h3 class="blog-details__title">{{ $tutorial->title }}</h3>
                               {!! $tutorial->body !!}
                           </div>
                           <div class="blog-details__bottom">
                               <div class="blog-details__social-list" id="share">
                               </div>
                           </div>
                           <div class="blog-details__pagenation-box">
                               <ul class="list-unstyled blog-details__pagenation">
                                   @if ($prev)
                                       <li><a href="{{ route('blog.show', ['slug' => $prev->slug]) }}">{{ $prev->title }}</a></li>
                                   @endif
                                   @if ($next)
                                       <li><a href="{{ route('blog.show', ['slug' => $next->slug]) }}">{{ $next->title }}</a></li>
                                   @endif
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-4 col-lg-5">
                       <div class="sidebar">
                           <div class="sidebar__single sidebar__search">
                               <form action="{{ route('tutorial') }}" class="sidebar__search-form">
                                   <input type="search" placeholder="Cari Tutorial" name="search">
                                   <button type="submit"><i class="icon-magnifying-glass"></i></button>
                               </form>
                           </div>
                           <div class="sidebar__single sidebar__post">
                               <h3 class="sidebar__title">Tutorial Terbaru</h3>
                               <ul class="sidebar__post-list list-unstyled">
                                   @foreach ($latests as $latest)
                                       <li>
                                           <div class="sidebar__post-image">
                                               <img src="{{ asset('storage/' . $latest->image) }}" alt="">
                                           </div>
                                           <div class="sidebar__post-content">
                                               <h3>
                                                   <span class="sidebar__post-content-meta"><i class="fas fa-user-circle"></i>{{ $latest->user->name }}</span>
                                                   <a href="{{ route('tutorial.show', ['slug' => $latest->slug]) }}">{{ $latest->title }}</a>
                                               </h3>
                                           </div>
                                       </li>
                                   @endforeach
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!--Blog Details End-->
   @endsection

   @section('js')
       <script src="{{ asset('assets/vendors/js-social/dist/jssocials.min.js') }}"></script>
       <script>
           $('.menu-tutorial').addClass('current');

           $("#share").jsSocials({
               shares: [
                   "email",
                   {
                       share: "facebook",
                       logo: "fab fa-facebook-f",
                   },
                   {
                       share: "twitter",
                       logo: "fab fa-twitter",
                   },
                   {
                       share: "whatsapp",
                       logo: "fab fa-whatsapp",
                   },
               ],
               url: "{{ route('tutorial.show', ['slug' => $tutorial->slug]) }}",
               text: "\n{{ $tutorial->title }}",
               showLabel: false,
               showCount: false,

           });
       </script>
   @endsection
