<?php

namespace App\Utils;

class CommonHelper
{

    public static function fileUpload($file, $dir): string
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $destinationPath = $dir;

        $host_name = $_SERVER['HTTP_HOST'];
        $extension = $file->getClientOriginalExtension();
        $filename = $host_name. '-' . time() . '-' . rand(11111,99999) . "." . $extension;
        $file->move($destinationPath, $filename);

        return '/' . $destinationPath.'/'.$filename;
    }

}
