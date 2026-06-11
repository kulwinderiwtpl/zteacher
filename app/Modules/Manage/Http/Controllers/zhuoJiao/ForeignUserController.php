<?php

namespace App\Modules\Manage\Http\Controllers\zhuoJiao;

use App\Http\Controllers\ManageController;
use App\Modules\User\Model\ForeignUsersModel;
use App\Modules\User\Model\MyUsersModel;
use Illuminate\Http\Request;

class ForeignUserController extends ManageController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('manage');
        $this->theme->setTitle('用户管理');
        $this->theme->set('manageType', 'auth');
    }

    public function getForeignUsers()
    {
        $users = ForeignUsersModel::orderBy('created_at','DESC')->paginate(15);

        $view = [
            'users' => $users,
        ];

        return $this->theme->scope('zhuo.getForeignUsers', $view)->render();
    }

    public function upForeignUsers($id)
    {
        $user = ForeignUsersModel::find($id);
        $view = [
            'user' => $user,
        ];
        return $this->theme->scope('zhuo.upForeignUsers', $view)->render();
    }

    public function updateMyUser(Request $request)
    {
        $data = $request->except('_token');

        $str = ForeignUsersModel::updateUser($data);

        if (!$str) {
            return redirect()->back()->with('error', '编辑失败！');
        }
        return redirect()->to('manage/foreignUsers')->with('message', '操作成功！');
    }



}
