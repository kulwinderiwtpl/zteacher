<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BannerModel;
use App\Model\ContentNavModel;
use App\Model\NavModel;
use App\Modules\Article\Model\NavCModel;
use App\Modules\Article\Model\NavEModel;
use Illuminate\Http\Request;
use Cache;

class ContentNavController extends Controller
{
    

    /**
     * 关于我们
     *
     * @return mixed
     */
    public function getAbouts()
    {
        $company = ContentNavModel::getContent(11);
        $services = ContentNavModel::getContent(12);
        $goal = ContentNavModel::getContent(13);

        $navs = NavModel::getNav(1);

        $view = [
            'company' => $company,
            'services' => $services,
            'goal' => $goal,
            'navs' => $navs,
        ];

        
        return view('admin.zhuo.aboutUs', $view);
    }

    public function upContent($id)
    {
        $return_url = request()->get('return_url');

        $content = ContentNavModel::find($id)->toArray();

        $nav = NavModel::find($content['nav_id'])->toArray();

        $view = [
            'content' => $content,
            'return_url' => $return_url,
            'title' => $nav['title'],
        ];

       //$this->theme->setTitle($nav['title']);
        if ($content['nav_id'] == 15) {
            return view('admin.zhuo.upProcess', $view);
        }
        return view('admin.zhuo.upContent', $view);
    }


    public function updateContent(Request $request)
    {

        $data = $request->get('data');
        $return_url = !empty($data['return_url'])?$data['return_url']:'';

        if (Cache::has('imageUrl')) {
            $data['image'] = Cache::get('imageUrl');
            Cache::forget('imageUrl');
        } else {
            unset($data['image']);
        }
        unset($data['file']);
        unset($data['return_url']);
        $str = ContentNavModel::upContent($data);
        if ($str) {
            $data = [
                'code' => 100,
                'msg' => '修改成功',
                'return_url' => $return_url,
            ];
        }else{
            $data = [
                'code' => 104,
                'msg' => '修改失败',
            ];
        }
        return json_encode($data);
    }

    public function navTitle($id)
    {
        $navs = NavModel::getNav($id);

        $parentNav_title = NavModel::select('title')->find($id)->toArray();

        $view = [
            'navs' => $navs,
            'parentNav_title' => $parentNav_title['title'],
        ];
        return $this->theme->scope('zhuo.navTitle', $view)->render();
    }

    /**
     * 聘请外教
     *
     * @return mixed
     */
    public function getHiringForeign()
    {
        $navs = NavModel::getNav(2);

        $chooseUs = ContentNavModel::getContent(14);
        $process = ContentNavModel::getContent(15);
        $standard = ContentNavModel::getContent(16);
        $treatment = ContentNavModel::getContent(17);
        $expenses = ContentNavModel::getContent(18);

        $navs = NavModel::getNav(2);

        $view = [
            'chooseUs' =>$chooseUs,
            'process' =>$process,
            'standard' =>$standard,
            'treatment' =>$treatment,
            'expenses' =>$expenses,
            'navs' =>$navs,
        ];
 
        return view('admin.zhuo.hiringForeign', $view);
    }

    public function upStandard($id){
        $standard =  ContentNavModel::find($id);

        $return_url = request()->get('return_url');

        $view = [
            'standard' => $standard,
            'return_url' => $return_url,
        ];
        return $this->theme->scope('zhuo.upStandard', $view)->render();
    }

    public function getContactUs()
    {
        $contactUs = ContentNavModel::getContent(14);


        $view = [

        ];

        return $this->theme->scope('zhuo.contactUs', $view)->render();
    }

}
