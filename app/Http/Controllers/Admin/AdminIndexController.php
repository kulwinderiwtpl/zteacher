<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class AdminIndexController extends Controller
{
    //public function __construct()
    //{
    //    parent::__construct();
     //   $this->initTheme('admin');
     //   $this->theme->setTitle('后台管理');
    //}

    public function getManage()
    {

        return view('admin.zhuo.indexzhuojiao');
    }

    
    /*public function getManage()
    {
        $now = strtotime(date('Y-m-d', time()));

        $maxDay = 10;
        $oneDay = 24 * 60 * 60;
        for ($i = 0; $i < $maxDay; $i++) {
            $timeArr[$i]['min'] = date('Y-m-d H:i:s', ($now - $oneDay * ($i + 1)));
            $timeArr[$i]['max'] = date('Y-m-d H:i:s', ($now - $oneDay * $i));
        }
        
        $timeArr = array_reverse($timeArr);
        foreach ($timeArr as $k => $v){
            $dateArr[] = date('m', strtotime($timeArr[$k]['min'])) . '月' . date('d', strtotime($timeArr[$k]['min'])) . '日';
        }

        $arr = array();

        if (!empty($arrFinance)){
            foreach ($arrFinance as $item) {
                switch ($item->action) {
                    case 3:
                        for ($i = 0; $i < $maxDay; $i++){
                            if ($item->created_at > $timeArr[$i]['min'] && $item->created_at < $timeArr[$i]['max']) {
                                $arr['in'][$i][] = $item->cash;
                            }
                        }
                    break;
                    case 4:
                        for ($i = 0; $i < $maxDay; $i++){
                            if ($item->created_at > $timeArr[$i]['min'] && $item->created_at < $timeArr[$i]['max']) {
                                $arr['out'][$i][] = $item->cash;
                            }
                        }
                    break;
                }
            }
        } else {
            for ($i = 0; $i < $maxDay; $i++){
                $arr['in'][$i] = 0;
                $arr['out'][$i] = 0;
            }
        }
        if (!empty($arr)){
            if (!empty($arr['successTask'])){
                for ($i = 0; $i < $maxDay; $i++){
                    if (isset($arr['successTask'][$i]) && is_array($arr['successTask'][$i])){
                        $arr['successTask'][$i] = array_sum($arr['successTask'][$i]);
                    } else {
                        $arr['successTask'][$i] = 0;
                    }
                }
            } else {
                for ($i = 0; $i < $maxDay; $i++){
                    $arr['successTask'][$i] = 0;
                }
            }
            if (!empty($arr['failTask'])){
                for ($i = 0; $i < $maxDay; $i++){
                    if (isset($arr['failTask'][$i]) && is_array($arr['failTask'][$i])){
                        $arr['failTask'][$i] = array_sum($arr['failTask'][$i]);
                    } else {
                        $arr['failTask'][$i] = 0;
                    }
                }
            } else {
                for ($i = 0; $i < $maxDay; $i++){
                    $arr['failTask'][$i] = 0;
                }
            }
            if (!empty($arr['user'])){
                for ($i = 0; $i < $maxDay; $i++){
                    if (isset($arr['user'][$i]) && is_array($arr['user'][$i])){
                        $arr['user'][$i] = array_sum($arr['user'][$i]);
                    } else {
                        $arr['user'][$i] = 0;
                    }
                }
            } else {
                for ($i = 0; $i < $maxDay; $i++){
                    $arr['user'][$i] = 0;
                }
            }
            if (!empty($arr['in'])){
                for ($i = 0; $i < $maxDay; $i++){
                    if (isset($arr['in'][$i]) && is_array($arr['in'][$i])){
                        $arr['in'][$i] = array_sum($arr['in'][$i]);
                    } else {
                        $arr['in'][$i] = 0;
                    }
                }
            } else {
                for ($i = 0; $i < $maxDay; $i++){
                    $arr['in'][$i] = 0;
                }
            }
            if (!empty($arr['out'])){
                for ($i = 0; $i < $maxDay; $i++){
                    if (isset($arr['out'][$i]) && is_array($arr['out'][$i])){
                        $arr['out'][$i] = array_sum($arr['out'][$i]);
                    } else {
                        $arr['out'][$i] = 0;
                    }
                }
            } else {
                for ($i = 0; $i < $maxDay; $i++){
                    $arr['out'][$i] = 0;
                }
            }
        } else {
            for ($i = 0; $i < $maxDay; $i++){
                $arr['successTask'][$i] = 0;
                $arr['failTask'][$i] = 0;
                $arr['user'][$i] = 0;
                $arr['in'][$i] = 0;
                $arr['out'][$i] = 0;
            }
        }

        $broken = [
            'task' => [
                'successTask' => $arr['successTask'],
                'failTask' => $arr['failTask']
            ],
            'user' => $arr['user'],
            'finance' => [
                'in' => $arr['in'],
                'out' => $arr['out']
            ]
        ];
        $data = [
            'maxDay' => json_encode($maxDay),
            'broken' => json_encode($broken),
            'dateArr' => json_encode($dateArr)
        ];
        return $this->theme->scope('manage.index', $data)->render();
    }*/



}
