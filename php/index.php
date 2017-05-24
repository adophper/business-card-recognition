<?php
/**
 * Created by PhpStorm.
 * User: adophper <hello@adophper.com>
 * Date: 2017/5/24
 * Time: 11:38
 */
header("Content-type: text/html; charset=utf-8");

$filename = "3";

$argv = array(
    'original_image' => 'D:/card/'.$filename.'.jpg',
    'gray_image' => 'D:/card/'.$filename.'_gray.jpg',
    'exe_filepath' => 'D:/test.exe',
    'tesseract_filepath' => 'D:/tesseract/tesseract.exe',
    'output_filepath' => 'D:/card/'.$filename.'_output',
);
$output = str_replace("/", "\\\\", $argv['output_filepath']).'.txt';
if (file_exists($output)){
    //exit('has been created.');
    //
}else {
    $cmd = "$argv[exe_filepath] $argv[original_image] $argv[gray_image] $argv[tesseract_filepath] $argv[output_filepath]";
    $cmd = str_replace("/", "\\\\", $cmd);
    $data = shell_exec($cmd);
    $data = str_replace(array("\r", "\n"), '', $data);
    if (empty($data)) {
        exit('process error.');
    } else if ($data != 'ok') {
        exit($data);
    }
}
$result = file_get_contents($output);
$result = str_replace(array("\n\n", "\t", ' '), array("\n", "", ''), $result);
$info = array();
preg_match("/1[0-9]{10}/", $result, $mobile);
$info['mobile'] = $mobile[0];
//print_r($info);
var_dump($result);
