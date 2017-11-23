<?php
/**
 * Created by PhpStorm.
 * User: skadl
 * Date: 2017-10-27
 * Time: 오후 12:56
 */

include("db.php");

$userid = $_POST['userid'];
$username = $_POST['username'];
$userpass = $_POST['userpassword'];
$classification = $_POST['classification'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$obj = new DB();
$obj->insert($userid, $classification, $username, $gender, $userpass, $phone, $email);
header("Location: main.html");
//  main 넘기기





