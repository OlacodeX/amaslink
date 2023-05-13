@extends('layouts.maind')
<style>
      .col-md-12 .card{
        background: #f1f9f9;
          margin-top: 0;
          padding-top: 0;
      }
      .col-md-12{
        background: #f1f1f1;
          margin-top: 0;
          padding-top: 0;
      }
      div.container.main{
          background: #f9f9f9;
          margin-top: 0;
          margin-bottom: 20px;
      }
      p.pull-right {
          float: left;
          text-align: center;
          font-size: 12px;
          color: #b20000;

      }
      p.pull-right span{
          font-size: 30px;
          color: #171919;
          font-family:'poppins';
          font-weight: bold;
      }
      p.pull-left.t{
          background: #0083c9;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.a{
          background: #73cf42;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.e{
          background: #f04d4e;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.p{
          background: #ff9700;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;

      }
      .col-sm-3{
          background: #ffffff;
          padding: 15px 15px;

      }
      .card-header h5{
          padding-top: 15px;
          padding-bottom: 15px;
          padding-left: 20px;
          color: #b20000;

      }
      td img{
          width: 50px;
          height: 50px;
      }
.page-item.active .page-link {
z-index: 1;
color: #fff;
background-color: #b20000;
border-color: #b20000;
}
.page-item .page-link {
color: #b20000;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
@media only screen and (max-width: 768px) {
      .col-sm-3{
          background: #ffffff;
          padding: 15px 15px;
            margin-top: 100px;
      }
      .card-header h5{
          padding-top: 15px;
          padding-bottom: 15px;
          padding-left: 20px;
          color: #b20000;

      }
      .card-body{
          margin-top: 50px;

      }
      p.pull-left{
          float: none;
          margin-left: 30px;
      }
      p.pull-right {
          float: none;
          text-align: center;
          font-size: 12px;
          color: #b20000;

      }
      .col-md-12 .card{
        background: transparent;
          margin-top: 0;
          padding-top: 0;
      }
      .col-md-12{
        background: transparent;
          margin-top: 0;
          padding-top: 0;
      }
      div.container.main{
          background: transparent;
          margin-top: 0;
      }
}
</style>
@section('content')
@include('inc.navadmin')
<div class="" id="main" style="margin-left:250px">

<div class="w3-container">
    @include('inc.messages')
 
    <p>
        <a href="./all_listings" class="btn btn-info btn-sm">All({{App\Models\Listings::count()}})</a>
        <a href="./admin_pending" class="btn btn-info btn-sm">Pending({{App\Models\Listings::where('status', 'pending')->count()}})</a>
        <a href="./all_approved" class="btn btn-info btn-sm">Approved({{App\Models\Listings::where('status', 'approved')->count()}})</a>
       
    </p>
 
    <h3 class="text-justify title">Listings Awaiting <span>Approval</span></h3>
    @if (count($listings) > 0)
    <table class="table table-stripped table-condensed table-responsive">
        <tr>
            <th>Payment ID</th>
            <th>Title</th>
            <th>Images</th>
            <th>Status</th>
            <th></th>
            <th>Actions</th>
            <th></th>
        </tr>
        @foreach ($listings as $listing)
        <tr>
            <td>{{$listing->payment_id}}</td>
        <td style="font-size: 15px; width:20px;">{{$listing->title}}</td>
        @if ($listing->type == 'free' && $listing->priority == 'No')
        <td><img src="img/cover_images/listings/{{$listing->image1}}" alt=""></td>

        @endif
        @if ($listing->type == 'free' && $listing->priority == 'Yes')
        <td>
        <img src="img/cover_images/listings/{{$listing->image1}}" alt="">
        <img src="img/cover_images/listings/{{$listing->image2}}" alt="">
        </td>
        @endif
       @if ($listing->type == 'paid')
            <td>
                <img src="img/cover_images/listings/{{$listing->image1}}" alt=""><img src="img/cover_images/listings/{{$listing->image2}}" alt="">
                <img src="img/cover_images/listings/{{$listing->image3}}" alt=""><img src="img/cover_images/listings/{{$listing->image4}}" alt=""><img src="img/cover_images/listings/{{$listing->image5}}" alt="">
        
            </td>

            @endif
        <td>{{$listing->status}}</td>
        <td>
            {!!Form::open(['action' => ['SuperadminController@update'], 'method' => 'POST', 'class' => 'pull-left', 'style' => 'margin-right:20px;'])!!}
            {{Form::hidden('id', $listing->id)}}
            {{Form::hidden('title', $listing->title)}}
            {{Form::hidden('email', $listing->user_email)}}
            {{Form::submit('Approve listing', ['class' => 'btn btn-danger btn-sm'])}}
            {!!Form::close()!!}
            
        </td>
        <td>
                {!!Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'POST', 'class' => 'pull-left', 'style' => 'margin-right:20px;'])!!}
    
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete listing', ['class' => 'btn btn-danger btn-sm'])}}
                {!!Form::close()!!}
        </td>
            
                <td><a href="listings/{{$listing->id}}/edit" class="btn btn-danger btn-sm">Edit</a></td>
                <td>
            {!!Form::open(['action' => 'ListingsController@removeimg', 'method' => 'GET', 'style' => 'margin-right:20px;'])!!}

            {{Form::hidden('id', $listing->id)}}
            {{Form::submit('Remove Image', ['class' => 'btn btn-danger btn-sm'])}}
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
</div>


<style type="text/css">
    a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
    a.gflag img {border:0;}
    a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
    #goog-gt-tt {display:none !important;}
    .goog-te-banner-frame {display:none !important;}
    .goog-te-menu-value:hover {text-decoration:none !important;}
    body {top:0 !important;}
    #google_translate_element2 {display:none!important;}
    </style>
    
    <br /><div id="google_translate_element2"></div>
    <script type="text/javascript">
    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
    </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    
    
    <script type="text/javascript">
    /* <![CDATA[ */
    eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
    /* ]]> */
    </script>
@endsection
