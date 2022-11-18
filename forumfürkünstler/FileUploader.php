<?php

class FileUploader
{
    private string $errorMessage;

    public function __construct()
    {
        $this->errorMessage = "";
    }

    public function getErrorMessage(){
        return $this->errorMessage;
    }

    public function uploadFileAs($target_file)
    {
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $this->errorMessage = "Your file was too large to upload!";
            return;
        }


        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
           $this->errorMessage = "You can only upload .jpg, .png, .jpeg or .gif - files!";
           return;
        }


        if ( !move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $this->errorMessage = "Sorry, there was an error uploading your file.";
        }
    }

    public function uploadImageForUser($user)
    {
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
        $target_file = "assets/img/users/" . $user->email . "." . $imageFileType;
        $this->uploadFileAs($target_file);
    }

    public function uploadImageForAdd($add)
    {
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
        $target_file = "assets/img/adds/" . $add->id . "." . $imageFileType;
        $this->uploadFileAs($target_file);
    }

    public function getImageForAdd($add){
        $fwe = "assets/img/adds/" . $add->id;
        if( file_exists($fwe . ".png")){
            return $fwe . ".png";
        }
        else if( file_exists($fwe . ".gif")){
            return $fwe . ".gif";
        }
        else if( file_exists($fwe . ".jpg")){
            return $fwe . ".jpg";
        }
        else if( file_exists($fwe . ".jpeg")){
            return $fwe . ".jpeg";
        }
        else {
            return "assets/img/logo.png";
        }

    }
}
