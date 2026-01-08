<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use KHQR\BakongKHQR;
use KHQR\Helpers\KHQRData;
use KHQR\Models\IndividualInfo;

class BuyNowController extends Controller
{
    //
    public function buyNow(Request $request)
    {

        $name = $request->input('name');
        $price = $request->input('price', 1);

        // payment process here...
        $individualInfo = new IndividualInfo(
            bakongAccountID: 'choeurn_pinchai@aclb',
            merchantName: 'CHOEURN PINCHAI',
            merchantCity: 'PHNOM PENH',
            currency: KHQRData::CURRENCY_USD,
            amount: $price
        );
        $khqr = BakongKHQR::generateIndividual($individualInfo);
        return view('payment')->with([
            'qrData' => $khqr->data,
            'name' => $name,
            'price' => $price,
        ]);

        // Send Notification to Telegram
        // $response = $this->SendNotification($name, $price);
//        return response()->json([
//            'message' => 'Buy Now action processed',
//            //'response' => $response->body(),
//        ]);
    }


    public function checkTransactionStatus(Request $request)
    {
        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiYjc3Y2EyOWY5YzdlNDJhNiJ9LCJpYXQiOjE3NjcwNzYxODcsImV4cCI6MTc3NDg1MjE4N30.tgKhi1KGnQz3yN1iajexD61rB42XXIoTjiQfIWKwOcY";
        $md5 = $request->md5;
        $bakongKhqr = new BakongKHQR($token);
        $response = $bakongKhqr->checkTransactionByMD5($md5);
        return response()->json($response);
    }


    public function customerThank(Request $request)
    {
        return view('customer_thank');
    }


    function SendNotification($name, $price)
    {
        $url = 'https://api.telegram.org/bot8233326240:AAFtWi4TpjxTf_Tnj6vldczlVwIDfJZK_WI/sendMessage';
        $html = "<b>You have new order!</b>\n";
        $html .= "<b>customerPhone: Leng ChanDara</b>\n";
        $html .= "<b>customerEmail: daranosmok168@gmail.com</b>\n";
        $html .= "<b>customerProvince: Oddormeanchey</b>\n";
        $html .= "<b>=== Product information ===</b>\n";
        $html .= "<b>1. {$name} x {$price}</b>\n";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'User-Agent' => 'test',
        ])->post($url, [
            "text" => $html,
            "parse_mode" => "HTML",
            "disable_web_page_preview" => false,
            "disable_notification" => false,
            "reply_to_message_id" => null,
            "chat_id" => "6771119279"
        ]);

        return $response;
    }


    function productDetail(Request  $request){
        return view('detail');
    }
}

