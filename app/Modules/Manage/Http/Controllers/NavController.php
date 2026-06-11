<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Controllers\ManageController;
use App\Model\NavModel;
use Illuminate\Http\Request;

class NavController extends ManageController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('admin');
//        $this->theme->setTitle('站点配置');
        $this->theme->set('manageType', 'auth');
    }

    public function updateNavTitle(Request $request)
    {
        $ids = $request->get('id');
        $titles = $request->get('title');
        $titleEns = $request->get('titleEn');
        foreach ($ids as $k => $id) {
            $data[] = [
                'id' => $id,
                'title' => $titles[$k],
                'titleEn' => $titleEns[$k],
            ];
        }

        $srt = NavModel::upNavs($data);

        if ($srt) {

            return json_encode('ok');
        }

        return json_encode('error');
    }

    /*public function getServices()
    {
        $services = NavCModel::getNavs(10);
        $view = [
            'services' => $services
        ];
        $this->theme->setTitle('聘请服务');
        return $this->theme->scope('zhuo.getServices', $view)->render();
    }

    public function getEngages()
    {
        $engages = NavCModel::getNavs(2);
        $view = [
            'engages' => $engages,
        ];

        $this->theme->setTitle('聘请详细');
        return $this->theme->scope('zhuo.getEngages', $view)->render();
    }

    public function getAbouts()
    {
        $abouts = NavCModel::getNavs(1);
        $view = [
            'abouts' => $abouts,
        ];
        $this->theme->setTitle('关于我们');
        return $this->theme->scope('zhuo.getAbouts', $view)->render();
    }

    public function getEnglishAbouts()
    {
        $abouts = NavEModel::getNavs(1);
        $view = [
            'abouts' => $abouts,
        ];
        $this->theme->setTitle('关于我们');
        return $this->theme->scope('zhuo.getEnglishAbouts', $view)->render();
    }

    public function getBenefits()
    {
        $benefits = NavEModel::getNavs(3);
        $view = [
            'benefits' => $benefits,
        ];
        $this->theme->setTitle('关于我们');
        return $this->theme->scope('zhuo.getBenefits', $view)->render();
    }

    public function upNav($id)
    {
        $data = NavCModel::find($id);
        $view = [
            'data' => $data,
            'url' => $_SERVER["HTTP_REFERER"],
            'postUrl' => 'updateNav'
        ];

        return $this->theme->scope('zhuo.upNav', $view)->render();
    }

    public function updateNav(Request $request)
    {
        $data = [
            'id' => $request->get('id'),
            'title' => $request->get('title'),
            'introduce' => $request->get('introduce'),
            'content' => $request->get('content'),
        ];
        $file = $request->file('image');
        if ($file) {
            $result = \FileClass::uploadFile($file, 'sys');
            $result1 = json_decode($result, true);
            $data['image'] = $result1['data']['url'];
        }

        $str = NavCModel::updateNav($data);
        if (!$str) {
            return redirect()->back()->with('error', '修改失败！');
        }

        return redirect()->to($request->get('url'))->with('message', '操作成功！');
    }

    public function upEnglishNav($id)
    {
        $data = NavEModel::find($id);
        $view = [
            'data' => $data,
            'url' => $_SERVER["HTTP_REFERER"],
            'postUrl' => 'upEnglishNav'
        ];
        return $this->theme->scope('zhuo.upNav', $view)->render();
    }

    public function updateEnglishNav(Request $request)
    {
        $data = [
            'id' => $request->get('id'),
            'title' => $request->get('title'),
            'introduce' => $request->get('introduce'),
            'content' => $request->get('content'),
        ];
        $str = NavEModel::updateNav($data);
        if (!$str) {
            return redirect()->back()->with('error', '修改失败！');
        }

        return redirect()->to($request->get('url'))->with('message', '操作成功！');
    }*/

}
