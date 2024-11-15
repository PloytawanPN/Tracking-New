@extends('Pets.Layout.Layout')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .slide-show {
            width: 100vw;
            overflow: hidden;
            margin-top: -10px;
        }

        .swiper-container {
            position: relative;
        }

        .swiper-slide {
            background-color: rgb(230, 230, 230);
            width: 100%;
            height: 300px;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(80%);
        }

        .swiper-slide label {
            position: absolute;
            color: white;
            font-size: 60px;
            top: 80px;
            left: 50px;
            z-index: 999;
        }

        .swiper-slide .detail {
            position: absolute;
            color: white;
            font-size: 16px;
            top: 150px;
            left: 50px;
            max-width: 700px;
            word-wrap: break-word;
            word-break: break-word;
            line-height: 1.5;
            z-index: 999;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: rgba(255, 255, 255, 0.24);
        }

        .swiper-pagination-bullet-active {
            background-color: rgb(255, 255, 255);
        }

        @media only screen and (max-width: 850px) {

            .swiper-slide label {
                position: absolute;
                width: 100%;
                left: 0;
                right: 0;
                text-align: center;
                top: 70px;
                font-size: 50px;

            }

            .swiper-slide .detail {
                position: absolute;
                color: rgb(236, 236, 236);
                width: calc(100% - 40px);
                top: 140px;
                left: 20px;
                right: 0;
                text-align: center;
                max-width:none;
                font-size: 14px;
                
            }
        }
    </style>
@endsection
@section('title')
    Homepage
@endsection
@section('content')
    <div class="slide-show">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <label>Galyxie Pet</label>
                    <p class="detail">
                        {{__('messages.banner_1')}}
                    </p>
                    <img src="{{ asset('assets/images/banner1.jpg') }}" alt="Slide 1" />
                </div>
                <div class="swiper-slide">
                    <label>Galyxie Pet</label>
                    <p class="detail">
                        {{__('messages.banner_1')}}
                    </p>
                    <img src="{{ asset('assets/images/banner2.jpg') }}" alt="Slide 2" />
                </div>
                <div class="swiper-slide">
                    <label>Galyxie Pet</label>
                    <p class="detail">
                        {{__('messages.banner_1')}}
                    </p>
                    <img src="{{ asset('assets/images/banner3.jpg') }}" alt="Slide 3" />
                </div>
            </div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                /* autoplay: {
                    delay: 3000,
                }, */
            });
        });
    </script>
@endsection
