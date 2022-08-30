<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Cart;
use Mail;
class VNPayController extends Controller
{
    public function vnpay(){
        $vnp_TxnRef = session()->get('id'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $total_amount=session()->get('total_amount');
        //   dd( session('code_order'));
        return view('frontend.pages.vnpay')->with(['code_order'=>$vnp_TxnRef,'total_amount'=>$total_amount]);
    }
    public function index(Request $request){
        
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://tmdt.net/return-vnpay";
        $vnp_TmnCode = "5HVG5QWK";//Mã website tại VNPAY 
        $vnp_HashSecret = "IFXMNXOTYCTKMCQAPXBTZCEATRCRDROY"; //Chuỗi bí mật
        session(['url_prev' => url()->previous()]);
        $vnp_TxnRef =$request->code_order;   //'ORD-'.strtoupper(Str::random(10)); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        
        $vnp_OrderInfo = 'Thanh toán đơn hàng tại H2T Shop có mã '.$vnp_TxnRef;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount =$request->total_amount * 100;   //150000 * 100;
        $vnp_Locale = 'vn';
        // dd($vnp_TxnRef,$vnp_Amount);
        $vnp_BankCode = $request->vnpay ;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
          
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
                request()->session()->flash('success','Sản phẩm được đặt hàng thành công khi đặt hàng');
                return redirect($vnp_Url);
            }
    }
    public function return(Request $request)
{
    $url = session('url_prev','/');
    // dd($request->vnp_ResponseCode);
    $date=date("Y-m-d H:i:s", $request->vnp_CreateDate);
    //dd($request->vnp_TxnRef);
    if($request->vnp_ResponseCode == "00") {
        Mail::send('frontend.pages.sendmailorder',['code_order'=>$request->vnp_TmnCode, 'total_amount'=>$request->vnp_Amount ], function($email)  {
            $email->to(auth()->user()->email);
            $email->subject('Đặt hàng H2T Shop');
        });
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $request->vnp_TxnRef]);
        request()->session()->flash('success','Đã thanh toán phí dịch vụ');
        return redirect()->route('home');
    }
    // $order=Order::where('user_id', auth()->user()->id)->where('created_at',$date);
    // $order->delete();
    // session()->forget('url_prev');
    request()->session()->flash('errors','Lỗi trong quá trình thanh toán phí dịch vụ');
    return redirect()->back();
}
}
