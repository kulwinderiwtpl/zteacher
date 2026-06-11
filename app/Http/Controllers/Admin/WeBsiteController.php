<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Controllers\ManageController;
use App\Modules\Article\Model\WeBsiteModel;
use App\Modules\Manage\Model\AdvantageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeBsiteController extends ManageController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('manage');
        $this->theme->setTitle('站点配置');
        $this->theme->set('manageType', 'auth');
    }

    public function getWebSite()
    {
        $data = WeBsiteModel::find(1);
        $view = [
            'data' => $data
        ];
        return $this->theme->scope('zhuo.getWebSite', $view)->render();
    }


    public function postWebsite(Request $request)
    {
        $data = $request->except('_token');
        $file = $request->file('logo');

        echo '<pre>';
        var_dump($file);die;


        $file2 = $request->file('qrcode');
        if ($file) {
            $result = \FileClass::uploadFile($file, 'sys');
            $result = json_decode($result, true);
            $data['logo'] = $result['data']['url'];
        }
        if ($file2) {
            $result = \FileClass::uploadFile($file2, 'sys');
            $result = json_decode($result, true);
            $data['qrcode'] = $result['data']['url'];
        }

        $str = WeBsiteModel::upwebsite($data);
        if (!$str) {
            return redirect()->back()->with('error','修改失败！');
        }
        return redirect()->to('manage/webSite')->with('message', '操作成功！');
    }

}
