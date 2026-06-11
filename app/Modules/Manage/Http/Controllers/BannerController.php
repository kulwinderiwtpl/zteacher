<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Controllers\ManageController;
use App\Model\BannerModel;
use App\Model\ContentNavModel;
use App\Model\NavModel;
use App\Model\WeBsiteModel;
use Illuminate\Http\Request;
use Cache;

class BannerController extends ManageController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('admin');
        $this->theme->setTitle('Banner');
        $this->theme->set('manageType', 'auth');
    }

    public function getChineseBanner(Request $request)
    {
        $where = 'nav_id <= 4';
        $navs = [
            '1' => '关于我们',
            '2' => '聘请外教',
            '3' => '外教人才库',
            '4' => '联系我们',
        ];
        $url = 'getChineseBanner';

        $title = $request->get('title');

        if (!empty($title)) {
            $where .= " and nav_id = $title";
        }
        $banners = BannerModel::getBanners(10, $where);

        foreach ($banners as &$banner) {
            $navTilte = NavModel::select('title')->find($banner['nav_id'])->toArray();
            $banner['title'] = $navTilte['title'];
        }

        $view = [
            'banners' => $banners,
            'navs' => $navs,
            'url' => $url,
            'type' => 1,
        ];

        return $this->theme->scope('zhuo.getBanners', $view)->render();
    }

//    public function getBanner(Request $request)
//    {
//        $where = 'nav_id > 4 and nav_id <= 10';
//        $navs = [
//            '5' => 'About Us',
//            '6' => 'Join Us',
//            '7' => 'Benefits',
//            '8' => 'Life in China',
//            '9' => 'working in China',
//            '10' => 'Contact us',
//        ];
//        $url = 'getEnglishBanner';
//
//        $title = $request->get('title');
//
//        if (!empty($title)) {
//            $where .= " and nav_id = $title";
//        }
//        $banners = BannerModel::getBanners(10, $where);
//
//        foreach ($banners as &$banner) {
//            $navTilte = NavModel::select('title')->find($banner['nav_id'])->toArray();
//            $banner['title'] = $navTilte['title'];
//        }
//
//        $view = [
//            'banners' => $banners,
//            'navs' => $navs,
//            'url' => $url,
//        ];
//
//        return $this->theme->scope('zhuo.getBanners', $view)->render();
//    }

    public function getEnglishBanner(Request $request)
    {
        $where = 'nav_id > 4 and nav_id <= 10';
        $title = $request->get('title');

        if (!empty($title)) {
            $where .= " and nav_id = $title";
        }
        $banners = BannerModel::getBanners(10, $where);

        foreach ($banners as &$banner) {
            $navTilte = NavModel::select('title')->find($banner['nav_id'])->toArray();
            $banner['title'] = $navTilte['title'];
        }

        $navs = [
            '5' => 'About Us',
            '6' => 'Join Us',
            '7' => 'Benefits',
            '8' => 'Life in China',
            '9' => 'working in China',
            '10' => 'Contact us',
        ];

        $view = [
            'banners' => $banners,
            'navs' => $navs,
            'url' => 'getEnglishBanner',
            'type' => 2,
        ];

        return $this->theme->scope('zhuo.getBanners', $view)->render();
    }


    public function upBanner($id)
    {
        $banner = BannerModel::find($id);
        $navTilte = NavModel::select('title')->find($banner['nav_id'])->toArray();
        if ($banner['nav_id'] <= 4) {
            $return_url = 'getChineseBanner';
        } else {
            $return_url = 'getEnglishBanner';
        }


        $banner['title'] = $navTilte['title'];
        $view = [
            'banner' => $banner,
            'return_url' => $return_url,
        ];
        return $this->theme->scope('zhuo.updataBanner', $view)->render();
    }


    public function updateBanner(Request $request)
    {
        $data = $request->get('data');

        $return_url = $data['return_url'];

        if (Cache::has('imageUrl')) {
            $data['img'] = Cache::get('imageUrl');
            Cache::forget('imageUrl');
        } else {
            unset($data['img']);
        }
        unset($data['file']);
        unset($data['return_url']);
//        var_dump($data);die;

        $str = BannerModel::upBanner($data);
        if ($str) {
            $data = [
                'code' => 100,
                'return_url' => $return_url,
            ];
        } else {
            $data = [
                'code' => 104,
            ];
        }
        return json_encode($data);

    }

    public function addBanner($type)
    {
        if ($type == 1) {
            $navs = [
                '1' => '关于我们',
                '2' => '聘请外教',
                '3' => '外教人才库',
                '4' => '联系我们',
            ];
            $return_url = 'getChineseBanner';
        } elseif ($type == 2) {
            $navs = [
                '5' => 'About Us',
                '6' => 'Join Us',
                '7' => 'Benefits',
                '8' => 'Life in China',
                '9' => 'working in China',
                '10' => 'Contact us',
            ];
            $return_url = 'getEnglishBanner';
        }
        $view = [
            'navs' => $navs,
            'return_url' => $return_url,
        ];

        return $this->theme->scope('zhuo.addBanner', $view)->render();
    }

    public function insertBanner(Request $request)
    {
        $data = $request->get('data');
        $return_url = $data['return_url'];

        if (Cache::has('imageUrl')) {
            $data['img'] = Cache::get('imageUrl');
            Cache::forget('imageUrl');
        } else {
            $msg = [
                'code' => 101,
                'msg' => '请选择图片！',
            ];
            return json_encode($msg);
        }
        if (!$data['nav_id']) {
            $msg = [
                'code' => 101,
                'msg' => '请选择栏目名称！',
            ];
            return json_encode($msg);
        }
        unset($data['file']);
        unset($data['return_url']);

        $str = BannerModel::addBanner($data);
        if ($str) {
            $msg = [
                'code' => 100,
                'msg' => '添加成功！',
                'return_url' => $return_url,
            ];
        } else {
            $msg = [
                'code' => 0,
                'msg' => '添加失败！',
            ];
        }

        return json_encode($msg);
    }

    public function delBanner($id)
    {
        $str = BannerModel::delBanner($id);

        if ($str) {
            $data = [
                'code' => 1,
                'msg' => '删除成功',
            ];
        } else {
            $data = [
                'code' => 0,
                'msg' => '删除失败',
            ];
        }
        return $data;
    }


}
