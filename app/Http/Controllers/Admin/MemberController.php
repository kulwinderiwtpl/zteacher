<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\MyUsersModel;
use App\Model\WeBsiteModel;
use App\Tool\Communal;
use Illuminate\Http\Request;
use Cache;

class MemberController extends Controller
{
    // public function __construct()
    // {
    //     parent::__construct();

    //     $this->initTheme('admin');
    //     $this->theme->setTitle('会员信息');
    //     $this->theme->set('manageType', 'auth');
    // }

    public function getMember()
    {
        $members = MyUsersModel::orderBy('created_at', 'DESC')->paginate(10);

        $view = [
            'members' => $members,
        ];

        return view('admin.zhuo.getMember', $view);
    }

    public function addMember()
    {

        return $this->theme->scope('zhuo.addMember')->render();
    }

    public function insertMember(Request $request)
    {
        $data = $request->get('data');
        if (MyUsersModel::getUser($data['email'])) {
            return json_encode('邮箱已存在');
        }

        $data['password'] = Communal::encrypt('123456');

        $str = MyUsersModel::addUsers($data);
        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');
    }

    public function upMember($id)
    {
        $menber = MyUsersModel::find($id);

        $view = [
            'menber' => $menber,
        ];
        return $this->theme->scope('zhuo.upMember',$view)->render();
    }

    public function updateMember(Request $request)
    {
        $data = $request->get('data');

        $str = MyUsersModel::updateUser($data);
        if ($str) {
            return json_encode('ok');
        }
        return json_encode('error');

    }

    public function delMember($id)
    {
        $str = MyUsersModel::delMember($id);

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
