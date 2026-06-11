<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MyUsersModel;
use App\Modules\Article\Model\NavCModel;
use App\Modules\Article\Model\NavEModel;
use App\Modules\Article\Model\RecruitModel;
use App\Modules\Article\Model\WeBsiteModel;
use App\Modules\Manage\Model\AdvantageModel;
use App\Modules\Manage\Model\NavModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitController extends Controller
{
    // public function __construct()
    // {
    //     parent::__construct();

    //     $this->initTheme('admin');
    //     $this->theme->setTitle('招聘管理');
    //     $this->theme->set('manageType', 'auth');
    // }

    public function getWork()
    {
        $recruits = RecruitModel::orderBy('created_at', 'DESC')->paginate(10);
        /*  foreach ($recruits as &$recruit) {
              $recruit['start_time'] = date('Y/m/d',$recruit['start_time']);
          }*/

        foreach ($recruits as &$v) {
            $user = MyUsersModel::select('school_name')->where('id', $v['user_id'])->first();
            if (!empty($user)) {
                $v['school_name'] = $user['school_name']; //获取机构名称
            } else {
                $v['school_name'] = '站内添加';
            }
        }

        $view = [
            'recruits' => $recruits
        ];
        return view('admin.zhuo.getWork', $view);
    }

    public function getRecruit($id)
    {
        $recruit = RecruitModel::find($id);
        $view = [
            'recruit' => $recruit,
        ];

        return $this->theme->scope('zhuo.getRecruit', $view)->render();
    }

    public function addWork()
    {
        return $this->theme->scope('zhuo.addWork')->render();
    }

    public function insertWork(Request $request)
    {
        $data = $request->get('data');

        $str = RecruitModel::addRecruit($data);

        if ($str) {

            return json_encode('ok');
        }

        return json_encode('error');
    }

    public function upWork($id)
    {
        $work = RecruitModel::find($id);

        $user = MyUsersModel::select('school_name')->where('id', $work['user_id'])->first();
        if (!empty($user)) {
            $work['school_name'] = $user['school_name']; //获取机构名称
        } else {
            $work['school_name'] = '站内添加';
        }

        $view = [
            'work' => $work,
        ];
        return $this->theme->scope('zhuo.upWork', $view)->render();
    }

    public function updateWork(Request $request)
    {
        $data = $request->get('data');

        $str = RecruitModel::upRecruit($data);
        if ($str) {

            return json_encode('ok');
        }
        return json_encode('error');
    }

    public function delWork($id)
    {
        $str = RecruitModel::delWork($id);
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
