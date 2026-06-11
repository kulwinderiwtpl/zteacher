<?php

namespace App\Modules\Article\Http\Controllers;

use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
use App\Modules\Manage\Model\AboutUsModel;
use App\Modules\Manage\Model\BannerModel;
use App\Modules\Manage\Model\AdvantageModel;
use App\Modules\Manage\Model\PublicityModel;
use App\Modules\Manage\Model\ProductModel;
use App\Modules\Manage\Model\PressCenterModel;
use App\Modules\Manage\Model\MymailModel;
use App\Modules\Manage\Model\CultureModel;
use App\Modules\Manage\Model\RecruitModel;

class myBeerController extends IndexController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('beer');
    }


    public function index(Request $request)
    {
        $banner = BannerModel::getid(1);

        $advantage = AdvantageModel::getList();

        $publicity = PublicityModel::getid(1);

        $product = ProductModel::select('*')->orderBy('created_at', 'DESC')->get();

        $press1 = PressCenterModel::newpressCenter(2, 0, 4);

        $press2 = PressCenterModel::newpressCenter(1, 0, 2);

        $press3 = PressCenterModel::newpressCenter(3, 0, 2);

        $view = [
            'banner' => $banner,
            'advantage' => $advantage,
            'publicity' => $publicity,
            'product' => $product,
            'press1' => $press1,
            'press2' => $press2,
            'press3' => $press3,
        ];
        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '首页');
        return $this->theme->scope('beer.index', $view)->render();
    }

    public function getnews()
    {
        $press1 = PressCenterModel::newpressCenter(1, 0, 3);

        $press2 = PressCenterModel::newpressCenter(3, 0, 3);

        $press = [$press1, $press2];

        return json_encode($press);
    }


    public function product()
    {
        $banner = BannerModel::getid(2);

        $publicity = PublicityModel::getid(2);

        $product = ProductModel::select('*')->orderBy('created_at', 'DESC')->get();

        $view = [
            'product' => $product,
            'banner' => $banner,
            'publicity' => $publicity
        ];

        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '产品中心');
        return $this->theme->scope('beer.product', $view)->render();
    }

    public function news()
    {
        $banner = BannerModel::getid(3);

        $press1 = PressCenterModel::newpressCenter(1, 0, 4);
        $press11 = PressCenterModel::newpressCenter(1, 4, 4);

        $press2 = PressCenterModel::newpressCenter(2, 0, 4);

        $press3 = PressCenterModel::newpressCenter(3, 0, 3);
        $press31 = PressCenterModel::newpressCenter(3, 3, 4);

        $view = [
            'banner' => $banner,
            'press1' => $press1,
            'press2' => $press2,
            'press3' => $press3,
            'press11' => $press11,
            'press31' => $press31,
        ];

        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '公司资讯');
        return $this->theme->scope('beer.news', $view)->render();
    }

    public function culture()
    {
        $banner = BannerModel::getid(4);

        $culture = CultureModel::getList();

        $view = [
            'banner' => $banner,
            'culture' => $culture
        ];

        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '企业文化');
        return $this->theme->scope('beer.culture', $view)->render();
    }

    public function contact()
    {
        $banner = BannerModel::getid(5);


        $view = [
            'banner' => $banner
        ];

        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '联系我们');
        return $this->theme->scope('beer.contact', $view)->render();
    }

    public function message(Request $request)
    {
        $message = $request->except('_token');

        $stu = MymailModel::insert($message);
        if ($stu) {
            $ale = '发送成功！';
        }

        $banner = BannerModel::getid(5);
        $view = [
            'banner' => $banner,
            'ale' => $ale
        ];
        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '联系我们');
        return $this->theme->scope('beer.contact', $view)->render();
    }

    public function join()
    {
        $banner = BannerModel::getid(6);

        $recruit = RecruitModel::getList();

        $view = [
            'banner' => $banner,
            'recruit' => $recruit
        ];

        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '加入我们');
        return $this->theme->scope('beer.join', $view)->render();
    }

    public function detail(Request $request)
    {
        $id = $request->id;

        $products = ProductModel::select('*')->orderBy('created_at', 'DESC')->get();

        $product = ProductModel::getid($id);

        $similar = ProductModel::select('*')->where('category', $product[0]['category'])->where('id', '!=', $id)->get();
        if (!isset($similar[0])) {

        }
        $view = [
            'products' => $products,
            'similar' => $similar,
            'product' => $product
        ];

        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '产品详情');
        return $this->theme->scope('beer.detail', $view)->render();
    }

    public function news_detail(Request $request)
    {

        $news = PressCenterModel::getid($request->id);

        $banner = BannerModel::getid(3);
        $view = [
            'banner' => $banner,
            'news' => $news
        ];

        $footer = AboutUsModel::getList();
        $footer[0]['introduce'] = explode("\n", $footer[0]['introduce']);
        $this->theme->set('footer', $footer);
        $this->theme->set('title', '新闻详情');
        return $this->theme->scope('beer.news_detail', $view)->render();
    }

    public function search_news(Request $request)
    {
        $term = $_GET['term'];

        $data = PressCenterModel::select('*')->where('title', 'like', '%' . $term . '%')->get();

        $title = [];

        foreach ($data as $k => $v) {
            $title[] = $v['title'];
        }
        return json_encode($title);
    }

    public function confirm_news(Request $request)
    {

        $news = PressCenterModel::select('*')->where('title', 'like', '%' . $request->title . '%')->get();


        if (!isset($news[0])) {
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
        return redirect()->to('/news_detail/' . $news[0]->id);
    }


}

















