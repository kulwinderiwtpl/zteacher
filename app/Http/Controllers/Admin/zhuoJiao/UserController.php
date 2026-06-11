<?php

namespace App\Modules\Manage\Http\Controllers\zhuoJiao;

use App\Http\Controllers\ManageController;
use App\Modules\User\Model\MyUsersModel;
use Illuminate\Http\Request;

class UserController extends ManageController
{
    public function __construct()
    {
        parent::__construct();

        $this->initTheme('manage');
        $this->theme->setTitle('用户管理');
        $this->theme->set('manageType', 'auth');
    }

    public function getMyUsers()
    {
        $users = MyUsersModel::orderBy('created_at','DESC')->paginate(15);

        $view = [
            'users' => $users,
        ];

        return $this->theme->scope('zhuo.getMyUsers', $view)->render();
    }

    public function upMyUser($id)
    {
        $user = MyUsersModel::find($id);
        $view = [
            'user' => $user,
        ];
        return $this->theme->scope('zhuo.upMyUsers', $view)->render();
    }

    public function updateMyUser(Request $request)
    {
        $data = $request->except('_token');

        $str = MyUsersModel::updateUser($data);

        if (!$str) {
            return redirect()->back()->with('error', '编辑失败！');
        }
        return redirect()->to('manage/myUsers')->with('message', '操作成功！');
    }



}
