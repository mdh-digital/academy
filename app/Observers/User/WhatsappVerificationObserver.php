<?php

namespace App\Observers\User;

use App\Models\User\WhatsappVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsappVerificationObserver
{
    public function getData(Request $request, String $type)
    {
        return WhatsappVerification::where("phone", $request->phone)->where(function ($q) use ($type) {
            return $q->where("type", $type);
        })->first();
    }

    public function createData(Request $request, String $type, String $codeVerify)
    {
        $notification =  WhatsappVerification::create([
            'phone'             => $request->phone,
            'type'              => $type,
            'verify_code'       => $codeVerify,
            'temporary_data'    => now()->addMinutes(60)
        ]);

        return $notification;
    }

    public function updateData(WhatsappVerification $whatsapp,  String $codeVerify)
    {
        $whatsapp->update([
            'verify_code'       => $codeVerify,
            'temporary_data'    => now()->addMinutes(60)
        ]);
    }

    public function whatsAppNotif(array $data)
    {
        if ($data['phone'] != null) {
            $message = array(
                "authkey"         => env('WHATSAPP_KEY'),
                "appkey"          => env('WHATSAPP_SESSION'),
                'template_id'     => $data['use_template'] == true ? $data['template'] : '',
                'to'              => $data['phone'],
                "variables"       => $data['use_template'] == true ? $data['template_body'] : '',
                'message'         => $data['use_template'] == false ? $data['message'] : '',
            );

            return Http::accept('application/json')->post('https://chattalk.id/api/create-message', $message);
        }
    }

    public function verification(Request $request)
    {
        return WhatsappVerification::where("phone", $request->phone)->where("verify_code", $request->code)->first();
    }
}
