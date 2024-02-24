<?php
$dbname='mysql:host=localhost;dbname=selena-gomez';
$user="root";
$password='';
$con = new PDO ($dbname, $user, $password);
if($con){
    echo "connected";
}
function uniq_poet(){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength=strlen($chars);
    $randomString="";
    for ($i=0; $i < 20; $i++) { 
        $randomString.=$chars[mt_rand(0,$charLength-1)];
    }
    return $randomString;
}

?>