<?php
require_once('server/server.php');
define("Host", $_SERVER['HTTP_HOST']);
define("PROJET_NAME", "kayal");
define("PROJET_URL", "/kayal/");
define("REQUEST_URI", $_SERVER['REQUEST_URI']);
$PAGE_DATA = [];

$pageViewContent = 'web/pages/404/index.php';
$goPage = 'default';
$title = 'Admin';
$arWebSettings = include_once('web.php');
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $goPage = str_replace("/",'',$_GET['page']);
} else {
    $getUrl = explode(strtolower(PROJET_NAME), strtolower(REQUEST_URI));
    if(isset($getUrl[1])){
        $getDirName_Array = explode("/", $getUrl[1]);
        if(isset($getDirName_Array[1]) && empty($getDirName_Array[0])){
            $first = explode("&", $getDirName_Array[1]);
            $getDirName = $first[0];
        } else if(isset($getDirName_Array[0]) && !empty($getDirName_Array[0])){
            $getDirName = $getDirName_Array[0];
        }
        if(!empty($getDirName)){
            $setDir = str_replace("?",'',$getDirName);
            $goPage = $setDir;
        }
    }
}
// echo "===>".$goPage;
$goPage = str_replace("index.php", '', $goPage);
if(empty($goPage)) $goPage = 'default';
if($arAuth['logedIn']) { 
    if($goPage == 'login' || $goPage == 'pages-recover-paw' || $goPage == 'register') {
        ?>
        <script>
            document.location.search= "?home";
        </script>
    <?php
    }
} else {
    if($goPage == 'default') {
        ?>
    <script>
        document.location.search= "?login";
    </script>
    <?php
    }
}
if(!isset($arWebSettings[$goPage])) $goPage = "404"; //Set page not found page

if(isset($arWebSettings[$goPage])) {
    $pageViewContent = $arWebSettings[$goPage]['filePath'];
    $title = isset($arWebSettings[$goPage]['title'])?$arWebSettings[$goPage]['title']:'Admin';
    $PAGE_DATA = isset($arWebSettings[$goPage]['data'])?$arWebSettings[$goPage]['data']:[];
    if(isset($arWebSettings[$goPage]['arPageDisign']) && isset($arWebSettings[$goPage]['arPageDisign']['header'])) $arPageDisign['header'] = $arWebSettings[$goPage]['arPageDisign']['header'];
    if(isset($arWebSettings[$goPage]['arPageDisign']) && isset($arWebSettings[$goPage]['arPageDisign']['leftManu'])) $arPageDisign['leftManu'] = $arWebSettings[$goPage]['arPageDisign']['leftManu'];
    if(isset($arWebSettings[$goPage]['arPageDisign']) && isset($arWebSettings[$goPage]['arPageDisign']['rightManu'])) $arPageDisign['rightManu'] = $arWebSettings[$goPage]['arPageDisign']['rightManu'];
    if(isset($arWebSettings[$goPage]['arPageDisign']) && isset($arWebSettings[$goPage]['arPageDisign']['footer'])) $arPageDisign['footer'] = $arWebSettings[$goPage]['arPageDisign']['footer'];
}

if(isset($_GET['title'])) $title = $_GET['title'];
if(isset($_GET['prPagedata'])) $PAGE_DATA = $_GET['prPagedata'];

define("PAGE_DATA", $PAGE_DATA);

function jquery_write_text($element, $value='', $classString='') {
    return '<script>
        $(document).ready(function(){
            var usersCountElement = $("'.$element.'");
            if(usersCountElement.length) {
                usersCountElement.text('.$value.');
                usersCountElement.addClass("'.$classString.'");
            }
        });
    </script>';
}
function jquery_bind_html($element, $htmlString='') {
    return '<script>
        $(document).ready(function(){
            var usersCountElement = $("'.$element.'");
            if(usersCountElement.length) {
                usersCountElement.html(\''.$htmlString.'\');
            }
        });
    </script>';
}
