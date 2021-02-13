<?php
class Util
{

    //Method of input value sanitizaion
    public function testInput($data)
    {
        $data = trim($data); #清除前後空白
        $data = stripslashes($data); #清除反斜線
        $data = htmlspecialchars($data);
        $data = strip_tags($data);

        return $data;
    }

    //Method for displaying Success and Error Message
    public function showMessage($type, $message)
    {
        return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                <strong>' . $message . '</strong>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}
