<?php
/**
 * Created by PhpStorm.
 * User: skadl
 * Date: 2017-10-27
 * Time: 오후 2:18
 */
include("db.php");

$userid = $_POST['userid'];
$username = $_POST['username'];
$userpass = $_POST['userpassword'];
$classification = $_POST['classification'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$beforename = $_POST['beforename'];

if ($userid == null || $username == null || $userpass == null || $phone == null || $email == null) {
    echo "<script>alert('아래 항목은 입력 필수입니다!');</script>";

    header("Location: modify.html");

}else{

    echo "<script>alert('수정완료');</script>";

    $obj = new DB();
    $obj->update($userid, $classification, $username, $gender, $userpass, $phone, $email, $beforename);

    header("Location: main.html");
    //echo "<script>"
}