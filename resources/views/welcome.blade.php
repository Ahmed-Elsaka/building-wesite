@extends('layouts.app')
@section('title')
    Welcome
@endsection

@section('header')
    {!! Html::style('cus/css/select2.css') !!}


    <link rel="stylesheet" href="{{ Request::root() }}/main/css/reset.css"> <!-- CSS reset -->


    <link rel="stylesheet" href="{{ Request::root() }}/main/css/style.css"> <!-- Resource style -->
    <script src="{{ Request::root() }}/main/js/modernizr.js"></script> <!-- Modernizr -->

    <style>
        .banner{
            background: url({{ checkIfImageIsExist(getSetting('main_slider'), '/public/website/slider/','/website/slider/') }}) no-repeat center;
            min-height: 500px;
            width: 100%;
            webkit-background-size: 100%;
            moz-background-size: 100%;
            o-background-size: 100%;
            background-size: 100%;
            webkit-background-size: cover;
            moz-background-size: cover;
            o-background-size: cover;
            background-size: cover;
            padding-bottom: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="banner text-center" >
        <div class="container">
            <div class="banner-info">
                <h1>Welcome in {{ getSetting() }}</h1>
                <p>

                <div class="profile-usermenu" style="padding-right: 10px; padding-left: 10px">
                    {!! Form::open(['url' =>'/search', 'method'=>'get']) !!}
                    <div class="row">
                        <div class="col-lg-3">
                            {!! Form::text("bu_price_from", null ,['class'=>'form-control text-center js-example-basic-single','placeholder'=>'Price from']) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::text("bu_price_to", null ,['class'=>'form-control text-center js-example-basic-single','placeholder'=>'Price to']) !!}
                        </div>
                        <div class="col-lg-3" >
                            {!! Form::select("rooms",roomnumber(), null,['class'=>'form-control js-example-basic-single']) !!}
                        </div>
                        <div class="col-lg-3" >
                            {!! Form::select("bu_place",bu_place(), null,['class'=>'form-control js-example-basic-single ']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            {!! Form::select("bu_type",bu_type(), null ,['class'=>'form-control js-example-basic-single']) !!}
                        </div>
                        <div class="col-lg-3" >
                            {!! Form::select("bu_rent",bu_rent(), null ,['class'=>'form-control js-example-basic-single']) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::text("bu_square",null,['class'=>'form-control text-center','placeholder'=>'Area']) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::submit("Search",['class'=>'btn btn-success js-example-basic-single' ,'style'=>'width:100%']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                </p>
                <a class="banner_btn" href="{{ url('/ShowAllBuildings') }}"> More Properties</a> </div>
        </div>
    </div>
    <div class="main">


        <ul class="cd-items cd-container">
            @foreach(\App\BU::where('bu_status',1)->get() as $bu)
            <li class="cd-item">
                <img src="{{ checkIfImageIsExist($bu->image) }}" alt="{{$bu->name}}" title="{{$bu->name}}">
                <a href="#0" data-id="{{$bu->id}}" class="cd-trigger"  title="{{$bu->name}}">Quick View</a>
            </li> <!-- cd-item -->
            @endforeach

        </ul> <!-- cd-items -->

        <div class="cd-quick-view">
            <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li class="selected"><img src="/main/img/item-1.jpg" alt="Product 1"></li>
                    <li><img src="/main/img/item-2.jpg" alt="Product 2"></li>
                    <li><img src="/main/img/item-3.jpg" alt="Product 3"></li>
                </ul> <!-- cd-slider -->

                <ul class="cd-slider-navigation">
                    <li><a class="cd-next" href="#0">Prev</a></li>
                    <li><a class="cd-prev" href="#0">Next</a></li>
                </ul> <!-- cd-slider-navigation -->
            </div> <!-- cd-slider-wrapper -->

            <div class="cd-item-info">
                <h2>Produt Title</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, omnis illo iste ratione. Numquam eveniet quo, ullam itaque expedita impedit. Eveniet, asperiores amet iste repellendus similique reiciendis, maxime laborum praesentium.</p>

                <ul class="cd-item-action">
                    <li><button class="add-to-cart">Add to cart</button></li>
                    <li><a href="#0">Learn more</a></li>
                </ul> <!-- cd-item-action -->
            </div> <!-- cd-item-info -->
            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->



    </div>
@endsection
@section('footer')
    {{--
        {!! Html::script('cus/js/select2.js') !!}
    <script>
            $('.select2').select2();
    </script>
    --}}
    {!! Html::script('cus/js/select2.js') !!}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <!-- this libraries related to items in welcome page -->
    <script src="{{ Request::root() }}/main/js/jquery-2.1.1.js"></script>
    <script src="{{ Request::root() }}/main/js/velocity.min.js"></script>
    <script src="{{ Request::root() }}/main/js/main.js"></script> <!-- Resource jQuery -->
@endsection