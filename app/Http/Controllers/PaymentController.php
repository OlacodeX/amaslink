<?php
namespace App\Http\Controllers;
 
use Carbon\Carbon;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;
 
class PaymentController extends Controller
{
 
    public $gateway;
 
    public function __construct()
    {
        
        $this->middleware('auth');
          $gateway = Omnipay::create('PayPal_Rest');
         // Initialise the gateway
        if(App::environment('production')) {
            $gateway->initialize([
                'clientId' => config('services.paypal.client_prod'),
                'secret'   => config('services.paypal.secret_prod'),
                'testMode' => config('services.paypal.mode_prod'),
            ]);
        }else {
            $gateway->initialize([
                'clientId' => config('services.paypal.client'),
                'secret'   => config('services.paypal.secret'),
                'testMode' => config('services.paypal.mode'),
            ]);
        }
    }
 
    public function index()
    {
        $countries = Countries::all();
        return view('listings.createe',compact('countries'));
    }
     public function boost(Request $request)
    { 
           if($request->input('submit'))
        {
           $gateway = Omnipay::create('PayPal_Rest');
           // Initialise the gateway
          
            if(App::environment('production')) {
                $gateway->initialize([
                    'clientId' => config('services.paypal.client_prod'),
                    'secret'   => config('services.paypal.secret_prod'),
                    'testMode' => config('services.paypal.mode_prod'),
                ]);
            }else {
                $gateway->initialize([
                    'clientId' => config('services.paypal.client'),
                    'secret'   => config('services.paypal.secret'),
                    'testMode' => config('services.paypal.mode'),
                ]);
            }
           try {
            $transaction = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'rn' => '1',
                //'custom' => $_POST['package'],
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),
            ]);
            $response = $transaction->send();
            $data = $response->getData();
            //echo "Gateway purchase response data == " . print_r($data, true) . "\n";
           
                // if ($response->isSuccessful()) {
                    //echo "Purchase transaction was successful!\n";
               // }
               if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }
             } 
             catch(Exception $e) {
                return $e->getMessage();
            }
                 $id =$_POST['listing_id'];
                 $listing = Listings::find($id);
                 $listing->priority = 'Yes';
                 $listing->updated_at = \Carbon\Carbon::now();
                  $listing->save(); 
             }
      
    }
        public function success(Request $request)
        {
            // Once the transaction has been approved, we need to complete it.
            if ($request->input('paymentId') && $request->input('PayerID'))
            {
                
            $gateway = Omnipay::create('PayPal_Rest');
            // Initialise the gateway
            
            if(App::environment('production')) {
                $gateway->initialize([
                    'clientId' => config('services.paypal.client_prod'),
                    'secret'   => config('services.paypal.secret_prod'),
                    'testMode' => config('services.paypal.mode_prod'),
                ]);
            }else {
                $gateway->initialize([
                    'clientId' => config('services.paypal.client'),
                    'secret'   => config('services.paypal.secret'),
                    'testMode' => config('services.paypal.mode'),
                ]);
            }
             $transaction = $gateway->completePurchase([
                  'payer_id'             => $request->input('PayerID'),
                 'transactionReference' => $request->input('paymentId'),
             ]);
                $response = $transaction->send();
             
                if ($response->isSuccessful())
                {
                    // The customer has successfully paid.
                    $arr_body = $response->getData();
             
                    // Insert transaction data into the database
                    $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();
             
                    if(!$isPaymentExist)
                    {
                        $payment = new Payment;
                        $payment->payment_id = $arr_body['id'];
                        $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                        $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                        $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                        $payment->currency = config('services.paypal.currency');
                        $payment->payment_status = $arr_body['state'];
                        $payment->save();
                    }
                    $payment_id = $arr_body['id'];
                    $amount = $arr_body['transactions'][0]['amount']['total'];
                    $listings = Listings::where('user_id', auth()->user()->id)->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(5);
                    $data =[
                        'payment_id' => $payment_id,
                        'listings' => $listings,
                        'amount' => $amount
                    ];
                
                   return view('user_approved', $data)->with('success', 'Listing Boosted.');//I just set the message for session(success).
   
                } else {
                    return $response->getMessage();
                }
            } else {
                return 'Transaction declined '.' <a href="./adintro" class="btn btn-info btn-md pull-right">Go Back To Post Ad</a>';
           
            }
        }
        public function error()
         {
            return 'Transaction Cancelled '.' <a href="./all" class="btn btn-info btn-md pull-right">Go Back To dashboard</a>';
        
         }

    ///For Free But Boosted  

    public function charge_free(Request $request)
    {
        if($request->input('submit'))
        { $gateway = Omnipay::create('PayPal_Rest');
           // Initialise the gateway
            
            if(App::environment('production')) {
                $gateway->initialize([
                    'clientId' => config('services.paypal.client_prod'),
                    'secret'   => config('services.paypal.secret_prod'),
                    'testMode' => config('services.paypal.mode_prod'),
                ]);
            }else {
                $gateway->initialize([
                    'clientId' => config('services.paypal.client'),
                    'secret'   => config('services.paypal.secret'),
                    'testMode' => config('services.paypal.mode'),
                ]);
            }
           try {
            $transaction = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'rn' => '1',
                //'custom' => $_POST['package'],
                'returnUrl' => url('paymentsuccessfree'),
                'cancelUrl' => url('paymenterrorfree'),
            ]);
            $response = $transaction->send();
            $data = $response->getData();
            //echo "Gateway purchase response data == " . print_r($data, true) . "\n";
           
                // if ($response->isSuccessful()) {
                    //echo "Purchase transaction was successful!\n";
               // }
               if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }
            } 
             catch(Exception $e) {
                return $e->getMessage();
            }
        }
}
 
    public function payment_success_free(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $gateway = Omnipay::create('PayPal_Rest');
           // Initialise the gateway
           
        if(App::environment('production')) {
            $gateway->initialize([
                'clientId' => config('services.paypal.client_prod'),
                'secret'   => config('services.paypal.secret_prod'),
                'testMode' => config('services.paypal.mode_prod'),
            ]);
        }else {
            $gateway->initialize([
                'clientId' => config('services.paypal.client'),
                'secret'   => config('services.paypal.secret'),
                'testMode' => config('services.paypal.mode'),
            ]);
        }
            $transaction = $gateway->completePurchase(array(
                 'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
         
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
         
                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();
         
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = config('services.paypal.currency');
                    $payment->payment_status = $arr_body['state'];
                    $payment->save();
                }
                $payment_id = $arr_body['id'];
                $amount = $arr_body['transactions'][0]['amount']['total'];
               // $payment->custom = $_POST['custom'];
                $countries = Countries::all();
                $data =[
                    'payment_id' => $payment_id,
                    'countries' => $countries,
                    //'custom' => $custom,
                    'amount' => $amount
                ];
            
            return view('listings.create_free_boosted',compact('countries'))->with($data);
               
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction declined '.' <a href="./adintro" class="btn btn-info btn-md pull-right">Go Back To Post Ad</a>';
        }
    }
 
    public function payment_error_free()
    {
        return 'Transaction Cancelled '.' <a href="./adintro" class="btn btn-info btn-md pull-right">Go Back To Post Ad</a>';
    }
 
    public function charge(Request $request)
    {
        if($request->input('submit'))
        {
            $gateway = Omnipay::create('PayPal_Rest');
           // Initialise the gateway
           
        if(App::environment('production')) {
            $gateway->initialize([
                'clientId' => config('services.paypal.client_prod'),
                'secret'   => config('services.paypal.secret_prod'),
                'testMode' => config('services.paypal.mode_prod'),
            ]);
        }else {
            $gateway->initialize([
                'clientId' => config('services.paypal.client'),
                'secret'   => config('services.paypal.secret'),
                'testMode' => config('services.paypal.mode'),
            ]);
        }
            // dd([
            //     'clientId' => config('services.paypal.client'),
            //     'secret'   => config('services.paypal.secret'),
            //     'testMode' => config('services.paypal.mode'),
            // ]);
           try {
            $transaction = $gateway->purchase(
                [
                    'amount' => $request->input('amount'),
                    'currency' => 'USD',
                    'rn' => '1',
                    //'custom' => $_POST['package'],
                    'returnUrl' => url('paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ]
            );
            $response = $transaction->send();
            $data = $response->getData();
            //echo "Gateway purchase response data == " . print_r($data, true) . "\n";
           
                // if ($response->isSuccessful()) {
                    //echo "Purchase transaction was successful!\n";
               // }
               if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }
             } 
             catch(Exception $e) {
                return $e->getMessage();
            }
    }
}

public function payment_success(Request $request)
{
    // Once the transaction has been approved, we need to complete it.
    if ($request->input('paymentId') && $request->input('PayerID'))
    {
        $gateway = Omnipay::create('PayPal_Rest');
       // Initialise the gateway
       
       if(App::environment('production')) {
            $gateway->initialize([
                'clientId' => config('services.paypal.client_prod'),
                'secret'   => config('services.paypal.secret_prod'),
                'testMode' => config('services.paypal.mode_prod'),
            ]);
         }else {
            $gateway->initialize([
                'clientId' => config('services.paypal.client'),
                'secret'   => config('services.paypal.secret'),
                'testMode' => config('services.paypal.mode'),
            ]);
         }
        $transaction = $gateway->completePurchase([
             'payer_id'             => $request->input('PayerID'),
            'transactionReference' => $request->input('paymentId'),
        ]);
        $response = $transaction->send();
     
        if ($response->isSuccessful())
        {
            // The customer has successfully paid.
            $arr_body = $response->getData();
     
            // Insert transaction data into the database
            $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();
     
            if(!$isPaymentExist)
            {
                $payment = new Payment;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = 'USD';
                $payment->payment_status = $arr_body['state'];
                $payment->save();
            }
            $payment_id = $arr_body['id'];
            $amount = $arr_body['transactions'][0]['amount']['total'];
           // $payment->custom = $_POST['custom'];
            $countries = Countries::all();
            $data =[
                'payment_id' => $payment_id,
                'countries' => $countries,
                //'custom' => $custom,
                'amount' => $amount
            ];
        
        return view('listings.create',compact('countries'))->with($data);
           
        } else {
            return $response->getMessage();
        }
    } else {
        return 'Transaction declined '.' <a href="./adintro" class="btn btn-info btn-md pull-right">Go Back To Post Ad</a>';
   
    }
}

public function payment_error()
{
    return 'Transaction Cancelled '.' <a href="./adintro" class="btn btn-info btn-md pull-right">Go Back To Post Ad</a>';
}

public function auction(Request $request)
    {
      
        if($request->input('submit'))
        {
            $gateway = Omnipay::create('PayPal_Rest');
           // Initialise the gateway
           
        if(App::environment('production')) {
            $gateway->initialize([
                'clientId' => config('services.paypal.client_prod'),
                'secret'   => config('services.paypal.secret_prod'),
                'testMode' => config('services.paypal.mode_prod'),
            ]);
        }else {
            $gateway->initialize([
                'clientId' => config('services.paypal.client'),
                'secret'   => config('services.paypal.secret'),
                'testMode' => config('services.paypal.mode'),
            ]);
        }
           try {
            $transaction = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'rn' => '1',
                //'custom' => $_POST['package'],
                'returnUrl' => url('paymentsuccess'),
                'cancelUrl' => url('paymenterror'),
            ]);
            $response = $transaction->send();
            $data = $response->getData();
            //echo "Gateway purchase response data == " . print_r($data, true) . "\n";
           
                // if ($response->isSuccessful()) {
                    //echo "Purchase transaction was successful!\n";
               // }
               if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }
             } 
             catch(Exception $e) {
                return $e->getMessage();
            }
    }
    }
 
    public function payment_auction_success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $gateway = Omnipay::create('PayPal_Rest');
           // Initialise the gateway
           
        if(App::environment('production')) {
            $gateway->initialize([
                'clientId' => config('services.paypal.client_prod'),
                'secret'   => config('services.paypal.secret_prod'),
                'testMode' => config('services.paypal.mode_prod'),
            ]);
        }else {
            $gateway->initialize([
                'clientId' => config('services.paypal.client'),
                'secret'   => config('services.paypal.secret'),
                'testMode' => config('services.paypal.mode'),
            ]);
        }
            $transaction = $gateway->completePurchase([
                 'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);
            $response = $transaction->send();
         
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
         
                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();
         
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = 'USD';
                    $payment->payment_status = $arr_body['state'];
                    $payment->save();
                }
                $payment_id = $arr_body['id'];
                $amount = $arr_body['transactions'][0]['amount']['total'];
               // $payment->custom = $_POST['custom'];
                $countries = Countries::all();
                $data = array(
                    'payment_id' => $payment_id,
                    'countries' => $countries,
                    //'custom' => $custom,
                    'amount' => $amount
                );
            
            return view('listings.create_auction',compact('countries'))->with($data);
               
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction declined '.' <a href="./adintro" class="btn btn-info btn-md pull-right">Go Back To Post Ad</a>';
       
        }
    }
 
    public function payment_auction_error()
    {
        return 'Transaction Cancelled '.' <a href="./adintro" class="btn btn-info btn-md pull-right">Go Back To Post Ad</a>';
    }
 
}