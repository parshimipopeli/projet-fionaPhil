<?php
require_once'../include/connectBdd.php';
require_once'../include/header.php';
// if (isset($_POST['submit']) {
$warning='';
    
// }
?>
<form method="post" action="../treatment/login.php">
<div class="simple-login-container">
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" placeholder="entrer votre email">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="password" placeholder="Entrer votre mot de passe" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="submit" class="btn btn-block btn-login" placeholder="Enter your Password" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="https://codeblush.com/category/wordpress">Download Best Wordpress Theme</a>
        </div>
    </div>
    <?= $warning ?>
</div>
</form>