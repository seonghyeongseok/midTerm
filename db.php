<?php
/**
 * Created by PhpStorm.
 * User: skadl
 * Date: 2017-10-27
 * Time: 오후 12:07
 */

class DB
{
    private $db_con;
    private $query;
    private $result;

    function __construct()
    {
        $this->db_con = mysqli_connect("localhost:3307", "root", "akfxkrdl3425", "midtermexam");

        echo mysqli_connect_error();
        //  DB연결
    }

    function pageSelect($startList){
        $this->query = "select * from userinfo order by sysid desc limit $startList, 5 ";

        return mysqli_query($this->db_con, $this->query);
    }

    function select($id, $password)
    {

        $arg = func_num_args();

        switch ($arg) {
            case 0:
                $this->query = "select * from userinfo";
                break;
            case 1:
                $this->query = "select * from userinfo where userid = '$id'";
                break;

            case 2:
                $this->query = "select * from userinfo where userid = '$id' and
                                password='$password'";
                break;
        }

        return mysqli_query($this->db_con, $this->query);
    }

    function update($id, $class, $name, $gender, $password, $phone, $email, $bName)
    {
        $this->query = "update userinfo set userid='$id', classification='$class',
                        name='$name', gender='$gender', password='$password', 
                        phone='$phone',email='$email' where userid='$bName'";
        mysqli_query($this->db_con, $this->query);
    }

    function insert($id, $class, $name, $gender, $password, $phone, $email)
    {
        //  쿼리 보내ㅣㄱ.
        $this->query = "insert into userinfo (userid, classification, name, 
                        gender, password, phone, email) values ('$id', '$class', 
                        '$name', '$gender', '$password', '$phone', '$email')";
        mysqli_query($this->db_con, $this->query);
    }

    function delete($id, $password)
    {
        $this->query = "delete from userinfo where userid='$id' and
                       password='$password'";
        mysqli_query($this->db_con, $this->query);
    }

    function __destruct()
    {
        mysqli_close($this->db_con);
    }
}