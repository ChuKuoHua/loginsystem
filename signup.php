<?php
require_once "header.php"
?>

<link rel="stylesheet" href="style.css">

   
<main>

   
    <div class="text-center container col-md-4">
        <section id="siupbk">
            <h1 class="ft font-weight-bolder">Sign up</h1>
            <?php
                if(isset($_SESSION['message'])):
            ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']?>" >

            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>

            <?php endif ?>
            <form  class="form-group nav justify-content-center" action="includes/signup.inc.php" method="post">
                <div class="form-group col-md-12">
                <input class="form-control" type="text" name="uid" placeholder="Username">
                </div>
                <div class="form-group col-md-12">
                <input class="form-control" type="text" name="mail" placeholder="E-mail">
                </div>
                <div class="form-group col-md-12">
                <input class="form-control" type="password" name="pwd" placeholder="Password">
                </div>
                <div class="form-group col-md-12">
                <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password">
                </div>
                <div class="form-group">
                <button class="btn btn-info" type="submit" name="signup">Signup</button>
                </div>
            </form>
        </section>
    </div>
</main>