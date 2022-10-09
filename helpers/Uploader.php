<?php
namespace helpers;

include_once "configs/message.php";

use http\Params;

class Uploader
{
    public function getExtension($fileName) : string {
        try{
            $parts = explode(".",$fileName);
            return strtolower($parts[count($parts)-1]);
        }catch (\Exception $ex) {
            return "";
        }
    }

    public function uploadFile($file, $destinationPath = DIR_UPLOAD_FILE): array {
        $size = $_FILES[$file]["size"];
        $name = $_FILES[$file]["name"];
        $ext = Uploader::getExtension($name);

        $result = array("isError" =>  true, "photoName" => "", "message" => "");
        if(empty($name)) {
            $result["message"] = FILE_NOT_SELECTED;
            return $result;
        }
        if($size > MAX_FILE_SIZE_UPLOAD_IN_MB) {
            $result["message"] = TOO_LARGE_FILE;
            return $result;
        }
        if(!in_array($ext, FILE_EXTENSION_ALLOWED)) {
            $result["message"] = INVALID_FILE_FORMAT;
            return $result;
        }

        $timeStamp = time();
        $fileName = $timeStamp.substr(md5(rand(1111,9999)),0,8).".".$ext;
        $isUploaded = move_uploaded_file($_FILES[$file]["tmp_name"], DIR_UPLOAD_FILE.$fileName);
        if(!$isUploaded) {
            $result["message"] = UPLOAD_FAILED_TRY_LATER;
            return $result;
        }
        $result["isError"] = false;
        $result["photoName"] = $fileName;
        return $result;
    }

    public static function deleteFile($fileName) : bool {
        return unlink(DIR_UPLOAD_FILE.$fileName);
    }
}