<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/6 0006
 * Time: 下午 15:35
 */

namespace App\Modules\User\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cache;

class UploadController extends Controller
{

    /**
     * 上传头像
     *
     * @param Request $request
     * @return mixed
     */
    public function uploadHeaderImg(Request $request)
    {
        $file = $request->file('image');

        if ($file) {
            $result = \FileClass::uploadFile($file, 'sys');
            $result1 = json_decode($result, true);
            $imageUrl = $result1['data']['url'];
        }
        $data = [
            'code' => 100,
            'msg' => '',
            'data' => [
                'path' => $imageUrl,
            ],
        ];

        return json_encode($data);
    }

    /**
     * 上传简历
     *
     * @param Request $request
     * @return string
     */
    public function uploadFile(Request $request)
    {
        $file = $request->file('file');

        if ($file) {
            $result = \FileClass::uploadFile($file, 'sys');
            $result1 = json_decode($result, true);
            if ($result1['code'] != 200) {
                $data = [
                    'code' => 103,
                    'msg' => '',
                    'data' => '',
                ];
                return json_encode($data);
            }
            $resumeUrl = $result1['data']['url'];
        }
        $data = [
            'code' => 100,
            'msg' => '',
            'data' => $resumeUrl,
        ];

        Cache::put('resumeUrl', $resumeUrl, 10);
        return json_encode($data);

    }
}