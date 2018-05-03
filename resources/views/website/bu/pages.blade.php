<div class="col-md-3">
    <div class="profile-sidebar">
        <!-- SIDEBAR USER TITLE -->
        <h2 style="margin-left: 10px">Property Option</h2>
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="active">
                    <a href="{{url('/ShowAllBuildings')}}">
                        <i class="glyphicon glyphicon-home"></i>
                        All Properties
                    </a>
                </li>
                <li>
                    <a href="{{url('/ForRent')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        For Rent </a>
                </li>
                <li>
                    <a href="{{url('/ForBuy')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        For Sale </a>
                </li>
                <li>
                    <a href="{{url('/type/0')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        For Flat</a>
                </li>
                <li>
                    <a href="{{url('/type/1')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        For Villa</a>
                </li>
                <li>
                    <a href="{{url('/type/2')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        For Chalet </a>
                </li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
    <br>
    <div class="profile-sidebar">
        <!-- SIDEBAR USER TITLE -->
        <h2 style="margin-left: 10px">Advanced Search </h2>
        <div class="profile-usermenu" style="padding-right: 10px; padding-left: 10px">
            {!! Form::open(['url' =>'/search', 'method'=>'get']) !!}
            <ul class="nav" style="width: 100% ">
                <li style="margin-top: 10px">
                    {!! Form::text("bu_price_from", null ,['class'=>'form-control','placeholder'=>'Price from']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::text("bu_price_to", null ,['class'=>'form-control','placeholder'=>'Price to']) !!}
                </li >
                <li style="margin-top: 10px" >
                    {!! Form::select("rooms",roomnumber(), null,['class'=>'form-control js-example-basic-single']) !!}
                </li>
                <li style=" margin-top: 10px  " >
                    {!! Form::select("bu_place",bu_place(), null,['class'=>'js-example-basic-single form-control']) !!}
                </li>
                <li style="margin-top: 10px ">
                    {!! Form::select("bu_type",bu_type(), null ,['class'=>'form-control','placeholder'=>'Building type']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::select("bu_rent",bu_rent(), null ,['class'=>'form-control','placeholder'=>'Operation type']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::text("bu_square",null,['class'=>'form-control','placeholder'=>'Area']) !!}
                </li>
                <li style="margin-top: 10px">
                    {!! Form::submit("Search",['class'=>'btn btn-success']) !!}
                </li>

            </ul>
            {!! Form::close() !!}
        </div>
        <!-- END MENU -->
    </div>




</div>