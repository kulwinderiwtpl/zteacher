<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Article\Model\NavCModel;
use App\Modules\Article\Model\NavEModel;
use App\Modules\Article\Model\WeBsiteModel;
use App\Modules\Manage\Model\AdvantageModel;
use App\Modules\Manage\Model\ManagerModel;
use App\Modules\Manage\Model\NavModel;
use App\Modules\Manage\Model\Role;
use App\Modules\Manage\Model\RoleUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    public function managerDetail($id)
    {
        $info = ManagerModel::select('manager.id', 'manager.username', 'manager.status', 'manager.email', 'manager.telephone', 'manager.QQ', 'manager.password', 'role_user.role_id')->leftJoin('role_user', 'manager.id', '=', 'role_user.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')->where('manager.id', $id)->first();
        $roles = Role::get();
        $data = array(

            'roles' => $roles,
            'info' => $info,

        );
        
        return view('admin.zhuo.managerDetail', $data);
    }

    public function upManagerDetail(Request $request)
    {
        $data = $request->get('data');
        $id = $data('uid');
        $password = $data('password');

        if (!ManagerModel::where('id', $id)->where('password', $password)->first()) {
            $salt = \CommonClass::random(4);
            $data = array(
                'password' => ManagerModel::encryptPassword($request->get('password'), $salt),
                'salt' => $salt,
                'updated_at' => date('Y-m-d H:i:s', time())
            );
        } else {
            $data = array(
                'updated_at' => date('Y-m-d H:i:s', time())
            );
        }
        $str = ManagerModel::where('id', $id)->update($data);

        if ($str) {
            return json_encode('1');
        }
        return json_encode('0');
    }

}
