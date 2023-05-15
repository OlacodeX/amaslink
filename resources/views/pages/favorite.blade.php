@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads
@endsection
@include('inc.css.favorite')
@section('content')
    <div class="row main">
        @include('inc.nav')
    </div>
<div class="row ads">
    <div class="container text-justify">
        <h2 class="title text-center">YOUR WISH LIST</h2>
        <h6 class="text-center"> BUY & SELL ANYTHING</h6>
        
        @if (count($favorites) > 0)
            @foreach (
                // Loop through them
                $favorites as $favorite
                )
                @if ($favorite->listing_type !== 'paid/auction')
                <a href="listings/{{$favorite->listing_id}}" class="icon" title="">
                @else
                <a href="auctions/{{$favorite->listing_id}}" class="icon" title="">
                    
                @endif
        <!--<a href="javascript:{}" onclick="document.getElementById('my_form_9').submit();">
            {{ Form::open(['action' => ['ListingsController@show_f'], 'method' => 'POST', 'id' => 'my_form_9']) }}  
            {{Form::hidden('id', $favorite->listing_id)}}
             {{ Form::close() }}---->
        <div class="col-sm-3">
            <div class="container folio">
            <div class="panel-default">
                <div class="panel-body">
                    <div class="bottom-left">
                        <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $favorite->id)->count() }}</span>
                    </div>
                    <div class="bottom-right">
                        {{ Form::open(['action' => 'ListingsController@removebookmark', 'method' => 'POST']) }}  
                        {{Form::hidden('id', $favorite->id)}}
                        {{Form::hidden('title', $favorite->title)}}
                        {{Form::hidden('image', $favorite->image1)}}

                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Bookmark"></button>
                        
                         {{ Form::close() }}
                    </div>
                    <img src="{{ URL::to('img/cover_images/listings/'.$favorite->image1)}}" class="img-responsive" alt="">
                </div>
                <div class="panel-footer">
                    <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($favorite->title,4)!!}</small>
                    <hr>
                    <p class="text-justify"><i class="fa fa-map-marker"></i>{{$favorite->country}} | <span>$</span>{{$favorite->price}}</p>
                    
                </div>
            </div>
            </div>
        </div>
        </a>
        @endforeach
        <div class="text-center">
            <div class="d-flex justify-content-center" style="padding-bottom:10px">
            
                @if($favorites->currentPage() > 1)
                <a href="{{ $favorites->previousPageUrl() }}" class="btn btn-primary pagination">Previous</a>
                @endif
                
                @if($favorites->hasMorePages())
                <a href="{{ $favorites->nextPageUrl() }}" class="btn btn-primary pagination">Next</a>
                @endif
            </div>
        </div>
        @else
            <p class="text-center">Nothing to display here.</p>
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