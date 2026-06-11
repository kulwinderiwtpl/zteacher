<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ResumeModel;
use App\Modules\User\Model\ForeignUsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TalentPoolController extends Controller
{
    // public function __construct()
    // {
    //     parent::__construct();

    //     $this->initTheme('admin');
    //     $this->theme->setTitle('人才库');
    //     $this->theme->set('manageType', 'auth');
    // }

    public function getTalentPool()
    {
        $users = ResumeModel::orderBy('created_at', 'DESC')->paginate(10);

        foreach ($users as $user) {
            if (!empty($user['work_area'])) {
                $user['work_area'] = json_decode($user['work_area'], true);
            }
            if (!empty($user['work_location'])) {
                $user['work_location'] = json_decode($user['work_location'], true);
            }
        }
        $view = [
            'users' => $users,
        ];
        return view('admin.zhuo.talentPool', $view);
    }

    public function addTalentPool()
    {

        return $this->theme->scope('zhuo.addTalentPool')->render();
    }

    public function insertTalentPool(Request $request)
    {
        $data = $request->get('data');
        if (!$data['picture1']) {
            $msg = [
                'code' => 101,
                'msg' => '请上传照片！',
            ];
            return json_encode($msg);
        }
        if (ResumeModel::getUser($data['email'])) {
            $msg = [
                'code' => 101,
                'msg' => '邮箱已存在',
            ];
            return json_encode($msg);
        }
        if (Cache::has('resumeUrl')) {
            $data['resume'] = Cache::get('resumeUrl');
            Cache::forget('resumeUrl');
        } else {
            unset($data['resume']);
        }
        unset($data['file']);

        $str = ResumeModel::addTalentPool($data);
        if ($str) {
            $msg = [
                'code' => 100,
                'msg' => '添加成功',
            ];
        } else {
            $msg = [
                'code' => 104,
                'msg' => '添加失败',
            ];
        }
        return json_encode($msg);
    }

    public function upTalentPool($id)
    {
        $resume = ResumeModel::find($id);

        $resume['work_area'] = json_decode($resume['work_area'], true);
        if (!empty($resume['work_area']) && $resume['work_area']) {
            foreach ($resume['work_area'] as $v) {
                $work_area[$v] = $v;
            }
            $resume['work_area'] = $work_area;
        }
        $resume['work_location'] = json_decode($resume['work_location'], true);
        if (!empty($resume['work_location']) && $resume['work_location']) {
            foreach ($resume['work_location'] as $v) {
                $work_location[$v] = $v;
            }
            $resume['work_location'] = $work_location;
        }


        $view = [
            'resume' => $resume,
        ];
        return $this->theme->scope('zhuo.upTalentPool', $view)->render();
    }


    public function updateTalentPool(Request $request)
    {
        $data = $request->get('data');

        if (!$data['picture1']) {
            unset($data['picture1']);
        }
        if (!$data['picture2']) {
            unset($data['picture2']);
        }
        if (!$data['picture3']) {
            unset($data['picture3']);
        }

        if (Cache::has('resumeUrl')) {
            $data['resume'] = Cache::get('resumeUrl');
            Cache::forget('resumeUrl');
        } else {
            unset($data['resume']);
        }
        unset($data['file']);
        $str = ResumeModel::upResume($data);

        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');
    }

    public function deleteTalentPool($id)
    {

        $str = ResumeModel::deleteTalentPool($id);

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


    public function downloadResume($resume_id)
    {
        $resume = ResumeModel::select('resume', 'frist_name')->find($resume_id)->toArray();

        var_dump('http://' . request()->getHost() . '/' . $resume['resume']);
    }

}
