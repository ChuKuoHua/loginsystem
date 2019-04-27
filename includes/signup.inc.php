<?php

session_start();

if(isset($_POST['signup'])){
    require 'dbh.inc.php'; //連接伺服器

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    //判斷有無填寫資料
    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        
        $_SESSION['message'] = "Sign up error!";
        $_SESSION['msg_type'] = "danger";
        header("Location: ../signup.php?error=emptyfields&uid=".$username."$mail=".$email);
        exit();

        //判斷輸入的email 帳號是否有符合條件
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL) 
    && !preg_match("/^[a-zA-Z0-9]*$/",$username)){ //過濾email與帳號變數。
        
        $_SESSION['message'] = "Sign up error!";
        $_SESSION['msg_type'] = "danger";
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
        //判斷輸入的email是否有符合條件
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['message'] = "E-mail error!";
        $_SESSION['msg_type'] = "danger";
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();

         //判斷輸入的帳號是否有符合條件
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){ //進行正則表示式比對資料
        $_SESSION['message'] = "Username error!";
        $_SESSION['msg_type'] = "danger";
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();

        //判斷密碼是否有一致
    }else if($pwd !== $pwdRepeat){
        $_SESSION['message'] = "Inconsistent password!";
        $_SESSION['msg_type'] = "danger";
        header("Location: ../signup.php?error=pwdcheckuid=".$username."$mail=".$email);
        exit();

        //查詢有無此帳戶
    }else{
        $sql ="SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s" ,$username); //繫結了SQL的引數 ， s字元告訴資料庫該引數為字串
            mysqli_stmt_execute($stmt); //執行準備好的Query
            mysqli_stmt_store_result($stmt); //從準備好的語句傳輸結果
            $resultCheck = mysqli_stmt_num_rows($stmt); //返回結果

            //帳戶是否有重複
            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                $_SESSION['message'] = "This user has already used!";
                $_SESSION['msg_type'] = "danger";
                exit();

                //新增帳戶
            }else{
            $sql ="INSERT INTO users(uidUsers, emailUsers ,pwdUsers) VALUES(?,?,?)";
            $stmt = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    $_SESSION['message'] = "sql Connection error!";
                    $_SESSION['msg_type'] = "danger";
                    exit();
                }else{
                    $hashpwd = password_hash($pwd, PASSWORD_DEFAULT); //對密碼加密
                    
                    mysqli_stmt_bind_param($stmt, "sss", $username ,$email ,$hashpwd);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['message'] = "signup success!";
                    $_SESSION['msg_type'] = "success";
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt); //關閉連接Prepared Statements
    mysqli_close($con); //關閉連接資料庫
}
else{
    header("Location: ../signup.php");
    exit();
}

?>