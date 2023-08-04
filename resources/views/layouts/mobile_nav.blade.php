 @php
     $general = App\Models\General::first();
     $social_media = App\Models\SocialMedia::all();
 @endphp
 <div class="mobile-nav__wrapper">
     <div class="mobile-nav__overlay mobile-nav__toggler"></div>
     <!-- /.mobile-nav__overlay -->
     <div class="mobile-nav__content">
         <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

         <div class="logo-box">
             <a href="{{ route('index') }}" aria-label="logo image"><img src="{{ asset('storage/' . $general->logo_short) }}" width="122" alt="" /></a>
         </div>
         <!-- /.logo-box -->
         <div class="mobile-nav__container"></div>
         <!-- /.mobile-nav__container -->

         <ul class="mobile-nav__contact list-unstyled">
             <li>
                 <i class="fa fa-envelope"></i>
                 <a href="mailto:{{ $general->email }}">{{ $general->email }}</a>
             </li>
             <li>
                 <i class="fa fa-phone-alt"></i>
                 <a href="tel:{{ $general->phone }}">+{{ $general->phone }}</a>
             </li>
         </ul><!-- /.mobile-nav__contact -->
         <div class="mobile-nav__top">
             <div class="mobile-nav__social">
                 @foreach ($social_media as $social_account)
                     <a href="{{ $social_account->link }}"><i class="fab fa-{{ $social_account->name }}"></i></a>
                 @endforeach
             </div><!-- /.mobile-nav__social -->
         </div><!-- /.mobile-nav__top -->

     </div>
     <!-- /.mobile-nav__content -->
 </div>
