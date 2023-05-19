
<div class="row js-cookie-consent cookie-consent">
    <style>
        
        div.row.js-cookie-consent.cookie-consent{
      overflow: hidden;
      background-color: #f1f1f1;
      position: fixed;
      bottom: 0;
      z-index: 99;
      color: #b20000bb;
      padding: 10px 100px;
      width: 110%;
    }
        span.cookie-consent__message{
      font-size: 12px;
    }
    button.js-cookie-consent-agree.cookie-consent__agree{
      background: #171919;
      border: none;
      color: #fff;
      font-size: 10px;
      padding: 10px 10px;
    }
        @media only screen and (max-width: 768px) {
        
        div.row.js-cookie-consent.cookie-consent{
      overflow: hidden;
      background-color: #f1f1f1;
      position: fixed;
      bottom: 0;
      z-index: 99;
      color: #b20000bb;
      width: 110%;
      padding: 10px 30px 10px 50px;
    }
        span.cookie-consent__message{
      font-size: 8px;
      padding: 0px;
    }
    button.js-cookie-consent-agree.cookie-consent__agree{
      background: #171919;
      border: none;
      color: #fff;
      font-size: 8px;
      padding: 10px 10px;
      margin-left: 60px;
    }
    }
    </style>
        <span class="cookie-consent__message">
            {!! trans('cookie-consent::texts.message') !!}
        </span>
    
        <button class="js-cookie-consent-agree cookie-consent__agree">
            {{ trans('cookie-consent::texts.agree') }}
        </button>
    
    </div>
    