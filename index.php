<?php
require_once "header.php"
?>

<link rel="stylesheet" href="style.css">

    <?php
        if(isset($_SESSION['message'])):
    ?>

<main>

    <div class="alert alert-<?php echo $_SESSION['msg_type']?>" >

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>

    <?php endif ?>
    <div class="jumbotron">
        <section>
            <?php
                if (isset($_SESSION['userId'])){
                    echo '
                    <div class="table text-center col-md-8 container">
                        <table class="table table-light">
                            <thead>
                                <th class="bg-dark text-white text-center" colspan="4"><h5>個人資料</h5></th>
                            </thead>
                                <tbody>  
                                        <tr ><th >姓名:</th><th colspan="2">朱國華<th></tr>
                                        <tr ><th >生日:</th><th colspan="2">85/4/30</th></tr>
                                        <tr ><th >學歷:</th><th colspan="2">崑山科技大學電腦與通訊系</th></tr>
                                        <tr ><th >E-mail:</th><th colspan="2">enjoy12589@gmail.com</th><tr>
                                        <tr ><th >電話:</th><th colspan="2">0989659076</th><tr>
                                        <tr ><th >地址:</th><th colspan="2">台南市關廟區新埔里北新街355號</th><tr>
                                <tbody>
                            <thead> 
                                <th class="bg-dark text-white text-center " colspan="6"><h5>擅長工具</h5></th>
                            </thead>
                                <tbody>
                                
                                    <tr>
                                        <th>前端:</th>
                                        <th>HTML</th>
                                        <th>CSS</th></tr>
                                        <tr>
                                        <th></th>
                                        <th>jQuery</th>
                                        <th>JavaScript</th>
                                    </tr>
                                    <tr>
                                        <th>後端:</th>
                                        <th>PHP</th>
                                        <th>MySQL</th>
                                    </tr>
                                </tbody>
                            <thead>
                                <th class="bg-dark text-white text-center " colspan="6"><h5>設計工具</h5></th>
                            </thead>
                                <tbody>
                                    <tr>
                                        <th >美編:</th>
                                        <th >Photoshop</th>
                                        <th >Illustrator</th>
                                    </tr>
                                </tbody>
                    </div>
                    </table>
                </div>';
                }else{
                    echo '<p class="text-center">登出!</p>';
                }
            ?>
                       
        </section>
        
        
    </div>
</main>