@extends('layouts.main')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/contact_responsive.css')}}">
@endsection


@section('content')
    <div class="container contact_container">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Contact Us -->

        <div class="row">

            <div class="col-lg-6 contact_col">
                <div class="contact_contents">
                    <h1>Contact Us</h1>
                    <p>คือจริงๆมีวิธีติดต่อทางเรามากมายหลายทาง เอาเป็นว่าเดี๋ยวทิ้งลิงค์ไว้ละกัน :)</p>
                    <div>
                        <p>แจกเบอร์ก็มา : 0614045527</p>
                        <p>poicaptiondx@gmail.com</p>
                    </div>
                    <div>
                        <p></p>
                    </div>
                    <div>
                        <p>Open hours: 25 hours Everyday bro!!</p>
                        <p>Sunday: ก็ยังเปิดอยู่</p>
                    </div>
                </div>

                <!-- Follow Us -->

                <div class="follow_us_contents">
                    <h1>Follow Us</h1>
                    <ul class="social d-flex flex-row">
                        <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

            </div>

        </div>
    </div>


@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
    <script src="{{asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/contact_custom.js')}}"></script>
@endsection