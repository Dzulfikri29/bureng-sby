@extends('layouts.app', ['registration' => false])

@section('title', Str::headline('Pendaftaran'))

@section('content')
    <!--Contact Two Start-->
    <section class="about-three">
        <div class="container">
            <div class="section-title">
                <span class="section-title__tagline">{{ $pendaftaran->title }}</span>
                <h2 class="section-title__title agrion-font text-capitalize">{{ $pendaftaran->subtitle }}</h2>
                <div class="section-title__icon">
                    <img src="assets/images/icon/section-title-icon-1.png" alt="">
                </div>
            </div>
            <div class="contact-two__form-box">
                <div class="row">
                    <div class="col-md-5 mb-5">
                        <form id="registration-form" action="{{ route('registration.store') }}" class="contact-two__form contact-form-validated" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="mb-2 col-xl-6">
                                    <div class="contact-form__input-box">
                                        <input type="text" placeholder="Nama Pendaftar" name="institution">
                                    </div>
                                    <small class="error text-capitalize validation-error-message d-none" id="institution_error"></small>
                                </div>
                                <div class="mb-2 col-xl-6">
                                    <div class="contact-form__input-box">
                                        <input type="text" placeholder="Nomor Telepon" name="phone" value="{{ @old('phone') }}">
                                    </div>
                                    <small class="error text-capitalize validation-error-message d-none" id="phone_error"></small>
                                </div>
                                <div class="mb-2 col-xl-12">
                                    <div class="contact-form__input-box text-message-box">
                                        <textarea name="address" placeholder="Alamat" rows="2">{{ @old('address') }}</textarea>
                                    </div>
                                    <small class="error text-capitalize validation-error-message d-none" id="address_error"></small>
                                </div>
                                <div class="mb-2 col-xl-6">
                                    <label for="">Dari Tanggal</label>
                                    <div class="contact-form__input-box">
                                        <input type="date" placeholder="Tanggal Mulai" name="from_date" value="{{ @old('from_date') }}">
                                    </div>
                                    <small class="error text-capitalize validation-error-message d-none" id="from_date_error"></small>
                                </div>
                                <div class="mb-2 col-xl-6">
                                    <label for="">Sampai Tanggal</label>
                                    <div class="contact-form__input-box">
                                        <input type="date" placeholder="Tanggal Selesai" name="to_date" value="{{ @old('to_date') }}">
                                    </div>
                                    <small class="error text-capitalize validation-error-message d-none" id="to_date_error"></small>
                                </div>
                                <div class="mb-2 col-xl-12">
                                    <div class="contact-form__input-box">
                                        <input type="text" placeholder="Pelatihan" name="activity" value="{{ @old('activity') }}">
                                    </div>
                                    <small class="error text-capitalize validation-error-message d-none" id="activity_error"></small>
                                </div>
                                <div class="mb-2 col-xl-12">
                                    <div class="contact-form__input-box text-message-box">
                                        <textarea name="description" placeholder="Keterangan Lain" rows="2">{{ @old('description') }}</textarea>
                                    </div>
                                    <small class="error text-capitalize validation-error-message d-none" id="description_error"></small>
                                </div>
                                <div class="col-xl-12">
                                    {!! htmlFormSnippet() !!}
                                    <small class="error text-capitalize validation-error-message d-none" id="g-recaptcha-response_error"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-form__btn-box text-end">
                                        <button type="submit" id="button-submit" class="thm-btn contact-two__btn">Daftar<i class="icon-right-arrow"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Two End-->
@endsection

@section('js')
    <script src="{{ asset('assets/vendors/fullcalendar/dist/index.global.min.js') }}"></script>
    <script src="{{ asset('assets/js/registration.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        $('.menu-activity').addClass('current');

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                eventDidMount: function(info) {
                    $(info.el).popover({
                        title: '',
                        placement: 'top',
                        trigger: 'hover',
                        content: info.event.title,
                        container: 'body'
                    });
                },
                events: `${base_url}/event`,
                contentHeight: "auto",
                handleWindowResize: true,
            });
            calendar.render();
        });
    </script>
@endsection
