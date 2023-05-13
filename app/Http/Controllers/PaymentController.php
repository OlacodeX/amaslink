<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use PragmaRX\Countries\Package\Countries;
 
class PaymentController extends Controller
{
 
    public $gateway;
 
    public function __construct()
    {
        
        $this->middleware('auth');
          $gateway = Omnipay::create('PayPal_Rest');
         // Initialise the gateway
         $gateway->initialize(array(
           'clientId' => 'AW94OtdyJ3WLt8VID1fPOgizuLJU32mvhbm6pfU1wkp2ZqqC8Mgx5_dzwlCxuJjwDTL2iIG67UGqm160',
           'secret'   => 'EAJsiStyeH37SKHqgO3O3AdyFRW1k-B4AIa5MqXVSti70Qj1uThgMZN44mukbmfoOczOZ1wsyjl3Kh_G',
            'testMode' => false, // Or false when you are ready for live transactions
         ));
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
           $gateway->initialize(array(
           'clientId' => 'AW94OtdyJ3WLt8VID1fPOgizuLJU32mvhbm6pfU1wkp2ZqqC8Mgx5_dzwlCxuJjwDTL2iIG67UGqm160',
           'secret'   => 'EAJsiStyeH37SKHqgO3O3AdyFRW1k-B4AIa5MqXVSti70Qj1uThgMZN44mukbmfoOczOZ1wsyjl3Kh_G',
            'testMode' => false, // Or false when you are ready for live transactions
           ));
           try {
            $transaction = $gateway->purchase(array(
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'rn' => '1',
                //'custom' => $_POST['package'],
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),
            ));
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
            $gateway->initialize(array(
            'clientId' => 'AW0bOSkBM5Sa7S3s8TmJ1tSc1MmX0qA6zHEXEmiHP5fnn_GCkR1xRPGYHIwxFkkoFtA7feFNp9cIDdXO',
            'secret'   => 'EE5VqIYQQhgCVji_rAG6Ji-8JiOe3pcMUNcm8j3ritGTb__v00lc50SnFr8r-YL01MusACYzzcJjUsIN',
             'testMode' => false, // Or false when you are ready for live transactions
            ));
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
                        $payment->currency = env('PAYPAL_CURRENCY');
                        $payment->payment_status = $arr_body['state'];
                        $payment->save();
                    }
                    $payment_id = $arr_body['id'];
                    $amount = $arr_body['transactions'][0]['amount']['total'];
                    $listings = Listings::where('user_id', auth()->user()->id)->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(5);
                    $data = array(
                        'payment_id' => $payment_id,
                        'listings' => $listings,
                        'amount' => $amount
                    );
                
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
           $gateway->initialize(array(
           'clientId' => 'AW94OtdyJ3WLt8VID1fPOgizuLJU32mvhbm6pfU1wkp2ZqqC8Mgx5_dzwlCxuJjwDTL2iIG67UGqm160',
           'secret'   => 'EAJsiStyeH37SKHqgO3O3AdyFRW1k-B4AIa5MqXVSti70Qj1uThgMZN44mukbmfoOczOZ1wsyjl3Kh_G',
            'testMode' => false, // Or false when you are ready for live transactions
           ));
           try {
            $transaction = $gateway->purchase(array(
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'rn' => '1',
                //'custom' => $_POST['package'],
                'returnUrl' => url('paymentsuccessfree'),
                'cancelUrl' => url('paymenterrorfree'),
            ));
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
           $gateway->initialize(array(
           'clientId' => 'AW0bOSkBM5Sa7S3s8TmJ1tSc1MmX0qA6zHEXEmiHP5fnn_GCkR1xRPGYHIwxFkkoFtA7feFNp9cIDdXO',
           'secret'   => 'EE5VqIYQQhgCVji_rAG6Ji-8JiOe3pcMUNcm8j3ritGTb__v00lc50SnFr8r-YL01MusACYzzcJjUsIN',
            'testMode' => false, // Or false when you are ready for live transactions
           ));
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
                    $payment->currency = env('PAYPAL_CURRENCY');
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
           $gateway->initialize(array(
           'clientId' => 'AW94OtdyJ3WLt8VID1fPOgizuLJU32mvhbm6pfU1wkp2ZqqC8Mgx5_dzwlCxuJjwDTL2iIG67UGqm160',
           'secret'   => 'EAJsiStyeH37SKHqgO3O3AdyFRW1k-B4AIa5MqXVSti70Qj1uThgMZN44mukbmfoOczOZ1wsyjl3Kh_G',
            'testMode' => false, // Or false when you are ready for live transactions
           ));
           try {
            $transaction = $gateway->purchase(array(
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'rn' => '1',
                //'custom' => $_POST['package'],
                'returnUrl' => url('paymentsuccess'),
                'cancelUrl' => url('paymenterror'),
            ));
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
       $gateway->initialize(array(
           'clientId' => 'AW94OtdyJ3WLt8VID1fPOgizuLJU32mvhbm6pfU1wkp2ZqqC8Mgx5_dzwlCxuJjwDTL2iIG67UGqm160',
           'secret'   => 'EAJsiStyeH37SKHqgO3O3AdyFRW1k-B4AIa5MqXVSti70Qj1uThgMZN44mukbmfoOczOZ1wsyjl3Kh_G',
            'testMode' => false, // Or false when you are ready for live transactions
       ));
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
           $gateway->initialize(array(
           'clientId' => 'AW94OtdyJ3WLt8VID1fPOgizuLJU32mvhbm6pfU1wkp2ZqqC8Mgx5_dzwlCxuJjwDTL2iIG67UGqm160',
           'secret'   => 'EAJsiStyeH37SKHqgO3O3AdyFRW1k-B4AIa5MqXVSti70Qj1uThgMZN44mukbmfoOczOZ1wsyjl3Kh_G',
            'testMode' => false, // Or false when you are ready for live transactions
           ));
           try {
            $transaction = $gateway->purchase(array(
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'rn' => '1',
                //'custom' => $_POST['package'],
                'returnUrl' => url('paymentsuccess'),
                'cancelUrl' => url('paymenterror'),
            ));
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
           $gateway->initialize(array(
           'clientId' => 'AW94OtdyJ3WLt8VID1fPOgizuLJU32mvhbm6pfU1wkp2ZqqC8Mgx5_dzwlCxuJjwDTL2iIG67UGqm160',
           'secret'   => 'EAJsiStyeH37SKHqgO3O3AdyFRW1k-B4AIa5MqXVSti70Qj1uThgMZN44mukbmfoOczOZ1wsyjl3Kh_G',
            'testMode' => false, // Or false when you are ready for live transactions
           ));
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