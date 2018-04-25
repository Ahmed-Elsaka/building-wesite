{{--
@if(count($bu)>0)
    @foreach(array_chunk($bu,3) as $buu)
        <div class="row">
            @foreach($buu as $b)
                <div class="col-md-4">
                    <div class="productbox">
                        <img src="http://lorempixel.com/460/250/" class="img-responsive">
                        <div class="producttitle">{{ $b['bu_name'] }}</div>
                        <p class="text-justify">{{ str_limit( $b['bu_small_dis'] ,50)  }}</p>
                        <div class="productprice">
                            <div class="pull-right">
                                <a href="#" class="btn btn-primary btm-sm" role="button">
                                    Show Details
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                </a>
                            </div>
                            <div class="pricetext">{{ $b['bu_price'] }} €</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
            <div class="clearfix"></div>
            <br>
    @else
    <div class="alert alert-danger">The is no Items now</div>

    @endif

--}}
@if(count($bu)>0)

            @foreach($bu as $key => $b)
                @if($key %3 ==0 && $key !=0)
                    <div class="clearfix"></div>
                @endif
                <div class="col-md-4">
                    <div class="productbox">
                        <img src="{{ checkIfImageIsExist( $b->image) }}" class="img-responsive">
                        <div class="producttitle">{{ $b->bu_name }}</div>
                        <p class="text-justify dis">{{ str_limit( $b->bu_small_dis ,50)  }}</p>
                        <hr>
                        <span>Area : {{ $b->bu_square }}    </span>
                        <span class="pull-right">Place : {{ bu_place()[$b->bu_place] }}</span>
                         <br>
                        <span> {{ bu_rent()[$b->bu_rent] }}</span>
                        <span class="pull-right">Type : {{ bu_type()[$b->bu_type] }}</span>

                         <br>

                        <div class="productprice">
                            <div class="pull-right">
                                <a href="{{ url('/SingleBuilding/'.$b->id) }}" class="btn btn-primary btm-sm" role="button">
                                    Show Details
                                    <span class="fa fa-arrow-circle-o-left" style="color: #ffffff"></span>
                                </a>
                            </div>
                            <div class="pricetext">{{ $b->bu_price }} €</div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="clearfix"></div><br>
@else
    <div class="alert alert-danger">The is no Items now</div>

@endif
