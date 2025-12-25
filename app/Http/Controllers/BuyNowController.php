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
}
