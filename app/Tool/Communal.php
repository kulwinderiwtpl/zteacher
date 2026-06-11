<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/7 0007
 * Time: 下午 14:07
 */

namespace App\Tool;

use Cache;
use Mail;


class Communal
{
    /**
     * 密码加密
     *
     * @param $password
     * @return string
     */
    public static function encrypt($password)
    {
        $options = [
            'cost' => 11,
        ];

        $password = password_hash(md5($password), PASSWORD_BCRYPT, $options);
        $aes = new Aes();
        return $aes->encrypt($password);
    }

    /**
     * 发送邮件
     *
     * @param $Templates  邮件模板   .blade.php
     * @param $mail       邮件内容
     * @return mixed
     */
    public static function sendEmail($Templates, $mail)
    {
        $str = Mail::send($Templates, ['mail' => $mail], function ($message) use ($mail) {
            // $m->from('hello@app.com', 'Your Application');
            $message->to($mail['to'], '尊敬的用户')->subject($mail['subject']);
        });

        return $str;
    }

    public static function sendEmailEN($Templates, $mail)
    {
        $str = Mail::send($Templates, ['mail' => $mail], function ($message) use ($mail) {
            // $m->from('hello@app.com', 'Your Application');
            $message->to($mail['to'], 'Dear User')->subject($mail['subject']);
        });

        return $str;
    }

    /**
     * 获取ip地址
     *
     * @return array|false|string
     */
    public static function getip()
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR_POUND'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR_POUND'];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["REMOTE_ADDR"])) {
            $ip = $_SERVER["REMOTE_ADDR"];
        } elseif (!empty(getenv("HTTP_X_FORWARDED_FOR"))) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } elseif (!empty(getenv("HTTP_CLIENT_IP"))) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif (!empty(getenv("REMOTE_ADDR"))) {
            $ip = getenv("REMOTE_ADDR");
        } else {
            $ip = "Unknown";
        }
        return $ip;
    }

    /**
     * 判断是否为国内ip
     *
     * @param $ip
     * @return bool
     */
    public static function getIPcountry($ip)
    {
        if (!Cache::has($ip)) {
            $api = new APIHelper('http://ip.taobao.com/');
            try{
                $result = $api->get('service/getIpInfo.php', ['ip' => $ip]);
            }catch (\Exception $e) {
                return false;
            }
            $country_id = $result['data']['country_id'];
            Cache::put($ip, $country_id, 60);
        }
        if (!in_array(Cache::get($ip), ['CN', 'HK', 'TW'])) {
            return false;
        }
        return true;
    }

    /*public static function getIPcountry($ip)
    {
        $api = new APIHelper('http://ip.taobao.com/');
        $result = $api->get('service/getIpInfo.php', ['ip' => $ip]);
        $country_id = $result['data']['country_id'];
        if (!in_array($country_id, ['CN', 'HK', 'TW'])) {
            return false;
        }
        return true;
    }*/


}