<?php

if(isset($_POST['login'])){

    require 'dbh.inc.php';  //載入連結的褲料庫
    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    if(empty($mailuid) || empty($pwd)){

        header("Location: ../index.php?error = emptyfrields");
        exit();
    }
    else{
        //查詢使用者帳戶
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?; ";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ss" , $mailuid,$pwd);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($pwd,$row['pwdUsers']); //驗證是否有此密碼
                if($pwdCheck === false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }else if($pwdCheck === true){ 
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header("Location: ../index.php?login=success");
                    exit();

                }else{
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            }else{
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    

}else{
    header("Location: ../index.php");
    exit();
}

?>