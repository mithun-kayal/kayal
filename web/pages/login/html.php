<?php
use server\DB as DB;

$error_message = '';
  if(isset($_POST['logIn']) && $_POST['logIn']) {
    $config = new DB();
    $userLogObj = $config->table('users')
        //->select('id','firstName', 'lastName','CONCAT_WS(" ", "firstName", "lastName") as userFullName', 'email')
        ->where('email',$_POST['email'])
        ->where('password',$_POST['password'])
        ->first();
    if(!empty($userLogObj)) {
      $_SESSION['isLogin'] = true;
      $_SESSION['logObj'] = $userLogObj;
      
      header('Location: ./?home');
    } else {
      $error_message = 'Your user name or password not match.!!';
    }   
  }
?>

<div class="accountbg"></div>
<div class="wrapper-page">
<div class="panel panel-color panel-primary panel-pages">
    <div class="panel-body box-shado-syn-10">
        <h3 class="text-center m-t-0 m-b-15"> 
            <a href="#" class="logo">
                <img src="web/assets/images/logo_white.png">
            </a>
        </h3>
        <h4 class="text-muted text-center m-t-0">
            <?php if(!empty($error_message)){?><p class="login-box-msg"><span><?php echo $error_message ?></span></p> <?php } else {echo "<p style='text-align:center'><b>Sign In</b></p>";}?>
            
        </h4>
        <form class="form-horizontal m-t-20" action="?login" method="post">
            <div class="form-group">
                <div class="col-xs-12"> 
                    <input class="form-control" type="email" required placeholder="email" name="email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12"> 
                    <input class="form-control" type="password" required  placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="checkbox checkbox-primary"> 
                        <input id="checkbox-signup" type="checkbox" checked name="rememberMe"> 
                        <label for="checkbox-signup"> Remember me </label>
                    </div>
                </div>
            </div>
            <div class="form-group text-center m-t-40">
                <div class="col-xs-12"> 
                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit" name="logIn" value=1>Log In</button>
                </div>
            </div>
            <div class="form-group m-t-30 m-b-0">
                <div class="col-sm-7"> 
                    <a href="?pages-recover-paw" class="text-muted">
                        <i class="fa fa-lock m-r-5"></i> 
                        Forgot your password?
                    </a>
                </div>
                <div class="col-sm-5 text-right"> 
                    <a href="?register" class="text-muted">Create an account</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div> 