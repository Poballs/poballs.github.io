<?php

    //页面跳转
    function jump($url,$time=0){

        if ($url){

            echo '<script>';
            echo 'setTimeout(function(){location.href="'.$url.'"},'.$time.')';
            echo '</script>';

        }

    }

    //文件上传
    function upload($f){

        if ($f['name']){

            //临时文件
            $tmpFile = $f['tmp_name'];

            //创建路径
            $dirName = 'upload';
            if (!is_dir($dirName)){
                @mkdir($dirName);
            }

            //新命名文件名
            $dt = time().substr($f['name'],0,5);

            //获取文件的扩展名
            $pathInfo = explode('.',$f['name']);
            $extension = $pathInfo[count($pathInfo)-1];

            //完整的服务器上的文件路径
            $dstFile = $dirName.'/'.$dt.'.'.$extension;

            if (move_uploaded_file($tmpFile,$dstFile)){
                return $dstFile;
            } else {
                return false;
            }

        }


    }



?>