 @php
     $general = App\Models\General::first();
     $social_media = App\Models\SocialMedia::all();
 @endphp

 <header class="main-header">
     <div class="main-header__wrapper">
         <div class="main-header__wrapper-inner">
             <div class="main-header__logo">
                 <a href="/"><img src="{{ asset('storage/' . $general->logo) }}" alt="logo" width="200px"></a>
             </div>
             <div class="main-header__menu-box">
                 <div class="main-header__menu-box-top">
                     <ul class="list-unstyled main-header__contact-list">
                         <li>
                             <div class="icon">
                                 <i class="icon-email"></i>
                             </div>
                             <div class="text">
                                 <p><a href="mailto:{{ $general->email }}">{{ $general->email }}</a></p>
                             </div>
                         </li>
                         <li>
                             <div class="icon">
                                 <i class="icon-pin"></i>
                             </div>
                             <div class="text">
                                 <p>{{ $general->address }}</p>
                             </div>
                         </li>
                     </ul>
                     <div class="main-header__social">
                         @foreach ($social_media as $social_account)
                             <a href="{{ $social_account->link }}"><i class="fab fa-{{ $social_account->name }}"></i></a>
                         @endforeach
                     </div>
                 </div>
                 <div class="main-header__menu-box-bottom">
                     <nav class="main-menu">
                         <div class="main-menu__wrapper">
                             <div class="main-menu__wrapper-inner">
                                 <div class="main-menu__left">
                                     <div class="main-menu__main-menu-box">
                                         <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                         <ul class="main-menu__list">
                                             <li class="menu-profile">
                                                 <a href="{{ route('profile') }}">{{ Str::headline('profil') }}</a>
                                             </li>
                                             <li class="menu-structure">
                                                 <a href="{{ route('structure') }}">{{ Str::headline('struktur') }}</a>
                                             </li>
                                             <li class="menu-product">
                                                 <a href="{{ route('product') }}">{{ Str::headline('produk') }}</a>
                                             </li>
                                             <li class="menu-activity">
                                                 <a href="{{ route('activity') }}">{{ Str::headline('kegiatan') }}</a>
                                             </li>
                                             <li class="menu-blog">
                                                 <a href="{{ route('blog') }}">{{ Str::headline('blog') }}</a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="main-menu__right">
                                     <div class="main-menu__search-cart-btn-box">
                                         <div class="main-menu__search-box">
                                             <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </nav>
                 </div>
             </div>
             <div class="main-header__phone-contact-box">
                 <div class="main-header__phone-number">
                     <a href="tel:{{ $general->phone }}">+{{ $general->phone }}</a>
                 </div>
                 <div class="main-header__call-box">
                     <div class="main-header__call-inner">
                         <div class="main-header__call-icon">
                             <span class="fas fa-phone"></span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
