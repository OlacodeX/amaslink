@extends('layouts.main')
@section('page_title')
{{config('app.name')}} | Edit listing
@endsection
<style>
    input.form-control,
    select.form-control,
    select{
        height: 30px;
        background: transparent;
        color: #b20000;
    }
    .checkbox label{
        font-size: 15px;
        color: #b20000;
    }
label{
    font-weight: normal;
    font-size: 11px;
    font-family: 'Fira Code', monospace;
    }
    form p{
        font-weight: bold;
        padding-top: 20px;
    }
    form{
        background: #ffffff;
        padding-left: 30px;
        padding-right: 30px;
    }
div.container.edit{
    margin-top:20px; 
    padding-bottom:100px;
    width:80%;
    border: 1px solid #f9f9f9;
    background: #f9f9f9;
    padding-top: 30px;
}
h1.create{
    margin-bottom: 50px;
}
.container.top{
    color: #b20000;
    background: #dff2fe;
    width: 80%;
    margin-top: 80px;
    padding-top: 10px;
    border-radius: 3px;
}
.fa.fa-info-circle{
    color: #0178ff;
}
form .col-sm-6{
    padding-left: 0;
    }
p.re,
form small{
        font-size: 10px;
        color: #b20000;
        padding-top: 3px;
    }
    input.btn.btn-success{
        background: #b20000;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 20px;
        color: #f1f1f1;
    }
    input.btn.btn-success:hover{
        font-weight:900;
        font-size: 20px;
        line-height: 1em;
        border-radius: 8px;
        color: #B2000093;
        border: 1px solid #B20000;
        background: transparent;
    }    
        input.form-control.fie{
            padding-top: 90px;
            padding-bottom: 90px;
            text-align: center;
            background: #aaaaaa;
            border:#B20000 2px dashed;
            border-radius: 0;
        }
        input.fie[type="file"]{
   -webkit-appearance: none;
   text-align: left;
   -webkit-rtl-ordering:  left;
}
input.fie[type="file"]::-webkit-file-upload-button{
   -webkit-appearance: none;
   margin: 0 0 0 300px;
   border: 1px solid #b20000;
   border-radius: 4px;
   padding: 10px 30px;
   background: transparent;
   color: #B20000;
   font-weight: bold;
}
input.fie[type="file"]::-webkit-file-upload-text{
   -webkit-appearance: none;
   display: none;
}

@media only screen and (max-width: 768px) {
input.fie[type="file"]::-webkit-file-upload-button{
   -webkit-appearance: none;
   margin: 0 0 20px 50px;
   border: 1px solid #b20000;
   border-radius: 4px;
   padding: 10px 10px;
   background: transparent;
   color: #B20000;
   font-weight: bold;
}
    div.container.edit{
        margin-top:50px; 
        padding-bottom:10px;
        width:80%;
        border: 1px solid #f9f9f9;
        background: #f9f9f9;
        padding-top: 10px;
        margin-bottom: 50px;
    }
    div.container.edit .row{
        margin-top:20px; 
        padding-bottom:100px;
        width:100%;
        border:none;
        background: white;
        padding-top: 30px;
        margin-left: 0px;
    }
       
p.top{
    color: #b20000;
    font-size: 12px;
}
    input.btn.btn-success{
        background: #b20000;
        border: none;
        border-radius: 3px;
        padding: 10px 10px;
        font-size: 12px;
        color: #f1f1f1;
    }
    input.btn.btn-success:hover{
        font-weight:300;
        font-size: 15px;
        line-height: 1em;
        border-radius: 5px;
        color: #B2000093;
        border: 1px solid #B20000;
        background: transparent;
    }    
}
</style>
@section('content')
@include('inc.navuserinner')
<div class="container edit">
    <h3 class="title">Edit <span>Listing</span></h3>
    @include('inc.messages')
   {!! Form::open(['action' => ['ListingsController@update', $listing->id], 'method' => 'POST',  'enctype' => 'multipart/form-data'])!!}
        
        
        <p class="text-justify">Listing Details</p>
        <div class="form-group">
                <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
            {{Form::label('title', 'Listing Title')}}
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::text('title', $listing->title, [ 'class' => 'form-control'])}} <br>
            <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
            {{Form::label('category', 'Category')}}
        <select onchange="yesnoCheck(this);" class="form-control" name="category">
            <option value="">-Category-</option>
            <option value="Precious Stone">Precious Stone</option>
            <option value="Currency Trading">Currency Trading</option>
            <option value="Mineral, Crude oil">Mineral, Crude oil</option>
            <option value="Movies and Scripts">Movies and Scripts</option>
            <option value="Education">Education</option>
            <option value="Kids and Babies">Kids and Babies</option>
            <option value="Mobile,Electronics">Mobile,Electronics</option>
            <option value="Classic Cars">Classic Cars</option>
            <option value="Baby Toys">Baby Toys</option>
            <option value="Seeking Jobs/Cv">Seeking Jobs/Cv</option>
            <option value="Real Estate, Lands">Real Estate, Lands</option>
            <option value="Services">Services</option>
            <option value="Animal">Animal</option>
            <option value="Travel">Travel</option>
            <option value="Automobiles">Automobiles</option>
            <option value="Jobs">Jobs</option>
            <option value="Fashion">Fashion</option>
            <option value="Mobile,Electronics">Mobile,Electronics</option>
            <option value="Events">Events</option>
            <option value="Health">Health</option>
            <option value="Home & Lifestyle">Home & Lifestyle</option>
            <option value="Matrimonials">Matrimonials</option>
        </select>
        <div id="matrimony" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Brides' => 'Brides','Casual Dating' => 'Casual Dating','Dating' => 'Dating',
                'Friendship' => 'Friendship','Grooms' => 'Grooms','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
         <div id="home" style="display: none;">
         {{Form::label('sub category', 'Sub Category')}}
         
         <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
             {{Form::select('subcategory', ['N/A' => '-select-','Art & Photography' => 'Art & Photography','Fittings' => 'Fittings','Home Furniture' => 'Home Furniture',
             'Office Furniture' => 'Office Furniture','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
        
          </div>
            <div id="health" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Activities' => 'Activities','Fitness' => 'Fitness','Gym' => 'Gym',
                'Hospitals' => 'Hospitals','Parlours' => 'Parlours','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            <div id="event" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Auction Announcements' => 'Auction Announcements','Business' => 'Business','Notices' => 'Notices',
                'Children' => 'Children','Legal & Public' => 'Legal & Public','Charity' => 'Charity','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            <div id="travel" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Hotels in USA' => 'Hotels in USA','Resturants' => 'Resturants','Premium Traveling' => 'Premium Traveling',
                'Tour Guide' => 'Tour Guide','Group Tours' => 'Group Tours','Study Tour' => 'Study Tour','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            <div id="animal" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Dogs' => 'Dogs','Cats' => 'Cats','Snake' => 'Snake',
                'German Breeds' => 'German Breeds','Persian Breeds' => 'Persian Breeds','Pets Food' => 'Pets Food','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            <div id="fashion" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Bags' => 'Bags','Beauty' => 'Beauty','Clothing' => 'Clothing',
                'Jewelry' => 'Jewelry','Shoes' => 'Shoes','Child Fashion' => 'Child Fashion','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            <div id="job" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Accounts' => 'Accounts','Cleaning & Washing' => 'Cleaning & Washing','Design & Code' => 'Design & Code',
                'Data Entry' => 'Data Entry','Finance Jobs' => 'Finance Jobs','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
         <div id="service" style="display: none;">
         {{Form::label('sub category', 'Sub Category')}}
         
         <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
             {{Form::select('subcategory', ['N/A' => '-select-','Cleaning' => 'Cleaning','Educational' => 'Educational','Food' => 'Food',
             'Medical' => 'Medical','Office & Home' => 'Office & Home','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
        
          </div>
            <div id="auto" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Cars' => 'Cars','Classic Cars' => 'Classic Cars','Fancy Cars' => 'Fancy Cars',
                'Kids Bikes' => 'Kids Bikes','Motor Bikes' => 'Motor Bikes','Old Car' => 'Old Car','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            <div id="real" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Farms' => 'Farms','Home for rent' => 'Home for rent','Hotels' => 'Hotels',
                'Land for sale' => 'Land for sale','For rent' => 'For rent','Room' => 'Room','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            <div id="mobile" style="display: none;">
            {{Form::label('sub category', 'Sub Category')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('subcategory', ['N/A' => '-select-','Home Electronics' => 'Home Electronics','LCDs' => 'LCDs','Mobile' => 'Mobile',
                'Services' => 'Services',' TV & DVDs' => 'TV & DVDs','UPS & Monitor' => 'UPS & Monitor','Other' => 'Other'], 'N/A', ['class' => 'form-control'])}}
           
             </div>
            </div>
        <p class="text-justify">Listing Extra Details</p>
        <div class="form-group">
            <p class="re">Content fields may be dependent on selected categories</p>
            <div id="jo" style="display: none;">
                {{Form::label('condition', 'Condition')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('condition', [$listing->condition => $listing->condition,'Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
           
                {{Form::label('required career level', 'Required Career Level')}}
            
                <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('c_level', [$listing->career_level => $listing->career_level,'Intern/Student' => 'Intern/Student','Entry Level' => 'Entry Level','Experienced Professional' => 'Experienced Professional','GM/CEO/Head Of Country/President' => 'GM/CEO/Head Of Country/President'],'', ['class' => 'form-control'])}}
               
                {{Form::label('job type', 'Job Type')}}
            
                <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                    {{Form::select('j_type', ['N/A' => '-select job type-','Internship' => 'Internship','Freelance' => 'Freelance','Contract' => 'Contract','Part Time' => 'Part Time','Full Time' => 'Full Time'],'', ['class' => 'form-control'])}}
               
                    {{Form::label('positions available', 'Positions Available')}}
            
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::select('p_available', ['N/A' => '-no of positions available-','1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','10+' => '10+'],'-select purpose-', ['class' => 'form-control'])}}
                   
                        {{Form::label('gender requirement', 'Gender Requirement')}}
            
                        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                            {{Form::select('gender', ['N/A' => '-Gender Requirement-','Male' => 'Male','Female' => 'Female'],'-select purpose-', ['class' => 'form-control'])}}
                      
                          <p>Method Of Payment</p>  
                          <div class="col-sm-6">
                             <div class="checkbox">
                                 <label><input type="checkbox" name="payment_method1" id="" value="Card">Card</label>
                             </div>
                             <div class="checkbox">
                                 <label><input type="checkbox" name="payment_method2" id="" value="Cash">Cash</label>
                             </div>
                             <div class="checkbox">
                                 <label><input type="checkbox" name="payment_method3" id="" value="Discover">Discover</label>
                             </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="checkbox">
                                 <label><input type="checkbox" name="payment_method4" id="" value="Interact">Interact</label>
                             </div>
                             <div class="checkbox">
                                 <label><input type="checkbox" name="payment_method5" id="" value="Cheque">Cheque</label>
                             </div>
                             <div class="checkbox">
                                 <label><input type="checkbox" name="payment_method6" id="" value="American Express">American Express</label>
                             </div>
                          </div>
                    {{Form::label('price', 'Price($)')}}
             
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::text('price', '', ['class' => 'form-control'])}}
             </div>
    
    
    
    
            <div id="mobil" style="display: none;">
                {{Form::label('condition', 'Condition')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
           
                {{Form::label('purpose', 'Purpose')}}
            
                <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                    {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
               
                    {{Form::label('price', 'Price($)')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::text('price', '', ['class' => 'form-control'])}}
             </div>
             
            <div id="ps" style="display: none;">
                {{Form::label('condition', 'Condition')}}
            
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'', ['class' => 'form-control'])}}
           <br>
                {{Form::label('purpose', 'Purpose')}}
            
                <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                    {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
               <br>
                    {{Form::label('price', 'Price($)')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::text('price', '', ['class' => 'form-control'])}}
             </div>
             <div id="mine" style="display: none;">
                 {{Form::label('condition', 'Condition')}}
             
             <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                 {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                 <br>
                 {{Form::label('purpose', 'Purpose')}}
             
                 <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                     {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                     <br>
                     {{Form::label('price', 'Price($)')}}
                
                     <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                         {{Form::text('price', '', ['class' => 'form-control'])}}
              </div>
              <div id="movi" style="display: none;">
                  {{Form::label('condition', 'Condition')}}
              
              <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                  {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                  <br>
                  {{Form::label('purpose', 'Purpose')}}
              
                  <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                      {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                      <br>
                      {{Form::label('price', 'Price($)')}}
                
                      <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                          {{Form::text('price', '', ['class' => 'form-control'])}}
               </div>
               <div id="baby" style="display: none;">
                   {{Form::label('condition', 'Condition')}}
               
               <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                   {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                   <br>
                   {{Form::label('purpose', 'Purpose')}}
               
                   <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                       {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                       <br>
                       {{Form::label('price', 'Price($)')}}
                
                       <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                           {{Form::text('price', '', ['class' => 'form-control'])}}
                </div>
                <div id="rea" style="display: none;">
                    {{Form::label('condition', 'Condition')}}
                
                <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                    {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                    <br>
                    {{Form::label('purpose', 'Purpose')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                    {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                    <br>
                    {{Form::label('property type', 'Property Type')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::select('p_type', ['N/A' => '-select property type-','House' => 'House','Plot' => 'Plot','Commercial' => 'Commercial'],'-select purpose-', ['class' => 'form-control'])}}
                        <br>
                        {{Form::label('bedrooms', 'Bedrooms')}}
                
                        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                            {{Form::select('bedrooms', ['N/A' => '-select no of bedrooms-','Studio' => 'Studio','1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','10+' => '10+'],'-select purpose-', ['class' => 'form-control'])}}
                            <br>
                            {{Form::label('bathrooms', 'Bathrooms')}}
                
                            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                                {{Form::select('bathrooms', ['N/A' => '-select no of bedrooms-','1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','10+' => '10+'],'-select purpose-', ['class' => 'form-control'])}}
                                <br>
                        {{Form::label('expires after', 'Expires After')}}
                
                        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                            {{Form::select('expire', ['N/A' => '-Expires After-','1 month' => '1 month','3 months' => '3 months','6 months' => '6 months'],'-select purpose-', ['class' => 'form-control'])}}
                            <br>
                        {{Form::label('land area', 'Land Area')}}
                 
                        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                            {{Form::text('area', '', ['class' => 'form-control'])}}
                            <br>
                        {{Form::label('price', 'Price($)')}}
                 
                        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                            {{Form::text('price', '', ['class' => 'form-control'])}}
                 </div>
                <div id="toy" style="display: none;">
                    {{Form::label('condition', 'Condition')}}
                
                <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                    {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                    <br>
                    {{Form::label('purpose', 'Purpose')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                        <br>
                        {{Form::label('price', 'Price($)')}}
                 
                        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                            {{Form::text('price', '', ['class' => 'form-control'])}}
                 </div><br>
                 <div id="even" style="display: none;">
                     {{Form::label('condition', 'Condition')}}
                 
                 <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                     {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                    <div class="col-sm-12">
                     
                     <div class="col-sm-6">
                        {{Form::label('schedule date', 'Schedule Date')}}<br>
                        {{Form::label('start date', 'Start Date')}}
                        {{Form::date('startd', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                        <br>
                        {{Form::label('endd', 'End Date')}}
                        {{Form::date('endd', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
    
    
                     </div>
                     <div class="col-sm-6">
                        {{Form::label('schedule time', 'Schedule Time')}}<br>
                        {{Form::label('begins by', 'Begins By')}}
                        {{Form::time('starttime', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                        <br>{{Form::label('ends by', 'Ends By')}}
                        {{Form::time('endtime', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
    
    
                     </div>
                    </div>
                     {{Form::label('purpose', 'Purpose')}}
                 
                     <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                         {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                         <br>
                         {{Form::label('price', 'Price($)')}}
                  
                         <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                             {{Form::text('price', '', ['class' => 'form-control'])}}
                  </div>
    
                <div id="car" style="display: none;">
                    
                    {{Form::label('color', 'Color')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::text('color', '', ['class' => 'form-control'])}}
                        <br>
                    {{Form::label('condition', 'Condition')}}
                
                <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                    {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                    <br>
                    {{Form::label('purpose', 'Purpose')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                        <br>
                        {{Form::label('price', 'Price($)')}}
                
                        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                            {{Form::text('price', '', ['class' => 'form-control'])}}
                 </div>
                 <div id="mobi" style="display: none;">
                    
                    {{Form::label('color', 'Color')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::text('color', '', ['class' => 'form-control'])}}
                        <br>
                     {{Form::label('condition', 'Condition')}}
                 
                 <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                     {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                     <br>
                     {{Form::label('purpose', 'Purpose')}}
                 
                     <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                         {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                         <br>
                         {{Form::label('price', 'Price($)')}}
                
                         <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                             {{Form::text('price', '', ['class' => 'form-control'])}}
                  </div>
                 <div id="nim" style="display: none;">
                    {{Form::label('age', 'Age')}}
                
                    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                        {{Form::text('purpose', '', ['class' => 'form-control'])}}
                        <br>
                     {{Form::label('condition', 'Condition')}}
                 
                 <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                     {{Form::select('condition', ['N/A' => '-select condition-','Brand New' => 'Brand New','Used' => 'Used'],'-select condition-', ['class' => 'form-control'])}}
                     <br>
                     {{Form::label('purpose', 'Purpose')}}
                 
                     <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                         {{Form::select('purpose', ['N/A' => '-select purpose-','Sell' => 'Sell','Rent/Lease' => 'Rent/Lease','Wanted' => 'Wanted'],'-select purpose-', ['class' => 'form-control'])}}
                         <br>
                         {{Form::label('price', 'Price($)')}}
                
                         <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                             {{Form::text('price', '', ['class' => 'form-control'])}}
                        
                  </div>
                <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
            {{Form::label('phone', 'Phone')}}
            <p class="re">Edit this field if you wish to use a different phone number.</p>
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::number('phone', $listing->phone, [ 'class' => 'form-control'])}} <br>
            {{Form::label('email', 'Email')}}
            <p class="re">Edit this field if you wish to use a different email.</p>
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::email('email',$listing->email, [ 'class' => 'form-control'])}} <br>
            <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
            {{Form::label('description', 'Description')}}
             <!--This is the input field with type=textarea, name=body, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::textarea('description', $listing->description, ['id' => 'article-ckeditor','class' => 'form-control'])}}
    
        </div>
        <p class="text-justify">Listing Media</p>
        <div class="form-group">
            {{Form::label('listing images', 'Listing Images')}}
            {{Form::file('image1', ['class' => 'form-control fie'])}} <br>
            {{Form::file('image2', ['class' => 'form-control fie'])}} <br>
            {{Form::label('listing videos', 'Listing Videos')}} <br>
            <small>Enter Youtube/Vimeo video ID</small>
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::text('video', $listing->video, [ 'class' => 'form-control'])}}
        </div>
        <p class="text-justify">Listing Locations</p>
        <div class="form-group">
            <p class="re">Select a different country if listing is not in your default country.</p>
            {{Form::label('country', 'Country')}}
            @if($countries->count())        
            <select class="form-control" id="countries" name="country">
                <option value="{{$listing->country}}">{{$listing->country}}</option>
                <option value="USA"> USA </option>
                <option value="Canada"> Canada </option>
                <option value="China"> China </option>
                <option value="UK"> United Kingdom </option>
                <option value="Nigeria"> Nigeria</option>
                @foreach ($countries as $country)
                    <option value="{!! $country->name->common !!}">{!! $country->name->common !!}</option>
    
                @endforeach
            </select>
        @endif<br>
            {{Form::label('address line', 'Address Line 1')}}
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::text('address1', $listing->address1, [ 'class' => 'form-control'])}} <br>
            {{Form::label('address line', 'Address Line 2')}}
            <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::text('address2', $listing->address2, [ 'class' => 'form-control'])}}<br>
            <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
            {{Form::label('additional info', 'Additional Info')}}
             <!--This is the input field with type=textarea, name=body, value='' since it is a text field, then bootstrap class and then placeholder--->
            {{Form::textarea('info', $listing->info, ['class' => 'form-control'])}}
    
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update Ad', ['class' => 'btn btn-success btn-md pull-left', 'style' => 'text-transform:uppercase;'])}}
       {!! Form::close() !!}
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
    <script>
    
    function yesnoCheck(that) {
        if (that.value == "Mobile,Electronics") {
            document.getElementById("mobile").style.display = "block";
            document.getElementById("mobile").style.paddingTop = "16px";
            document.getElementById("mobil").style.paddingTop = "16px";
            document.getElementById("mobil").style.display = "block";
        } else {
            document.getElementById("mobile").style.display = "none";
            document.getElementById("mobile").style.paddingTop = "0";
            document.getElementById("mobil").style.paddingTop = "0";
            document.getElementById("mobil").style.display = "none";
        }
    
        if (that.value == "Precious Stone") {
            document.getElementById("ps").style.display = "block";
            document.getElementById("ps").style.paddingTop = "16px";
        } else {
            document.getElementById("ps").style.display = "none";
            document.getElementById("ps").style.paddingTop = "0";
        }
    
        if (that.value == "Kids and Babies") {
            document.getElementById("baby").style.display = "block";
            document.getElementById("baby").style.paddingTop = "16px";
        } else {
            document.getElementById("baby").style.display = "none";
            document.getElementById("baby").style.paddingTop = "0";
        }
        if (that.value == "Mineral, Crude oil") {
            document.getElementById("mine").style.display = "block";
            document.getElementById("mine").style.paddingTop = "16px";
        } else {
            document.getElementById("mine").style.display = "none";
            document.getElementById("mine").style.paddingTop = "0";
        }
    
    
        if (that.value == "Real Estate, Lands") {
            document.getElementById("real").style.display = "block";
            document.getElementById("real").style.paddingTop = "16px";
            document.getElementById("rea").style.paddingTop = "16px";
            document.getElementById("rea").style.display = "block";
        } else {
            document.getElementById("real").style.display = "none";
            document.getElementById("rea").style.display = "none";
            document.getElementById("real").style.paddingTop = "0";
            document.getElementById("rea").style.paddingTop = "0";
        }
        if (that.value == "Automobiles") {
            document.getElementById("auto").style.display = "block";
            document.getElementById("auto").style.paddingTop = "16px";
            document.getElementById("mobi").style.paddingTop = "16px";
            document.getElementById("mobi").style.display = "block";
        } else {
            document.getElementById("auto").style.display = "none";
            document.getElementById("mobi").style.display = "none";
            document.getElementById("auto").style.paddingTop = "0";
            document.getElementById("mobi").style.paddingTop = "0";
        }
        if (that.value == " Services") {
            document.getElementById("service").style.display = "block";
            document.getElementById("service").style.paddingTop = "16px";
        } else {
            document.getElementById("service").style.display = "none";
            document.getElementById("service").style.paddingTop = "0";
        }
        if (that.value == "Jobs") {
            document.getElementById("job").style.display = "block";
            document.getElementById("job").style.paddingTop = "16px";
            document.getElementById("jo").style.display = "block";
            document.getElementById("jo").style.paddingTop = "16";
        } else {
            document.getElementById("job").style.display = "none";
            document.getElementById("jo").style.display = "none";
            document.getElementById("job").style.paddingTop = "0";
            document.getElementById("jo").style.paddingTop = "0";
        }
        if (that.value == "Fashion") {
            document.getElementById("fashion").style.display = "block";
            document.getElementById("fashion").style.paddingTop = "16px";
        } else {
            document.getElementById("fashion").style.display = "none";
            document.getElementById("fashion").style.paddingTop = "0";
        }
        if (that.value == "Animal") {
            document.getElementById("animal").style.display = "block";
            document.getElementById("animal").style.paddingTop = "16px";
            document.getElementById("nim").style.paddingTop = "16px";
            document.getElementById("nim").style.display = "block";
        } else {
            document.getElementById("animal").style.display = "none";
            document.getElementById("nim").style.display = "none";
            document.getElementById("animal").style.paddingTop = "0";
            document.getElementById("nim").style.paddingTop = "0";
        }
        if (that.value == "Travel") {
            document.getElementById("travel").style.display = "block";
            document.getElementById("travel").style.paddingTop = "16px";
        } else {
            document.getElementById("travel").style.display = "none";
            document.getElementById("travel").style.paddingTop = "0";
        }
        if (that.value == "Events") {
            document.getElementById("event").style.display = "block";
            document.getElementById("event").style.paddingTop = "16px";
            document.getElementById("even").style.paddingTop = "16px";
            document.getElementById("even").style.display = "block";
        } else {
            document.getElementById("event").style.display = "none";
            document.getElementById("even").style.display = "none";
            document.getElementById("event").style.paddingTop = "0";
            document.getElementById("even").style.paddingTop = "0";
        }
        if (that.value == "Health") {
            document.getElementById("health").style.display = "block";
            document.getElementById("health").style.paddingTop = "16px";
        } else {
            document.getElementById("health").style.display = "none";
            document.getElementById("health").style.paddingTop = "0";
        }
        if (that.value == "Home & Lifestyle") {
            document.getElementById("home").style.display = "block";
            document.getElementById("home").style.paddingTop = "16px";
        } else {
            document.getElementById("home").style.display = "none";
            document.getElementById("home").style.paddingTop = "0";
        }
        if (that.value == "Matrimonials") {
            document.getElementById("matrimony").style.display = "block";
            document.getElementById("matrimony").style.paddingTop = "16px";
        } else {
            document.getElementById("matrimony").style.display = "none";
            document.getElementById("matrimony").style.paddingTop = "0";
        }
        if (that.value == "Classic Cars") {
            document.getElementById("car").style.display = "block";
            document.getElementById("car").style.paddingTop = "16px";
        } else {
            document.getElementById("car").style.display = "none";
            document.getElementById("car").style.paddingTop = "0";
        }
        if (that.value == "Baby Toys") {
            document.getElementById("toy").style.display = "block";
            document.getElementById("toy").style.paddingTop = "16px";
        } else {
            document.getElementById("toy").style.display = "none";
            document.getElementById("toy").style.paddingTop = "0";
        }
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</div>
@endsection