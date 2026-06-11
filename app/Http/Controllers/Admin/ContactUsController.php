<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\WeBsiteModel;
use Illuminate\Http\Request;
use Cache;

class ContactUsController extends Controller
{

    public function getContactUs()
    {
        $contactUs = WeBsiteModel::get()->toArray();

        $view = [
            'contactUs' => $contactUs[0],
        ];

        return view('admin.zhuo.contactUs', $view);
    }

    public function updateContactUs(Request $request)
    {
        $data = $request->get('data');

        if (Cache::has('imageUrl')) {
            $data['qrcode'] = Cache::get('imageUrl');
            Cache::forget('imageUrl');
        } else {
            unset($data['qrcode']);
        }
        unset($data['file']);

        $str = WeBsiteModel::upwebsite($data);
        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');

    }


























}
