<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    $phpHeader = false;
    $arAuth = array('logedIn'=>false, 'data'=>[]);
    $arPageDisign = ['header'=>false,'leftManu'=>false,'rightManu'=>false,'footer'=>false];
    if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']) {
        $arPageDisign = ['header'=>true,'leftManu'=>true,'rightManu'=>true,'footer'=>false];
        $arAuth['logedIn'] = true;
        $arAuth['data'] = $_SESSION['logObj'];
    }
    include_once( __DIR__.'/web/app/app.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="web/assets/images/favicon.ico">
        <link rel="stylesheet" href="web/app/app.css">
        <link rel="stylesheet" href="web/assets/plugins/morris/morris.css">
        <link href="web/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="web/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="web/assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="fixed-left fixed-left-void">
        
        <script src="web/assets/js/jquery.min.js"></script>
        <?php if($arPageDisign['leftManu']) echo '<div id="wrapper" class="wrapper forced enlarged">'; ?>
            <span id="getPageState" style="display:none"><?php echo $goPage ?></span>

            <?php if($arPageDisign['header']) include_once('web/app/header.php');?>
            <?php if($arPageDisign['leftManu']) include_once('web/app/leftManu.php');?>
                <!-- Pages content -->
                <?php
                    if(file_exists($pageViewContent)) {
                        include_once($pageViewContent);
                    } else {
                        echo ('<div class="show-error-message"><h3>ERROR: Failed to open stream: No such file or directory. <b>Please check directory into wed.php</b></h3>Your file directory is <b>'.$pageViewContent.'</b></div>');
                    }
                ?>
                
            <?php if($arPageDisign['footer']) include_once('web/app/footer.php');?>
        <?php if($arPageDisign['leftManu']) echo '</div>'; ?>
        
        <script src="web/assets/js/bootstrap.min.js"></script>
        <script src="web/assets/js/modernizr.min.js"></script>
        <script src="web/assets/js/detect.js"></script>
        <script src="web/assets/js/fastclick.js"></script>
        <script src="web/assets/js/jquery.slimscroll.js"></script>
        <script src="web/assets/js/jquery.blockUI.js"></script>
        <script src="web/assets/js/waves.js"></script>
        <script src="web/assets/js/wow.min.js"></script>
        <script src="web/assets/js/jquery.nicescroll.js"></script>
        <script src="web/assets/js/jquery.scrollTo.min.js"></script>
        <script src="web/assets/plugins/morris/morris.min.js"></script>
        <script src="web/assets/plugins/raphael/raphael-min.js"></script>
    
        <?php if(isset($arWebSettings[$goPage]) && isset($arWebSettings[$goPage]['js']) && !empty($arWebSettings[$goPage]['js'])) {?> <script src=<?php echo $arWebSettings[$goPage]['js'];?>></script> <?php }?>
        <script src="web/assets/js/app.js"></script>
    </body>
</html>