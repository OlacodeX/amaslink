<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
<div class="container main">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-justify">
                    <h5>You are logged in as <strong>{{ Auth::user()->name }}</strong> </h5>
                </div>
                @include('inc.messages')
                <div class="card-body">
                    <div class="col-sm-3">
                        <p class="pull-left t"><i class="fa fa-list"></i></p>
                        <p class="pull-right">
                            
                            <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->count() }} </span> <br>
                            Total Listings
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <p class="pull-left a"><i class="fa fa-check"></i></p>
                        <p class="pull-right">
                            
                           <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->where('status', 'approved')->count()}}  </span><br>
                            Active Listings
                        </p>

                    </div>
                    <div class="col-sm-3">
                        <p class="pull-left e"><i class="fa fa-exclamation-triangle"></i></p>
                        <p class="pull-right">
                            
                            <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->where('status', 'expired')->count()}}  </span><br>
                            Expired Listings
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <p class="pull-left p"><i class="fa fa-clock-o"></i></p>
                        <p class="pull-right">
                            
                            <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->where('status', 'pending')->count()}}  </span><br>
                            Pending Approval
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <p>
        <a href="" class="btn btn-info btn-sm">All</a>
        <a href="./pending" class="btn btn-info btn-sm">Pending</a>
        <a href="./approved" class="btn btn-info btn-sm">Approved</a>
    </p>
<h3 class="text-justify title">All <span>Listings</span></h3>
@if (count($listings) >= 0)
<table class="table table-stripped">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Images</th>
        <th>Status</th>
        <th></th>
        <th>Actions</th>
        <th></th>
    </tr>
    @foreach ($listings as $listing)
    <tr>
    <td>{{$listing->title}}</td>
    <td>{{$listing->description}}</td>
    <td>
        <img src="img/cover_images/listings/{{$listing->image1}}" alt="">
        <img src="img/cover_images/listings/{{$listing->image2}}" alt=""><img src="img/cover_images/listings/{{$listing->image3}}" alt=""> <img src="img/cover_images/listings/{{$listing->image4}}" alt=""><img src="img/cover_images/listings/{{$listing->image5}}" alt="">

    </td>
    <td>{{$listing->status}}</td>
    @if ($listing->type == 'free')
    <td><a href="listings/{{$listing->id}}/edit" class="btn btn-danger btn-sm">Edit</a></td>
    @else
    <td><a href="listings/{{$listing->id}}/edit_t" class="btn btn-danger btn-sm">Edit</a></td>
    @endif
    <td>
            {!!Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'POST', 'class' => 'pull-left', 'style' => 'margin-right:20px;'])!!}

            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete listing', ['class' => 'btn btn-danger btn-sm'])}}
            {!!Form::close()!!}
    </td>
    </tr>
    @endforeach
</table>
<div style="text-align:right;">
        <!-----The pagination link----->
        {{$listings->links()}}
</div>
@else
<p>No Record Found</p>    
@endif
</div>