@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads
@endsection
@include('inc.css.searchresult')
@section('content')
    <div class="row main">
        @include('inc.nav')
    </div>
<div class="row ads">
    <div class="container text-justify">
        <h2 class="title text-center">SEARCH RESULTS</h2>
        <h6 class="text-center"> BUY & SELL ANYTHING</h6>
        @if (count($listings_all) > 0)
        @if (count($results) > 0 ||  count($boosted_paid) > 0)
            @foreach (
                // Loop through them
                $boosted_paid as $boosted_paid
                )
        <a href="listings/{{$boosted_paid->id}}" title="">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="container folio">
            <div class="panel-default">
                <div class="panel-body">
                    <div class="bottom-left">
                        <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $boosted_paid->id)->count() }}</span>
                    </div>
                    <div class="bottom-right">
                        {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
                        {{Form::hidden('id', $boosted_paid->id)}}
                        {{Form::hidden('title', $boosted_paid->title)}}
                        {{Form::hidden('image', $boosted_paid->image1)}}
                        {{Form::hidden('type', $boosted_paid->type)}}
                        @guest
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                        @else 
                        @if(empty(App\Models\Favorite::where('user_id', '=', auth()->user()->id)->where('listing_id', '=',  $boosted_paid->id)->first()))
                         
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                        @else 
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
                         @endif
                         @endguest
                         {{ Form::close() }}
                    </div>
                    @if (!empty($boosted_paid->image1))
                    <img src="{{ URL::to('img/cover_images/listings/'.$boosted_paid->image1)}}" class="img-responsive" alt="">
                    @else
                    <img src="{{ URL::to('img/AMAS.png')}}" class="img-responsive" alt="">
                        
                    @endif
                </div>
                <div class="panel-footer">
                    <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($boosted_paid->title,6)!!}</small>
                    <hr>
                    <p class="text-justify">
                        @if (!empty($boosted_paid->country))
                        <i class="fa fa-map-marker"></i>{{$boosted_paid->country}}
                        @endif     
                        @if (!empty($boosted_paid->price))
                        | <span>$</span>{{$boosted_paid->price}}
                        @endif
                        
                    </p>
                    
                </div>
                <div class="overlay">
                    <p>
                        <a href="listings/{{$boosted_paid->id}}" class="icon" title="">
                        <i class="fa fa-plus-circle"></i>
                        </a>
                    </p>
                    </div>
                <div class="top-left">
                    <span class="btn btn-primary">FEATURED</span>
                </div>
            </div>
            </div>
        </div>
        </a>
        @endforeach
        @foreach (
            // Loop through them
            $results as $result
            )
        <a href="listings/{{$result->id}}" title="">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 one">
        <div class="container folio">
        <div class="panel-default">
            <div class="panel-body">
                <div class="bottom-left">
                    <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $result->id)->count() }}</span>
                </div>
                <div class="bottom-right">
                    {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
                    {{Form::hidden('id', $result->id)}}
                    {{Form::hidden('title', $result->title)}}
                    {{Form::hidden('image', $result->image1)}}
                    {{Form::hidden('type', $result->type)}}
                        

                    @guest
                    <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                    @else 
                    @if(empty(App\Models\Favorite::where('user_id', '=', auth()->user()->id)->where('listing_id', '=',  $result->id)->first()))
                     
                    <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                    @else 
                    <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
                    
                     @endif
                     @endguest
                     {{ Form::close() }}
                </div>
                @if (!empty($result->image1))
                <img src="{{ URL::to('img/cover_images/listings/'.$result->image1)}}" class="img-responsive" alt="">
                @else
                <img src="{{ URL::to('img/AMAS.png')}}" class="img-responsive" alt="">
                    
                @endif
            </div>
            <div class="panel-footer">
                <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($result->title,6)!!}</small>
                <hr>
                <p class="text-justify">
                    @if (!empty($result->country))
                    <i class="fa fa-map-marker"></i>{{$result->country}}
                    @endif     
                    @if (!empty($result->price))
                    | <span>$</span>{{$result->price}}
                    @endif
                    
                </p>
                
            </div>
            <div class="overlay">
                <p>
                    <a href="listings/{{$result->id}}" class="icon" title="">
                    <i class="fa fa-plus-circle"></i>
                    </a>
                </p>
                </div>
                <div class="top-left">
                    <span class="btn btn-primary">FEATURED</span>
                </div>
        </div>
        </div>
    </div>
    </a>
    @endforeach
            @endif         
            @if (count($boosted_free) > 0 ||  count($results_free) > 0)
            @foreach (
                // Loop through them
                $boosted_free as $boosted_free
                )
        <a href="listings/{{$boosted_free->id}}" title="">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="container folio">
            <div class="panel-default">
                <div class="panel-body">
                    <div class="bottom-left">
                        <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $boosted_free->id)->count() }}</span>
                    </div>
                    <div class="bottom-right">
                        {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
                        {{Form::hidden('id', $boosted_free->id)}}
                        {{Form::hidden('title', $boosted_free->title)}}
                        {{Form::hidden('image', $boosted_free->image1)}}
                        {{Form::hidden('type', $boosted_free->type)}}

                        @guest
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                        @else 
                        @if(empty(App\Models\Favorite::where('user_id', '=', auth()->user()->id)->where('listing_id', '=',  $boosted_free->id)->first()))
                         
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                        @else 
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
                        
                         @endif
                         @endguest
                         {{ Form::close() }}
                    </div>
                    @if (!empty($boosted_free->image1))
                    <img src="{{ URL::to('img/cover_images/listings/'.$boosted_free->image1)}}" class="img-responsive" alt="">
                    @else
                    <img src="{{ URL::to('img/AMAS.png')}}" class="img-responsive" alt="">
                        
                    @endif
                </div>
                <div class="panel-footer">
                    <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($boosted_free->title,6)!!}</small>
                    <hr>
                    <p class="text-justify">
                        @if (!empty($boosted_free->country))
                        <i class="fa fa-map-marker"></i>{{$boosted_free->country}}
                        @endif     
                        @if (!empty($boosted_free->price))
                        | <span>$</span>{{$boosted_free->price}}
                        @endif
                        
                    </p>
                    
                </div>
                <div class="overlay">
                    <p>
                        <a href="listings/{{$boosted_free->id}}" class="icon" title="">
                        <i class="fa fa-plus-circle"></i>
                        </a>
                    </p>
                    </div>
            </div>
            </div>
        </div>
        </a>
        @endforeach
        @foreach (
            // Loop through them
            $results_free as $result_free
            )
        <a href="listings/{{$result_free->id}}" title="">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 one">
        <div class="container folio">
        <div class="panel-default">
            <div class="panel-body">
                <div class="bottom-left">
                    <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $result_free->id)->count() }}</span>
                </div>
                <div class="bottom-right">
                    {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
                    {{Form::hidden('id', $result_free->id)}}
                    {{Form::hidden('title', $result_free->title)}}
                    {{Form::hidden('image', $result_free->image1)}}
                    {{Form::hidden('type', $result_free->type)}}
                    @guest
                    <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                    @else 
                    @if(empty(App\Models\Favorite::where('user_id', '=', auth()->user()->id)->where('listing_id', '=',  $result_free->id)->first()))
                     
                    <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                    @else 
                    <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
                    
                     @endif
                     @endguest
                     {{ Form::close() }}
                </div>
                @if (!empty($result_free->image1))
                <img src="{{ URL::to('img/cover_images/listings/'.$result_free->image1)}}" class="img-responsive" alt="">
                @else
                <img src="{{ URL::to('img/AMAS.png')}}" class="img-responsive" alt="">
                    
                @endif
            <div class="panel-footer">
                <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($result_free->title,6)!!}</small>
                <hr>
                <p class="text-justify">
                    @if (!empty($result_free->country))
                    <i class="fa fa-map-marker"></i>{{$result_free->country}}
                    @endif     
                    @if (!empty($result_free->price))
                    | <span>$</span>{{$result_free->price}}
                    @endif
                    
                </p>
                
            </div>
            <div class="overlay">
                <p>
                    <a href="listings/{{$result_free->id}}" class="icon" title="">
                    <i class="fa fa-plus-circle"></i>
                    </a>
                </p>
                </div>
        </div>
        </div>
    </div>
    </a>
    @endforeach
    <div class="text-center">
        <a href="" id="loadMoree" class="btn btn-success">LOAD MORE LISTINGS</a> 
        @endif
    </div>
        
    @else
        <p class="text-center">Your search returned no result <br> <a class="btn btn-success" href="{{ URL::previous() }}">Go back</a></p>
    @endif             
    </div>
    
</div>
<div class="row">
    @include('inc.footer')
</div>

<script>
    function myFunction(x) {
    x.classList.toggle("fa fa-bookmark");
}
var msg = '{{Session::get('alert')}}';
var exist = '{{Session::has('alert')}}';
if (exist) {
    alert(msg);
}
</script>

@endsection