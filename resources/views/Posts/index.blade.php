@extends('layouts.mainone')
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="OlacodeX" />

@section('page_title')
{{config('app.name')}} | Blog
@endsection
@include('inc.css.index')
@section('content')
@include('inc.navother')
<div class="row">
        <div class="jumbotron text-center" style="background:linear-gradient(rgba(180, 4, 4, 0.76),rgba(8, 8, 8, 0.863)),url({{'img/cover_images/'.$mostRs->cover_image}}) no-repeat; background-position: center; background-size:cover;">
     
            <a href="{{ route('blog.show', $mostRs->slug) }}" style="text-decoration: none;">
            <h2 class="titlem">{{$mostRs->title}}</h2>
            </a>    
            <p>
                {!!Str::words( $mostRs->body,25)!!}
            </p>
            <small>{!!Str::words( $mostRs->created_at,1)!!} / {{$mostRs->author}} / {{$mostRs->category}}</small><br>
            <a href="{{ route('blog.show', $mostRs->slug) }}" class="btn btn-info btn-md">Read More</a>
        </div>
           
        </div>
        <div class="container">
        
        <div class="col-sm-3 img1">
           <a href=""><img src="img/add.png" alt="" class="img-responsive"></a> 
            <div class="panel-group">
                <div class="panel panel-default ad">
                    <a data-toggle="collapse" href="#collapse1">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">
                        Safety Tips
                        </h4>
                    </div>
                    </a>
                  <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul>
                            <li>Meet seller at a safe location</li>
                            <li>Check the item before you buy</li>
                            <li>Pay only after collecting item</li>
                        </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 img2">
            
    @if (
        //if there is data in the db
    count($posts) > 0
    )
        @foreach (
            // Loop through them
            $posts as $post
            )
@section('page_description')
{{config('app.name')}},{{config('app.name')}} blog, {{$post->title}}
@endsection
            
<a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none;">
    <img src="{{ URL::to('img/cover_images/'.$post->cover_image)}}" class="img-responsive" alt="">

</a>
<a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none;">
<h2 class="title">{{$post->title}}</h2>
</a>
<small>{!!Str::words( $post->created_at,1)!!} / {{$post->author}} / {{$post->category}}</small><br>
            <p>
                {!!Str::words( $post->body,25)!!}
                
</p>
    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-info btn-md pull-left">Read More</a><br>
    <div class="top-left">
        <span class="btn btn-primary"><i class="fa fa-eye"></i>{{App\Models\PostView::where('posts_id', $post->id)->count() }}</span>
                
    </div><br><br><br>
       <!---<a href="chat/create">me</a>--->
            @endforeach
    
    <div class="col-md-12" style="text-align:right;">
            <!-----The pagination link----->
            {{$posts->links()}}
    </div>
        @else
        <p>No post found</p>
            
        @endif
        </div>
        <div class="col-sm-3 last">
            <h3 class="title">Categories</h3>
            <hr class="hrr">
            
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_1']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'CURRENCY TRADING')}}
                 {{Form::submit('CURRENCY TRADING', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_2']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'MINERAL, CRUDE OIL')}}
                 {{Form::submit('MINERAL/CRUDE OIL', ['class' => 'btn btn-default', 'style' => 'text-transform:uppercase;'])}}
                
               
                
           
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'BUSINESS SALES')}}
                 {{Form::submit('BUSINESS SALES', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'MOBILE,ELECTRONICS')}}
                 {{Form::submit('MOBILE,ELECTRONICS', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'JOBS')}}
                 {{Form::submit('JOBS', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'REAL ESTATE, LANDS')}}
                 {{Form::submit('REAL ESTATE, LANDS', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'AUTOMOBILES')}}
                 {{Form::submit('AUTOMOBILES', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'KIDS AND BABIES')}}
                 {{Form::submit('KIDS AND BABIES', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'SPORT')}}
                 {{Form::submit('SPORT', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            <h3 class="title">Tags</h3>
            <hr class="hrr">
            <a href="./Posts" class="btn btn-default">Blog</a>
            <a href="./communities" class="btn btn-default">Forum</a>
            <a href="./alllistings" class="btn btn-default">Ad Listings</a>
            <a href="./contact" class="btn btn-default">Talk To Us</a>
        </div>
    </div>
    </div>

    <div class="row footer">
    @include('inc.footer')
    </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
            } else {
            document.getElementById("myBtn").style.display = "none";
            }
        }
        
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        function myFunction(x) {
            x.classList.toggle("fa fa-bookmark");
        }
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection