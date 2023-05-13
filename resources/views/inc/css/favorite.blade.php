
<style>

    
    .row.ads div.col-sm-3{
        display:none;
    }
    #loadMoree {
        transition: all 600ms ease-in-out;
        -webkit-transition: all 600ms ease-in-out;
        -moz-transition: all 600ms ease-in-out;
        -o-transition: all 600ms ease-in-out;
        text-transform: uppercase;
    }
    
        
        .row.ads{
                    background: #bababb5e;
                    margin-top: 0px;
                    padding-top: 20px;
                    padding-bottom: 100px;
                }
        .row.ads .container{
                    width: 68%;
                }
                .row.ads h6{
                    color: #B2000093;
                }
                .row.ads a{
                    text-decoration: none;
                    color: #B2000093;
                }
                
                .row.ads .fa{
                    font-weight: bold;
                    color: #B2000093;
                }
                div.top-left {
                position: absolute;
                top: 15px;
                left: 0px;
                border-radius: 0;
                text-transform: lowercase;
            }
            div.top-left .btn.btn-primary {
                background: tomato;
                border: none;
                font-size: 11px;
                letter-spacing: 3px;
                padding: 5px 22px;
                border-radius: 0;
            }
            .row.ads .panel-default .panel-footer{
                height: 90px;
            }
            .row.ads .panel-default .panel-footer p{
                color:#171919d3;
                font-size: 12px;
                padding-top: 0px;
                padding-bottom: 10px;
                font-weight: bold;
            }
            .row.ads .panel-default .panel-footer p span{
                color:#171919d3;
                font-size: 10px;
                font-weight: normal;
            }
            .row.ads .panel-default .panel-footer small{
                color:#171919d3;
                font-size: 10px;
                font-weight: normal;
                padding-bottom: 0;
                margin-bottom: 0;
            }
            .row.ads .panel-default .panel-footer hr{
                padding-top: 0;
                margin-top: 0;
                margin-bottom: 0;
            }
                div.row.ads div.panel-default{
                    width: auto;
                    margin-bottom: 20px;
                    box-shadow: 10px 6px 6px 0 rgba(0, 0, 0, 0.2);
                }
                div.row.ads div.panel-default div.panel-body{
                    margin-bottom: 0;
                    height: 200px;
                    width: 200px;
                    padding: 0;
                }
    .image {
      display: block;
      width: 100%;
      height: auto;
    }
    
    div.overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      height: 65%;
      width: 200px;
      opacity: 0;
      transition: .3s ease;
      background-color: #b20000bb;
      color: #eee;
    }
    div.overlay p{
        padding-top: 50px;
    }
    div.container.folio:hover div.overlay {
      opacity: 1;
    }
    
    a.icon i.fa.fa-plus-circle{
      color: #eee;
      font-size: 80px;
      position: absolute;
      left: 50%;
      font-weight: bold;
      top: 80px;
      padding-bottom: 0px;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }
    div.container.folio {
      position: relative;
      width: 100%;
      margin: 0;
      padding: 0;
    }
                .panel-default .panel-footer{
                    margin-bottom: 0;
                    width: 200px;
                }
                .panel-default .panel-footer .fa{
                    font-weight: bold;
                    color: #B20000;
    
                }
                .panel-default .panel-body img{
                    margin-bottom: 0;
                    height:200px;
                    width: 200px;
                    background: #171919;
                }
     /* Bottom left text */
     .bottom-left {
                position: absolute;
                bottom: 108px;
                left: 15px;
                background: #f1f1f1;
                color: #b20000;
                padding-left: 15px;
                padding-right: 15px;
                z-index: 99;
            }
                   /* Bottom right text */
     div.bottom-right {
                position: absolute;
                bottom: 80px;
                left: 158px;
                color: #f1f1f1;
                padding-left: 15px;
                padding-right: 15px;
                z-index: 99;
            }
                   /* Bottom right text */
     div.bottom-right:hover {
                position: absolute;
                bottom: 80px;
                left: 158px;
                color: #f1f1f1;
                padding-left: 15px;
                padding-right: 15px;
                z-index: 99;
            }
            .bottom-right form button{
                background: #f1f1f1;
                border-radius: 10px;
                color: #f1f1f1;
                border: none;
                z-index: 99;
            } 
            .bottom-right form button:hover{
                background: #f1f1f1;
                border-radius: 10px;
                color: #f1f1f1;
                border: none;
                z-index: 99;
            }    
        h2.title{
            color: #171919;
            font-weight: bold;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        a.btn.btn-success{
            background: transparent;
            border: #B20000 solid 1px;
            color: #B20000;
            border-radius: 0;
            margin-top: 20px;
        }
        a.btn.btn-success:hover{
            background: #B20000;
            border: #B20000 solid 1px;
            color: #f1f1f1;
            border-radius: 3px;
        }
        
        @media only screen and (min-width: 600px) {
       
       .row.ads .container{
           width: 80%;
       }
    }
        @media only screen and (max-width: 768px) {
        h2.title{
            color: #171919;
            font-weight: bold;
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 20px;
        }
    
        .row.ads div.col-sm-3{
            float: left;
            width: 50%;
                }
        .row.ads .container{
                    width: 100%;
                }
            .row.ads .panel-default .panel-footer p{
                color:#171919d3;
                font-size: 10px;
                padding-top: 0px;
                padding-bottom: 10px;
                font-weight: bold;
            }
            .row.ads .panel-default .panel-footer p span{
                color:#171919d3;
                font-size: 8px;
                font-weight: normal;
            }
            .row.ads .panel-default .panel-footer small{
                color:#171919d3;
                font-size: 8px;
                font-weight: normal;
                padding-bottom: 0;
                margin-bottom: 0;
            }
    div.overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      height: 65%;
      width: 160px;
      opacity: 0;
      transition: .3s ease;
      background-color: #b20000bb;
      color: #eee;
    }
                div.row.ads div.panel-default div.panel-body{
                    margin-bottom: 0;
                    height: 200px;
                    width: 160px;
                    padding: 0;
                }
                .panel-default .panel-footer{
                    margin-bottom: 0;
                    width: 160px;
                    padding-bottom: 50px;
                }
                .panel-default .panel-footer .fa{
                    font-weight: bold;
                    color: #B20000;
    
                }
                .panel-default .panel-body img{
                    margin-bottom: 0;
                    height:200px;
                    width: 200px;
                }
    
        }
    
          
    </style>