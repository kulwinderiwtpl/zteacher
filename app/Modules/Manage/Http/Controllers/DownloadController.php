<?php

namespace App\Modules\Manage\Http\Controllers;

use App\Model\ResumeModel;
use Illuminate\Routing\Controller;

class DownloadController extends Controller
{
    private $fileName;
    private $fileSize;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        if (!file_exists($this->fileName)) {
            die("文件不存在");

        }
        $this->fileSize = filesize($this->fileName);
    }

    public function fileDownload($resume_id)
    {
        $resume = ResumeModel::select('resume', 'frist_name')->find($resume_id)->toArray();

        $fileName = 'http://' . request()->getHost() . '/' . $resume['resume'];
        $fileSize = filesize($fileName);


        $fp = fopen($fileName, 'r');

        //下载文件需要的头
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Accept-Length:$fileSize");
        header("Content-Disposition:attachment;filename=" . $fileName);

        $fileCount = 0;
        $fileUnit = 1024;
        while (!feof($fp) && $fileSize - $fileCount > 0) {
            $fileContent = fread($fp, $fileUnit);
            echo $fileContent;
            $fileCount += $fileUnit;

        }

        fclose($fp);
    }

    public function downloadResume($resume_id)
    {

//        var_dump($resume);
    }

}
