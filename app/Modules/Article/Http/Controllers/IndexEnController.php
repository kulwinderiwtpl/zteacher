<?php

namespace App\Modules\Article\Http\Controllers;

use App\Http\Controllers\IndexEnController as Controller;
use App\Model\AverageWageModel;
use App\Model\BannerModel;
use App\Model\ConsumptionModel;
use App\Model\ContentNavModel;
use App\Model\NavModel;
use App\Modules\Article\Model\NavCModel;
use App\Modules\Article\Model\NavEModel;
use App\Modules\Article\Model\WeBsiteModel;

class IndexEnController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('zTeachersEn');
        $this->theme->set('title', 'Z Teachers');
    }

    public function index()
    {

        $banners = BannerModel::getNavBanners(5);
        $company = ContentNavModel::getContent(19);
        $services = ContentNavModel::getContent(20);
        $goal = ContentNavModel::getContent(21);
        $navs = NavModel::getNav(5);
        $view = [
            'banners' => $banners,
            'navs' => $navs,
            'company' => $company[0],
            'services' => $services[0],
            'goal' => $goal[0],
        ];
        return $this->theme->scope('English.index', $view)->render();
    }

    public function joinUs()
    {
        $banners = BannerModel::getNavBanners(6);
        $register = ContentNavModel::getContent(22);
        $process = ContentNavModel::getContent(23);

        $register[0]['content'] = explode("\n", $register[0]['content']);
        $process[0]['content'] = explode("\n", $process[0]['content']);
        $navs = NavModel::getNav(6);
        $view = [
            'banners' => $banners,
            'navs' => $navs,
            'register' => $register[0],
            'process' => $process[0],
        ];
        $this->theme->set('title', 'Join Us');
        return $this->theme->scope('English.joinUs', $view)->render();
    }

    public function getBenefits()
    {
        $banners = BannerModel::getNavBanners(7);
        $benefit = ContentNavModel::getContent(24);
        $process = ContentNavModel::getContent(25);
        $overseas = ContentNavModel::getContent(26);
        $benefit[0]['introduce'] = explode("\n", $benefit[0]['introduce']);
        $benefit[0]['content'] = explode("\n", $benefit[0]['content']);
        $overseas[0]['content'] = explode("\n", $overseas[0]['content']);

        $averageWage = AverageWageModel::get()->toArray();
        $navs = NavModel::getNav(7);
        $view = [
            'banners' => $banners,
            'navs' => $navs,
            'benefit' => $benefit[0],
            'process' => $process[0],
            'averageWage' => $averageWage,
            'overseas' => $overseas[0],
        ];
        $this->theme->set('title', 'Benefits');
        return $this->theme->scope('English.getBenefits', $view)->render();
    }

    public function working()
    {
        $banners = BannerModel::getNavBanners(9);
        $requirements = ContentNavModel::getContent(27);
        $requirements[0]['content'] = explode("\n", $requirements[0]['content']);
        $certified = ContentNavModel::getContent(28);
        $permit = ContentNavModel::getContent(29);

        $permit[0]['content'] = explode("\n", $permit[0]['content']);
        foreach ($permit[0]['content'] as &$content) {
            $contents = explode("&&", $content);
            $content = [
                'title' => $contents[0],
                'content' => empty($contents[1]) ? '' : $contents[1],
            ];
        }

        $visa = ContentNavModel::getContent(30);
        $visa[0]['content'] = explode("\n", $visa[0]['content']);
        $arriving = ContentNavModel::getContent(31);

        $view = [
            'banners' => $banners,
            'requirements' => $requirements[0],
            'certified' => $certified[0],
            'permit' => $permit[0],
            'visa' => $visa[0],
            'arriving' => $arriving[0],
        ];
        $this->theme->setTitle('Working in China');
        return $this->theme->scope('English.working', $view)->render();
    }

    public function life()
    {
        $banners = BannerModel::getNavBanners(9);
        $living = ContentNavModel::getContent(8);

        $consumption = ConsumptionModel::get();

        $str=  ConsumptionModel::where('id','>',1)->count('tier1');
        $navs = NavModel::getNav(8);
//        var_dump($str);die;
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        foreach ($consumption as $k => $v) {
            if ($k) {
                $count1 += $v['tier1'];
                $count2 += $v['tier2'];
                $count3 += $v['tier3'];
            }
        }

        $view = [
            'living' => $living[0],
            'consumption' => $consumption,
            'navs' => $navs,
            'banners' => $banners,
            'count1' => $consumption[0]['tier1']-$count1,
            'count2' => $consumption[0]['tier2']-$count2,
            'count3' => $consumption[0]['tier3']-$count3,
        ];
        $this->theme->set('title', 'Life in China');
        return $this->theme->scope('English.life', $view)->render();
    }

    public function contactUs()
    {
        $banners = BannerModel::getNavBanners(10);
        $view = [
            'banners' => $banners,
        ];
        $this->theme->set('title', 'Contact Us');
        return $this->theme->scope('English.contactUs', $view)->render();
    }

}

















