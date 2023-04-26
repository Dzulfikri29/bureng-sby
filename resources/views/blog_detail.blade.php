   @extends('layouts.app', ['custom_meta' => true])

   @section('title', Str::headline($blog->title))

   @section('custom_meta')
       <meta name="description" content="{{ $blog->meta_description }}">
       <meta name="keyword" content="{{ $blog->meta_keywords }}">

       <!-- Google / Search Engine Tags -->
       <meta itemprop="name" content="{{ $blog->meta_title }}">
       <meta itemprop="description" content="{{ $blog->meta_description }}">
       <meta itemprop="image" content="{{ asset('storage/' . $blog->image) }}">

       <!-- Facebook Meta Tags -->
       <meta property="og:type" content="website">
       <meta property="og:title" content="{{ $blog->meta_title }}">
       <meta property="og:description" content="{{ $blog->meta_description }}">
       <meta property="og:image" content="{{ asset('storage/' . $blog->image) }}">

       <!-- Twitter Meta Tags -->
       <meta name="twitter:card" content="summary_large_image">
       <meta name="twitter:title" content="{{ $blog->meta_title }}">
       <meta name="twitter:description" content="{{ $blog->meta_description }}">
       <meta name="twitter:image" content="{{ asset('storage/' . $blog->image) }}">
   @endsection

   @section('content')
       <!--Blog Details Start-->
       <section class="blog-details">
           <div class="container">
               <div class="row">
                   <div class="col-xl-8 col-lg-7">
                       <div class="blog-details__left">
                           <div class="blog-details__img">
                               <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                               <div class="blog-details__date">
                                   <span>{{ Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                                   <p>{{ Carbon\Carbon::parse($blog->created_at)->translatedFormat('F') }}</p>
                               </div>
                           </div>
                           <div class="blog-details__content">
                               <ul class="list-unstyled blog-details__meta">
                                   <li>
                                       <a href="#"><i class="fas fa-user-circle"></i> {{ $blog->user->name }}</a>
                                   </li>
                               </ul>
                               <h3 class="blog-details__title">{{ $blog->title }}</h3>
                               {!! $blog->body !!}
                           </div>
                           <div class="blog-details__bottom">
                               <div class="blog-details__social-list">
                                   <a href="blog-details.html"><i class="fab fa-twitter"></i></a>
                                   <a href="blog-details.html"><i class="fab fa-facebook"></i></a>
                                   <a href="blog-details.html"><i class="fab fa-pinterest-p"></i></a>
                                   <a href="blog-details.html"><i class="fab fa-instagram"></i></a>
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
                               <form action="{{ route('blog') }}" class="sidebar__search-form">
                                   <input type="search" placeholder="Cari Blog" name="search">
                                   <button type="submit"><i class="icon-magnifying-glass"></i></button>
                               </form>
                           </div>
                           <div class="sidebar__single sidebar__post">
                               <h3 class="sidebar__title">Posting Terbaru</h3>
                               <ul class="sidebar__post-list list-unstyled">
                                   @foreach ($latests as $latest)
                                       <li>
                                           <div class="sidebar__post-image">
                                               <img src="{{ asset('storage/' . $latest->image) }}" alt="">
                                           </div>
                                           <div class="sidebar__post-content">
                                               <h3>
                                                   <span class="sidebar__post-content-meta"><i class="fas fa-user-circle"></i>{{ $latest->user->name }}</span>
                                                   <a href="{{ route('blog.show', ['slug' => $latest->slug]) }}">{{ $latest->title }}</a>
                                               </h3>
                                           </div>
                                       </li>
                                   @endforeach
                               </ul>
                           </div>
                           <div class="sidebar__single sidebar__category">
                               <h3 class="sidebar__title">Ketegori</h3>
                               <ul class="sidebar__category-list list-unstyled">
                                   @foreach ($categories as $category)
                                       <li class="{{ $category->id == $blog->blog_category_id ? 'active' : '' }}"><a href="{{ route('blog', ['blog_category_id' => $category->id]) }}" class="text-capitalize">{{ $category->name }}<span class="icon-right-arrow"></span></a></li>
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
       <script>
           $('.menu-blog').addClass('current');
       </script>
   @endsection
