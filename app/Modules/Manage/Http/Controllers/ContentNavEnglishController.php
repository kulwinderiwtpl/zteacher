<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Controllers\ManageController;
use App\Model\AverageWageModel;
use App\Model\ConsumptionModel;
use App\Model\ContentNavModel;
use App\Model\NavModel;
use App\Modules\Article\Model\NavCModel;
use App\Modules\Article\Model\NavEModel;
use Illuminate\Http\Request;
use Cache;

class ContentNavEnglishController extends ManageController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('admin');
//        $this->theme->setTitle('站点配置');
        $this->theme->set('manageType', 'auth');
    }

    /**
     * About Us
     *
     * @return mixed
     */
    public function getAbouts()
    {
        $company = ContentNavModel::getContent(19);
        $services = ContentNavModel::getContent(20);
        $goal = ContentNavModel::getContent(21);

        $navs = NavModel::getNav(5);

        $view = [
            'company' => $company[0],
            'services' => $services[0],
            'goal' => $goal[0],
            'navs' => $navs,
        ];

        $this->theme->setTitle('About Us');
        return $this->theme->scope('zhuo.English.aboutUs', $view)->render();
    }

    public function upContent($id)
    {

        $content = ContentNavModel::find($id)->toArray();

        $nav = NavModel::find($content['nav_id'])->toArray();

        $view = [
            'content' => $content,
            'title' => $nav['title'],
        ];
        $this->theme->setTitle($nav['title']);
        if ($content['nav_id'] == 15) {
            return $this->theme->scope('zhuo.upProcess', $view)->render();
        }
        return $this->theme->scope('zhuo.upContent', $view)->render();
    }


    public function updateContent(Request $request)
    {

        $data = $request->get('data');

        if (Cache::has('imageUrl')) {
            $data['image'] = Cache::get('imageUrl');
            Cache::forget('imageUrl');
        } else {
            unset($data['image']);
        }
        unset($data['file']);
        $str = ContentNavModel::upContent($data);
        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');
    }

    /**
     * 栏目标题
     *
     * @param $id
     * @return mixed
     */
    public function navTitle($id)
    {
        $navs = NavModel::getNav($id);

        $parentNav_title = NavModel::select('title')->find($id)->toArray();

//        var_dump($navs);die;

        $view = [
            'navs' => $navs,
            'parentNav_title' => $parentNav_title['title'],
        ];
        return $this->theme->scope('zhuo.English.navTitle', $view)->render();
    }

    /**
     * Join Us
     *
     * @return mixed
     */
    public function getJoinUs()
    {
        $register = ContentNavModel::getContent(22);
        $process = ContentNavModel::getContent(23);

        $navs = NavModel::getNav(6);

        $view = [
            'register' => $register[0],
            'process' => $process[0],
            'navs' => $navs,
        ];
        $this->theme->setTitle('Join Us');
        return $this->theme->scope('zhuo.English.getJoinUs', $view)->render();
    }

    /**
     * Benefits
     *
     * @return mixed
     */
    public function getBenefits()
    {
        $benefitPackage = ContentNavModel::getContent(24);
        $salary = ContentNavModel::getContent(25);
        $benefit = ContentNavModel::getContent(26);

        $averageWage = AverageWageModel::get()->toArray();

        $navs = NavModel::getNav(7);

        $view = [
            'benefitPackage' => $benefitPackage[0],
            'salary' => $salary[0],
            'benefit' => $benefit[0],
            'averageWage' => $averageWage,
            'navs' => $navs,
        ];
        $this->theme->setTitle('Benefits');
        return $this->theme->scope('zhuo.English.getBenefits', $view)->render();
    }

    /**
     * Life In China
     *
     * @return mixed
     */
    public function getLifeInChina()
    {
        $living = ContentNavModel::getContent(8);

        $consumption = ConsumptionModel::get();
        $navs = NavModel::getNav(8);
        $view = [
            'living' => $living[0],
            'consumption' => $consumption,
            'navs' => $navs,
        ];
        $this->theme->setTitle('Benefits');
        return $this->theme->scope('zhuo.English.getLifeInChina', $view)->render();
    }

    /**
     * WorkingInChina
     *
     * @return mixed
     */
    public function getWorkingInChina()
    {

        $requirements = ContentNavModel::getContent(27);
        $certified = ContentNavModel::getContent(28);
        $permit = ContentNavModel::getContent(29);
        $visa = ContentNavModel::getContent(30);
        $arriving = ContentNavModel::getContent(31);

        $view = [
            'requirements' => $requirements[0],
            'certified' => $certified[0],
            'permit' => $permit[0],
            'visa' => $visa[0],
            'arriving' => $arriving[0],
        ];
        $this->theme->setTitle('working in China');
        return $this->theme->scope('zhuo.English.getWorkingInChina', $view)->render();
    }


    public function upAverageWage($id)
    {
        $averageWage = AverageWageModel::find($id);
        $view = [
            'averageWage' => $averageWage,
        ];
        return $this->theme->scope('zhuo.English.upAverageWage', $view)->render();
    }

    public function updataAverageWage(Request $request)
    {
        $data = $request->get('data');
        $str = AverageWageModel::upAverageWage($data);
        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');
    }


    public function addConsumption()
    {
        return $this->theme->scope('zhuo.English.addConsumption')->render();
    }

    public function insertConsumption(Request $request)
    {
        $data = $request->get('data');
        $str = ConsumptionModel::addConsumption($data);
        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');
    }

    public function upConsumption($id)
    {
        $consumption = ConsumptionModel::find($id);
        $view = [
            'consumption' => $consumption,
        ];

        return $this->theme->scope('zhuo.English.upConsumption',$view)->render();
    }
    public function updataConsumption(Request $request)
    {
        $data = $request->get('data');
        $str = ConsumptionModel::upConsumption($data);
        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');
    }

    public function delConsumption($id)
    {
        $str = ConsumptionModel::delConsumption($id);
        if ($str) {
            $data = [
                'code' => 1,
                'msg' => '删除成功',
            ];
        }else{
            $data = [
                'code' => 0,
                'msg' => '删除失败',
            ];
        }
        return $data;
    }
}
