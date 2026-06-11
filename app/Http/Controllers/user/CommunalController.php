<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 下午 15:35
 */

namespace App\Modules\User\Http\Controllers;


use App\Http\Controllers\IndexController;
use App\Modules\Article\Model\RecruitModel;
use App\Modules\User\Http\Requests\LoginRequest;
use App\Modules\User\Http\Requests\RegisterRequest;
use App\Modules\User\Model\ForeignUsersModel;
use App\Modules\User\Model\MyUsersModel;
use App\Tool\Communal;
use App\Tool\ValidateCode;
use Illuminate\Http\Request;

class CommunalController extends IndexController
{

    /**
     * 获取图片验证码
     *
     * @param Request $request
     */
    public function getValidateCode(Request $request)
    {
        $validateCode = new ValidateCode;

        $request->session()->put('validate_code', $validateCode->getCode());

        return $validateCode->doimg();
    }

}