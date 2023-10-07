 @php
     $general = App\Models\General::first();
 @endphp
 <footer>
     <div class="w-100 pt-100 dark-layer pb-50 opc85 position-relative">
         <div class="fixed-bg patern-bg back-blend-multiply dark-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></div>
         <div class="container">
             <div class="footer-data w-100">
                 <div class="row">
                     <div class="col-md-12 col-sm-12 col-lg-3">
                         <div class="widget w-100">
                             <div class="logo">
                                 <h1 class="mb-0"><a href="{{ route('index') }}" title="Home"><img class="img-fluid" src="{{ asset('storage/' . $general->logo_white) }}" alt="Logo" srcset="{{ asset('storage/' . $general->logo_white) }}"></a></h1>
                             </div>
                             <p class="mb-0">{{ $general->tagline }}</p>
                         </div>
                     </div>
                     <div class="col-md-12 col-sm-12 col-lg-9">
                         <div class="row justify-content-between">
                             <div class="col-md-6 col-sm-6 col-lg-6">
                                 <div class="row">
                                     <div class="col-md-7 col-sm-7 col-lg-7">
                                         <div class="widget w-100">
                                             <h4 class="widget-title">Informasi</h4>
                                             <div class="row">
                                                 <div class="col-md-6 col-sm-6 col-lg-6">
                                                     <div class="widget w-100">
                                                         <ul class="mb-0 list-unstyled w-100">
                                                             <li><a href="{{ route('index') }}" title="">Beranda</a></li>
                                                             <li><a href="{{ route('history') }}" title="">Sejarah</a></li>
                                                             <li><a href="{{ route('family') }}" title="">Silsilah</a></li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6 col-sm-6 col-lg-6">
                                                     <div class="widget w-100">
                                                         <ul class="mb-0 list-unstyled w-100">
                                                             <li><a href="{{ route('gallery') }}" title="">Galeri</a></li>
                                                             <li><a href="{{ route('activity') }}" title="">Kegiatan</a></li>
                                                             <li><a href="{{ route('news') }}" title="">Berita</a></li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-5 col-sm-5 col-lg-5">
                                         <div class="widget w-100">
                                             <h4 class="widget-title">Kontak</h4>
                                             <ul class="cont-info-list2 mb-0 list-unstyled w-100">
                                                 <li><i class="thm-clr">Telepon:</i><a href="tel:{{ $general->phone }}">{{ $general->phone }}</a></li>
                                                 <li><i class="thm-clr">Email:</i><a href="mailto:{{ $general->email }}" title="">{{ $general->email }}</a></li>

                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-5 col-sm-6 col-lg-5">
                                 <div class="widget w-100">
                                     <h4 class="widget-title"></h4>
                                     <ul class="mb-0 list-unstyled w-100">
                                         <li>{{ $general->address }}</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div><!-- Footer Data -->
         </div>
     </div>
 </footer><!-- Footer -->
 <div class="bottom-bar dark-bg2 text-center w-100">
     <p class="mb-0"><a href="{{ route('index') }}" title="Home">{{ $general->website_name }}</a> - Copyright {{ date('Y') }}.</p>
 </div><!-- Bottom Bar -->
