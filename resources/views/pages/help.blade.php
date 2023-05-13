@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | Help Center
@endsection

<style>
    .row.help .panel-heading{
        border-radius: 0;
        padding-top: 30px;
        padding-bottom: 30px;
}
    .panel-heading h4.panel-title{
        font-size: 13px;
        color: #b20000;
}
.panel-default.ad a{
       text-decoration: none;
}
.panel-default.ad li,
.col-sm-6 li{
list-style: square;
color: #b20000;
font-size: 12px;
padding-top: 10px;
}
.panel-default.ad{
border-radius: 0;
margin-bottom: 2px;

}
.panel-default.ad p{
color: #b20000;
}
.col-sm-8 h3 span {
color: #b20000;
font-weight: bold;
}
.col-sm-8 h3{
padding-bottom: 30px;
font-weight: bold;
}
.col-sm-6{
padding-top: 60px;
padding-bottom: 60px;
}
.row.help .col-sm-6 img{
width: 500px;
}
.row.help .col-sm-4 img{
width: 300px;
margin-top: 100px;
}
</style>
@section('content')
            @include('inc.navother')
    <div class="row help">
        <div class="container">
            <div class="col-sm-6">
                <img src="img/add.png" alt="" class="img-responsive">
            </div>
            <div class="col-sm-6">
                <h3>How to post ads</h3>
                <li>Click on <a href="./ad_packs_free">Post Ad For FREE NOW</a></li>
                <li>You will be immediately redirected to our Login page (if you are not a registered user). You will have to fill out all the required fields and click on ‘Register’ button at the bottom of the page.</li>
                <li>After Registering, Complete all the required information about your item.</li>
                <li>After filling out the required fields, click on “Post” button.</li>
                <li>Once you post your ad Your advert will be published shortly once moderation process is completed.</li>
                <li>Once your advert is live, you will receive a notification email.</li>
                <li>Be ready to receive numerous incoming calls from your potential buyers. Good luck with your sales!</li>
                <li>You can have a look at our premium packages also for more sales and boost packages!</li>

            </div>
            <div class="col-sm-8">
                <h3>FAQ<span>'s</span></h3>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default ad">
                        <a data-toggle="collapse" href="#collapse1" data-parent="#accordion">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center">
                            What happens after I post my Ad on Amaslink?
                            </h4>
                        </div>
                        </a>
                      <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li>Our moderators will review your ad very carefully and if all the fields are filled out correctly, it will be activated asap we dont want to delay your successful sales.</li>
                                <li>You can find your advert on our website only when it is approved by our moderators.</li>
                                <li>You will get a notification email when your advert is active. If there is something wrong with your advert, you will be notified about that and all the mistakes will be specified so that you can edit your advert correspondingly.</li>
                                <li>After publishing your advert, you can edit it again if needed and repost. Once done, your advert undergoes moderation before being activated on the website.</li>
                                <li>You can delete or close your advert any time you want. You just have to click on Close button placed under the ad or click on the cross placed on the top right corner of the ad.</li>
                                <li>You shouldn’t publish adverts of the same content. They will be considered duplicates by our moderators and won’t go active on the website.</li>
                                <li>You can always manage your ads by logging in to your Amaslink account and clicking on My ADS.</li>
                            </ul>
                        </div>
                      </div>
                    </div>
                <div class="panel panel-default ad" style="margin-top:2px;">
                    <a data-toggle="collapse" href="#collapse2" data-parent="#accordion">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">
                        Are there any rules to posting on Amaslink?
                        </h4>
                    </div>
                    </a>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Following rules are required while you are posting ads:</p>
                        <ul>
                            <li>Every advert must have a precise title.</li>
                            <li>Every advert should contain only unique images (taken by the seller and not downloaded from the Internet) without any contact information or watermarks.</li>
                            <li>Make sure you chose an appropriate category. Be attentive choosing a category for a job proposal and/or a resume.</li>
                            <li>The prices of your items must correspond to the real prices of similar products.</li>
                            <li>All posted products and/or services must be real.</li>
                            <li>All items and products must be legally permitted.</li>
                            <li>Each item for sale must be posted separately. You cannot post several products within one and the same advert.</li>
                            <li>Every advert must contain a brief and clear description.</li>
                            <li> If you have any website you wish to add to an Ads, Please Kindly Use the Brand and Business section.</li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default ad">
                    <a data-toggle="collapse" href="#collapse3" data-parent="#accordion">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">
                        Any tips to posting successful Ads on Amaslink?
                        </h4>
                    </div>
                    </a>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p> If you really want to create a great ad, it is highly recommended to follow the instructions below:</p>
                        <ul>
                            <li>Use a clear title which includes the name of the item you sell. Try to make your title appealing and eye-catching.</li>
                            <li>Set an appropriate price for your item so that the advert is approved. If the price is not relevant, it may be declined. Make sure to carry out some investigation of the prices for a particular item.</li>
                            <li>Upload only unique and high-quality photos of your items taken by yourself and not downloaded from the Internet. The better photos you add, the more attractive your ad looks to the potential buyers and the more calls you receive.</li>
                            <li>Indicate correct contact details for the potential buyers/clients to be able to reach you easily. Try to respond all the incoming calls or to call back your customers once available.</li>
                            <li>Try to fill out all the fields of your profile page, as well as those of your advert, to let your customers dispose of all the necessary information about you as a seller and the products you sell.</li>
                            <li>The better rating you have on our website, the more chances you get to attract a lot of buyers. Remember that it is important to build trust in your business. Your rating depends on the number of positive/negative feedback received from your previous customers.</li>
                            <li>Make your advert as risk-free as possible. Underline that no prepayments are required and be ready to list those delivery services which presuppose payment on the delivery of the product ordered.</li>
                          
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default ad">
                    <a data-toggle="collapse" href="#collapse4" data-parent="#accordion">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">What are the prohibited items on Amaslink?</h4>
                    </div>
                    </a>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Please, take a moment to review the items which are not allowed to be advertised here:</p>
                        <ul>
                            <li>Narcotics, steroids, and any drugs or medications that require a prescription from a licensed medical specialist</li>
                            <li>Weapons.</li>
                            <li>Restricted military/police items.</li>
                            <li>Human organs.</li>
                            <li>Illegal/pirated copies.</li>
                            <li>Stolen property.</li>
                            <li>Code grabbing and lock picking devices.</li>
                            <li>Electronic equipment prohibited by the law.</li>
                            <li>Sexually-oriented services.</li>
                            <li> Multi-level marketing, pyramid, and matrix programs.</li>
                            <li> Network marketing and “Home Base Business” jobs.</li>
                            <li> Products (offers or services) prohibited to sell by the law.</li>
                          
                        </ul>
                        <p> Please, consider the following rules:</p>
                        <li>Food and healthcare items should have a clearly marked expiration or ‘use by’ date.</li>
                        <li>Ads can’t contain pictures of nudity.</li>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default ad">
                    <a data-toggle="collapse" href="#collapse5" data-parent="#accordion">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">
                        Why has my add been put on hold/rejected?
                        </h4>
                    </div>
                    </a>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p> here are several reasons why your ad can be placed on hold by our moderators:</p>
                        <ul>
                            <li>You tried to post several items within one ad. It is not allowed to do that. Each item for sale must be posted separately, one ad – one product. Please follow this simple rule so that your ad is activated shortly.</li>
                            <li>Pictures you’ve uploaded contain contact numbers. We do not allow posting this kind of photos. Please add pics which don’t have any phone numbers for your ads to go active.</li>
                            <li>There are certain restrictions concerning prices users might set. Please, input an appropriate price for your advert to be approved. If the price is not relevant, it may be declined. Make sure to carry out some investigation of a market value of an item you intend to sell.</li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default ad">
                    <a data-toggle="collapse" href="#collapse6" data-parent="#accordion">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">
                        I am already on the free plan why should I subscribe to the premium package?
                        </h4>
                    </div>
                    </a>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Our Premium services are meant for sellers of any kind, but mostly for professional sellers/companies. They allow sellers to promote their ads actively and sell their products fast by getting up to 15 times more clients.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default ad">
                    <a data-toggle="collapse" href="#collapse8" data-parent="#accordion">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">
                        What are the major benefits of the premium package?
                        </h4>
                    </div>
                    </a>
                  <div id="collapse8" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            You will need a good promotion for your ads for faster sales and customer out.
                        </p>
                        <p><strong>Below you can find 6 main benefits of our Premium Services:</strong></p>
                        <li>largest Classified marketplace</li>
                        <small>Yes, we are proud of the fact that Amaslink is the biggest marketplace by the number of visitors and ads posted.</small>
                        <li>More clients than others.</li>
                        <small>We get our visitors only from relevant sources like Google and Facebook.</small>
                        <li>Relevant promotion algorithms.</li>
                        <small>We promote your ads only to those users who could be interested in your products. That gives you the biggest number of real clients.</small>
                        <li>Personal Support.</li>
                        <small>We have a dedicated support team who understand your needs very well and ensure customer satisfaction.</small>
                        <li>Fair price for the services you get.</li>
                        <small>We charge you fairly, so you won’t pay any extra commissions.</small>
                        <li>We are  secured.</li>
                        <small>We use secure gateways of European banks, so all transactions are 100% secure.</small>
                    </div>
                  </div>
                </div>
            </div>
            
        </div>
            <div class="col-sm-4">
                <img src="img/fq.png" alt="" class="img-responsive">
            </div>
        </div>
    </div>
        @include('inc.footer')

@endsection