<?php
    session_start(); //啟動session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header >
        <nav>
            <div class="form-group nav justify-content-end">
                <?php
                    if (isset($_SESSION['userId'])){
                        echo '<form action="includes/logout.inc.php" method="post">
                                <button  class="btn btn-dark" type="submit" name="logout">Logout</a>
                            </form>';
                    }else{
                        echo ' <form action="includes/login.inc.php" method="post">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <input type="text" name="mailuid" placeholder="Username/E-mail..">
                                        </div>
                                        <div class="col-auto">
                                            <input type="password" name="pwd" placeholder="Password"> 
                                        </div>
                                        <div class="col-auto">
                                            <button  class="btn btn-dark" type="submit" name="login">Login</button>
                                        </div>
                                    </div>   
                                </form>
                            <a  href="signup.php" class="btn btn-light" type="submit">Signup</a>';
                    }
                ?>  
            </div>
        </nav>
    </header>
</body>
</html>