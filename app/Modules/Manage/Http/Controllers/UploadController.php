<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Http\Controllers\ManageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UploadController extends ManageController
{
    /**
     * 上传图片
     *
     * @param Request $request
     * @return mixed
     */
    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $result = \FileClass::uploadFile($file, 'sys');
            $result1 = json_decode($result, true);
            if ($result1['code'] !=200) {
                $data = [
                    'code' => 2,
                    'msg' => $result1['message'],
                ];
                return json_encode($data);
            }
            $imageUrl = $result1['data']['url'];
        }
        $data = [
            'code' => 1,
            'msg' => '',
            'data' => $imageUrl,
        ];

        Cache::put('imageUrl', $imageUrl, 10);
        return json_encode($data);
    }

    /**
     * 上传简历
     *
     * @param Request $request
     * @return string
     */
    public function uploadResume(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $result = \FileClass::uploadFile($file, 'sys');
            $result1 = json_decode($result, true);
            if ($result1['code'] != 200) {
                $data = [
                    'code' => 2,
                    'msg' => $result1['message'],
                    'data' => '',
                ];
                return json_encode($data);
            }
            $resumeUrl = $result1['data']['url'];
        }
        $data = [
            'code' => 1,
            'msg' => '',
            'data' => $resumeUrl,
        ];

        Cache::put('resumeUrl', $resumeUrl, 10);
        return json_encode($data);

    }

    /**
     * 上传头像
     *
     * @param Request $request
     * @return string、
     */
    public function uploadHead(Request $request)
    {
        $file = $request->file('resume');
        if ($file) {
            $result = \FileClass::headUpload($file, 'sys');
            $result = json_decode($result, true);

            return $result;
            $resumeUrl = $result['data']['url'];
        }
        /*$data = [
            'code' => 1,
            'msg' => '',
            'data' => $resumeUrl,
        ];

        Cache::put('resumeUrl', $resumeUrl, 10);
        return json_encode($data);*/

    }
}
