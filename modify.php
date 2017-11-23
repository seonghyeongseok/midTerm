<?php
/**
 * Created by PhpStorm.
 * User: skadl
 * Date: 2017-10-27
 * Time: 오후 2:18
 */

include ("db.php");

$id = $_POST['id'];

$obj = new DB();
$result = $obj->select($id);
$result = mysqli_fetch_array($result);

if($result){
    //  ID가 맞을 경우 값을 받아와 modify.html로 넘긴다.
    echo $result[1].";".$result[2].";".$result[3].";".$result[4].";".$result[5].";".$result[6].";".$result[7];
}else{
    echo "잘못된 아이디입니다";
}
