@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | Forum
@endsection
@include('inc.css.forum')
@section('content')
    @include('inc.navother')
    <div class="row forum">
        <div class="container">
            <h3 class="text-center title" style="padding-bottom:20px;">JOIN THE <span>DISCUSSION</span></h3>
            <div class="col-sm-4">
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
                  <div class="panel panel-default ad">
                      <a data-toggle="collapse" href="#collapse2">
                      <div class="panel-heading">
                          <h4 class="panel-title text-center"> How To Post Ads</h4>
                      </div>
                      </a>
                    <div id="collapse2" class="panel-collapse collapse">
                      <div class="panel-body">
                        <li>Click on <a href="">Post Ad For FREE NOW</a></li>
                        <li>You will be immediately redirected to our Login page (if you are not a registered user). You will have to fill out all the required fields and click on ‘Register’ button at the bottom of the page.</li>
                        <li>After Registering, Complete all the required information about your item.</li>
                        <li>After filling out the required fields, click on “Post” button.</li>
                        <li>Once you post your ad Your advert will be published shortly once moderation process is completed.</li>
                        <li>Once your advert is live, you will receive a notification email.</li>
                        <li>Be ready to receive numerous incoming calls from your potential buyers. Good luck with your sales!</li>
                        <li>You can have a look at our premium packages also for more sales and boost packages!</li>
        
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Forum Topics</h3>
                    <small style="color: #b20000;">To comment on a topic click on it.</small>

                    </div>
                    <div class="panel-body">
                        @if (
                            //if there is data in the db
                        count($topics) > 0
                        )
                        @foreach (
                            // Loop through them
                            $topics as $topic
                            )
                        <a href="{{ route('communities.show', $topic->slug) }}" style="text-decoration:none;color:#b20000;">
                        <li style="text-transform: uppercase;">{{$topic->topic}}</li> 
                        </a>
                        <span><i class="fa fa-clock-o"></i>{{$topic->created_at}}</span> <span> <i class="fa fa-user"></i>{{$topic->user_name}}</span>
                        
                        <hr>
                        @endforeach
    
                        <div class="col-md-12" style="text-align:right;">
                                <!-----The pagination link----->
                                {{$topics->links()}}
                        </div>
                            @else
                            <p>No post found</p>
                                
                            @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4 two">
                <a href=""><img src="img/add.png" alt="" class="img-responsive"></a> 
                 <div class="panel-group">
                     <div class="panel panel-default ad">
                         <a data-toggle="collapse" href="#collapse3">
                         <div class="panel-heading">
                             <h4 class="panel-title text-center">
                             Safety Tips
                             </h4>
                         </div>
                         </a>
                       <div id="collapse3" class="panel-collapse collapse in">
                         <div class="panel-body">
                             <ul>
                                 <li>Meet seller at a safe location</li>
                                 <li>Check the item before you buy</li>
                                 <li>Pay only after collecting item</li>
                             </ul>
                         </div>
                       </div>
                     </div>
                   <div class="panel panel-default ad" style="margin-bottom: 50px;">
                       <a data-toggle="collapse" href="#collapse4">
                       <div class="panel-heading">
                           <h4 class="panel-title text-center"> How To Post Ads</h4>
                       </div>
                       </a>
                     <div id="collapse4" class="panel-collapse collapse">
                       <div class="panel-body">
                         <li>Click on <a href="">Post Ad For FREE NOW</a></li>
                         <li>You will be immediately redirected to our Login page (if you are not a registered user). You will have to fill out all the required fields and click on ‘Register’ button at the bottom of the page.</li>
                         <li>After Registering, Complete all the required information about your item.</li>
                         <li>After filling out the required fields, click on “Post” button.</li>
                         <li>Once you post your ad Your advert will be published shortly once moderation process is completed.</li>
                         <li>Once your advert is live, you will receive a notification email.</li>
                         <li>Be ready to receive numerous incoming calls from your potential buyers. Good luck with your sales!</li>
                         <li>You can have a look at our premium packages also for more sales and boost packages!</li>
         
                       </div>
                     </div>
                   </div>
                 </div>
             </div>
            <div class="col-sm-3">
                <h3 class="title">Watch Live Videos From Amaslink Channel</h3>
                <hr class="hrr">
                <iframe src="https://www.youtube.com/embed/live_stream?channel=UCtr6z1xfyPLNSzzYUwMZCvQ" width="300" height="400"></iframe>
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
                
               
                ({{App\Models\Listings::where('category', 'MINERAL, CRUDE OIL')->where('status', 'approved')->count()}})
           
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