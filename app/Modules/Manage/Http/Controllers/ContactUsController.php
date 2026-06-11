<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Controllers\ManageController;
use App\Model\WeBsiteModel;
use Illuminate\Http\Request;
use Cache;

class ContactUsController extends ManageController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('admin');
        $this->theme->setTitle('联系我们');
        $this->theme->set('manageType', 'auth');
    }

    public function getContactUs()
    {
        $contactUs = WeBsiteModel::get()->toArray();

        $view = [
            'contactUs' => $contactUs[0],
        ];

        return $this->theme->scope('zhuo.contactUs', $view)->render();
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
