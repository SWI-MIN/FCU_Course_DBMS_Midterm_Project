<?php
    header("Content-type: text/html; charset=utf-8");//頁面編碼
    
    // error_reporting(E_ALL^E_NOTICE^E_WARNING);//隐藏报错信息
    session_start();                          //儲存登入行為
    $_SESSION['echo']="$_POST[id]";

    $dbms='mysql';     //数据库类型
    $host='localhost'; //数据库主机名
    $dbName='dbms_project';    //使用的数据库
    $user='root';      //数据库连接用户名
    $pass='';          //对应的密码
    $dsn="$dbms:host=$host;dbname=$dbName";
    

    if(isset($_POST["submit"]) && $_POST["submit"])  {
        $id = $_POST['id'];                              //取得USER輸入的id
        $password = $_POST['password'];                  //取得USER輸入的password
        if ($id == '' || $password == ''){
            echo '<script>alert("id AND password 不能為空!!");history.go(-1);</script>';
            exit(0);
        } else {
            $conn = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM students WHERE stuid = '$_POST[id]' AND pwd = '$_POST[password]'";
            $result = $conn->query($sql);
            $number = $result->fetch();//mysqli_num_rows($result);
            if ($number) {
                echo '<script>window.location="首頁&課表.php";</script>';
            } else {
                echo '<script>alert("id OR password 錯誤!!");history.go(-1);</script>';
            }
        }  
    } else {  
        echo "<script>alert('ERROR'); history.go(-1);</script>";  
    }
?>


