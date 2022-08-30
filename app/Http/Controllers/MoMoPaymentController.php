<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoMoPaymentController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $ch;
    }  
    public function momopayment(){
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderid = time() ."";
        $redirectUrl = "http://tmdt.com/momopayment";
        $ipnUrl = "http://tmdt.com/momopayment";
        $extraData = "";

    $returnUrl = "http://tmdt.com/momopayment";
    $notifyurl = "http://tmdt.com/momopayment";
    // Lưu ý: link notifyUrl không phải là dạng localhost
    $bankCode = "SML";
    $requestType = "payWithMoMoATM";
    $requestId = time()."";

         //before sign HMAC SHA256 signature
         $rawHashArr =  array(
                        'partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderid,
                        'orderInfo' => $orderInfo,
                        'bankCode' => $bankCode,
                        'returnUrl' => $returnUrl,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType
                        );
         // echo $serectkey;die;
         $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderid."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
         $signature = hash_hmac("sha256", $rawHash, $secretKey);

         $data =  array('partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderid,
                        'orderInfo' => $orderInfo,
                        'returnUrl' => $returnUrl,
                        'bankCode' => $bankCode,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature);
         $result =$this->execPostRequest($endpoint, json_encode($data));
         dd($result);
         $jsonResult = json_decode($result,true);  // decode json
         
         error_log( print_r( $jsonResult, true ) );
        return redirect()->to($jsonResult['payUrl']);
    }
}
