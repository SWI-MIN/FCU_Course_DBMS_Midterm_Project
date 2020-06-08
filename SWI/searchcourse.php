<?php
    header("Content-type: text/html; charset=utf-8");//頁面編碼
    session_start();                          //儲存登入行為

    $dbms='mysql';     //数据库类型
    $host='localhost'; //数据库主机名
    $dbName='dbms_project';    //使用的数据库
    $user='root';      //数据库连接用户名
    $pass='';          //对应的密码
    $dsn="$dbms:host=$host;dbname=$dbName";
    $conn = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["b_teachername"])) {
        $teachername = $_POST['teachername'];   

        if ($teachername == '') {
            echo '<script>alert("老師名字不能為空!!");history.go(-1);</script>';
        } else {
            $sql = "SELECT courseid, teachername,  coursename, needed, coursefloor FROM courseinfo NATURAL JOIN departcourse 
                WHERE teachername='$teachername';";
            $result = $conn->query($sql);
            $number = $result->fetch(); //mysqli_num_rows($result);
            if(empty($number)){
                echo '<script>alert("沒有這門課喔!!");history.go(-1);</script>';
            } else {
                // 這裡要印出資料喔!!!
                echo '<script>alert("888888888");history.go(-1);</script>';
            }
        }  
    } else if (isset($_POST["b_courseid"])) {
        $courseid = $_POST['courseid'];     
        
        if ($courseid == ''){
            echo '<script>alert("課程代號不能為空!!");history.go(-1);</script>';
        } else {
            $sql = "SELECT courseid, teachername,  coursename, needed, coursefloor FROM courseinfo NATURAL JOIN departcourse 
                WHERE courseid='$courseid';";
            $result = $conn->query($sql);
            $number = $result->fetch(); //mysqli_num_rows($result);
            if(empty($number)){
                echo '<script>alert("沒有這門課喔!!");history.go(-1);</script>';
            } else {
                // 這裡要印出資料喔!!!
                echo '<script>alert("1221323213213");history.go(-1);</script>';
            }
        }  
    } else if (isset($_POST["b_coursename"])) { 
        $coursename = $_POST['coursename'];     
        
        if ($coursename == ''){
            echo '<script>alert("課程名稱不能為空!!");history.go(-1);</script>';
        } else {
            $sql = "SELECT courseid, teachername,  coursename, needed, coursefloor FROM courseinfo NATURAL JOIN departcourse 
                WHERE coursename='$coursename';";
            $result = $conn->query($sql);
            $number = $result->fetch(); //mysqli_num_rows($result);
            if(empty($number)){
                echo '<script>alert("沒有這門課喔!!");history.go(-1);</script>';
            } else {
                // 這裡要印出資料喔!!!
                echo '<script>alert("15649999999999"");history.go(-1);</script>';
            }
        }  
    } else {  
        echo "<script>alert('ERROR'); history.go(-1);</script>";  
    }
?>


