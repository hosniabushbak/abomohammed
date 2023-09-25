@extends('FrontEnd.layout.app')
@section('content')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WJPPW83"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!---------------------Hero Section Start------------------------->
    @include('FrontEnd.partials.hero')
    <!---------------------About us start------------------------------>
    @include('FrontEnd.partials.about-us')
    <!------------------Rejester Now strat--------------------------------------->
    @include('FrontEnd.partials.register')
    <!-----------------------------------about trainers Start--------------------------->
    @include('FrontEnd.partials.about-trainer')
    <!------------------------------------Students' opinions start--------------------->
    @include('FrontEnd.partials.opinions')

    @include('FrontEnd.partials.register')
    <!-------------------------------------Footer Start------------------------------>
    @include('FrontEnd.partials.footer')
    <!--------------------------------------Footer End------------------------------->

    <!----------------------------------Scripts Files--------------------------------------->
    @include('FrontEnd.partials.script')


@endsection
