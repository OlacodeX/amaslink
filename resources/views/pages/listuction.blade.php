@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads
@endsection
@include('inc.css.listuction')
@section('content')
    <div class="row main">
        @include('inc.nav')
    </div>
<div class="row ads">
    <div class="container text-justify">
        <h2 class="title text-center">ITEMS FOR AUCTION</h2>
        <h6 class="text-center"> BUY & SELL ANYTHING</h6>
        @if (count($listings_all) > 0)
            @foreach (
                // Loop through them
                $listings_all as $listing
                )
        <a href="auctions/{{$listing->id}}" title="">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="container folio">
            <div class="panel-default">
                <div class="panel-body">
                    <div class="bottom-left">
                        <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $listing->id)->count() }}</span>
                    </div>
                    <div class="bottom-right">
                        {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
                        {{Form::hidden('id', $listing->id)}} 
                        {{Form::hidden('title', $listing->title)}}
                        {{Form::hidden('image', $listing->image1)}}
                        {{Form::hidden('type', $listing->type)}}
                        @guest
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                        @else 

                        @if(empty(App\Models\Favorite::where('user_id', '=',  auth()->user()->id)->where('listing_id', '=',  $listing->id)->first()))
                         
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                        @else
                        <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
                        @endif
                        @endguest
                        
                         {{ Form::close() }}
                    </div>
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image1)}}" class="img-responsive" alt="">
                </div>
                <div class="panel-footer">
                    <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($listing->title,5)!!}</small>
                    <hr>
                    <p class="text-justify"><i class="fa fa-map-marker"></i>{{$listing->country}} | <span>$</span>{{$listing->price}}</p>
                    
                </div>
                @if ($listing->type === 'paid/auction')
                    
                    <div class="top-left">
                        <span class="btn btn-primary">FEATURED</span>
                    </div>
                @endif
            </div>
            </div>
        </div>
        </a>
    @endforeach
    </div>
    
    <div class="text-center">
        {{-- <a href="" id="loadMoree" class="btn btn-success">LOAD MORE LISTINGS</a> --}}
        <div class="d-flex justify-content-center" style="padding-bottom:10px">
            
            @if($listings_all->currentPage() > 1)
                <a href="{{ $listings_all->previousPageUrl() }}" class="btn btn-primary pagination">Previous</a>
            @endif

            @if($listings_all->hasMorePages())
                <a href="{{ $listings_all->nextPageUrl() }}" class="btn btn-primary pagination">Next</a>
            @endif
            {{-- {!! $listings_all->links() !!} --}}
        </div>    
        @else
        <p class="text-center">No Items Yet <br> <a class="btn btn-success" href="{{ URL::previous() }}">Go back</a></p>
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