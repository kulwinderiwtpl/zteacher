<?php

namespace App\Modules\Article\Http\Controllers;

use App\Http\Controllers\IndexController as Controller;
use App\Model\BannerModel;
use App\Model\ContentNavModel;
use App\Model\NavModel;
use App\Model\ResumeModel;
use App\Model\WeBsiteModel;
use App\Modules\Article\Model\NavCModel;
use App\Modules\Article\Model\RecruitModel;
use Illuminate\Http\Request;

class IndexCnController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->initTheme('zTeachers');
        $this->theme->set('title', 'Z Teachers卓教');

    }

    public function index()
    {
        $banners = BannerModel::getNavBanners(1);
        $company = ContentNavModel::getContent(11);
        $services = ContentNavModel::getContent(12);
        $goal = ContentNavModel::getContent(13);
        $goal[0]['content'] = explode("\n", $goal[0]['content']);

        $navs = NavModel::getNav(1);

        $view = [
            'banners' => $banners,
            'company' => $company[0],
            'services' => $services,
            'navs' => $navs,
            'goal' => $goal[0],
        ];
        return $this->theme->scope('Chinese.index', $view)->render();
    }

    public function gethiring()
    {
        $banners = BannerModel::getNavBanners(2);
        $chooseUs = ContentNavModel::getContent(14);
        $process = ContentNavModel::getContent(15);
        $standard = ContentNavModel::getContent(16);
        $treatment = ContentNavModel::getContent(17);
        $expenses = ContentNavModel::getContent(18);
        $treatment[0]['content'] = explode("\n", $treatment[0]['content']);

        $navs = NavModel::getNav(2);
        $view = [
            'banners' => $banners,
            'chooseUs' => $chooseUs[0],
            'process' => $process,
            'standard' => $standard,
            'treatment' => $treatment[0],
            'expenses' => $expenses,
            'navs' => $navs,
        ];
        $this->theme->set('title', '聘请外教');
        return $this->theme->scope('Chinese.hiring', $view)->render();
    }

    /**
     * 联系我们
     *
     * @return mixed
     */
    public function getContactUs()
    {
        $banners = BannerModel::getNavBanners(4);
        $webSite = WeBsiteModel::getWebSite();

        $view = [
            'banners' => $banners,
            'webSite' => $webSite[0],
        ];
        $this->theme->set('title', '联系我们');
        return $this->theme->scope('Chinese.contactUs', $view)->render();
    }

    /**
     * 外教人才库
     *
     * @return mixed
     */
    public function getTalentPool()
    {
        $banners = BannerModel::getNavBanners(3);

        $view = [
            'banners' => $banners,

        ];
        $this->theme->set('title', '外教人才库');
        return $this->theme->scope('Chinese.talentPool', $view)->render();
    }

    public function getTalentPoolList()
    {
        $num = 8;//每页显示数据
        $resumeCount = ResumeModel::count();
        $resume = ResumeModel::paginate($num)->toArray();
        foreach ($resume['data'] as &$v) {
            if (empty($v['age'])) {
                $v['age'] = '未知';
            }
        }
        foreach ($resume['data'] as &$v) {
            if (empty($v['nationality'])) {
                $v['nationality'] = '未知';
            }
        }

        $data = [
            'pageCount' => ceil($resumeCount / $num),
            'resume' => $resume['data'],
        ];

        return json_encode($data);
    }

    public function getResume($id)
    {
        $resume = ResumeModel::find($id);
        if (!empty($resume['work_area'])) {
            $resume['work_area'] = json_decode($resume['work_area'], true);
        }
        if (!empty($resume['work_location'])) {
            $resume['work_location'] = json_decode($resume['work_location'], true);
        }
        $view = [
            'resume' => $resume
        ];
        $this->theme->set('title', '人才简历');
        return $this->theme->scope('Chinese.selfIntroduction', $view)->render();
    }


    public function getTalent($id)
    {
        $view = [


        ];
        return $this->theme->scope('Chinese.getTalent', $view)->render();
    }








}

















