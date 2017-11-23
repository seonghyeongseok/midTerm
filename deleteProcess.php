<?php
/**
 * Created by PhpStorm.
 * User: skadl
 * Date: 2017-11-02
 * Time: 오전 12:56
 */

include("db.php");

$userid = $_POST['userid'];
$userpass = $_POST['userpassword'];

$obj = new DB();
$result = $obj->select($userid);
$result = mysqli_fetch_array($result);

if($result){
    //  ID가 있을 경우
    $result = $obj->select($userid, $userpass);
    $result = mysqli_fetch_array($result);

    if($result){
        //  ID, PASSWORD 둘 다 맞을 경우
        $obj->delete($userid, $userpass);
        header("Location: main.html");
    }else{
        echo "<script>alert('비번 틀렸어여'); history.back();</script>";
    }

}else{
    echo "<script>alert('아이디 틀렸어여'); history.back();</script>";
}