<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <td>아이디</td>
        <td>구분</td>
        <td>이름</td>
        <td>성별</td>
        <td>비밀번호</td>
        <td>폰번호</td>
        <td>이메일</td>
    </tr>
<?php
/**
 * Created by PhpStorm.
 * User: skadl
 * Date: 2017-11-02
 * Time: 오후 7:10
 */

include ('db.php');

session_start();

$_SESSION['page'] = 1;  // 기본 1로 설정
//  페이지를 클릭해서 오는 경우 클릭한 페이지 값으로 설정
$_SESSION['page'] = isset($_POST['page']) ? $_POST['page'] : $_SESSION['page'];

$obj = new DB();

$result = $obj->select();

$table_low = mysqli_num_rows($result);      //  총 회원 수
$lastPage = (int)(($table_low + 4) / 5);    //  마지막 페이지
$startList = ($_SESSION['page'] - 1) * 5;   //  페이지 첫 출력 회원 순번

$result = $obj->pageSelect($startList);

while(!is_null($test = $result->fetch_array(MYSQLI_NUM))){
    echo "<tr>";
    echo "<td>".$test[1]."</td>";
    echo "<td>".$test[2]."</td>";
    echo "<td>".$test[3]."</td>";
    echo "<td>".$test[4]."</td>";
    echo "<td>".$test[5]."</td>";
    echo "<td>".$test[6]."</td>";
    echo "<td>".$test[7]."</td>";
    echo "</tr>";
}

//  페이지 네이션 구현
?>

</table>
<form action="listProcess.php" method='post'>
    <?php
    //  페이지 버튼
    for ($i = $_SESSION['page'] - 2; $i < $_SESSION['page'] + 3; $i++) {
        //  해당 페이지에서 +2, -2 까지만
        if ($i > 0) {
            //  1페이지 까지만
            if ($i <= $lastPage) {
                //  마지막 페이지 까지만
                if ($i == $_SESSION['page']) {
                    //  현재 페이지에 색깔 주기
                    echo "<input type='submit' style='color:red' value=$i>";
                } else {
                    echo "<input type='submit' name='page' value=$i>";
                }
            }
        }
    }
    ?>
</form>
<form action="main.html" method="post">
    <input type="submit" value="메인으로">
</form>
</body>
</html>