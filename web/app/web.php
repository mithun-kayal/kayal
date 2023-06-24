<?php
    return array(
        //'pageName'=>[page information]
        'default'=>[
            'filePath'=>'web/pages/home/html.php',
            'js'=>'web/pages/home/function.js', // Optional
            'title'=>'Wellcome to admin',
            'data'=>[]
        ],
        'home'=>[
            'filePath'=>'web/pages/home/html.php',
            'js'=>'web/pages/home/function.js',
            'title'=>'Wellcome to admin',
            'data'=>[],
            'arPageDisign'=>['header'=>true,'leftManu'=>true,'rightManu'=>true,'footer'=>true]
        ],


        'login'=>[
            'filePath'=>'web/pages/login/html.php',
            'title'=>'Login',
            'data'=>[],
            'arPageDisign'=>['header'=>false,'leftManu'=>false,'rightManu'=>false,'footer'=>false]
        ],
        'pages-recover-paw'=>[
            'filePath'=>'web/pages/pages_recoverpw/html.php',
            'title'=>'Pages recover password',
            'data'=>[],
            'arPageDisign'=>['header'=>false,'leftManu'=>false,'rightManu'=>false,'footer'=>false]
        ],
        'register'=>[
            'filePath'=>'web/pages/register/html.php',
            'title'=>'Register new user',
            'data'=>[],
            'arPageDisign'=>['header'=>false,'leftManu'=>false,'rightManu'=>false,'footer'=>false]
        ],
        'lock-screen'=>[
            'filePath'=>'web/pages/lock_screen/html.php',
            'title'=>'User lock',
            'data'=>[],
            'arPageDisign'=>['header'=>false,'leftManu'=>false,'rightManu'=>false,'footer'=>false]
        ],
        '404'=>[
            'filePath'=>'web/pages/404/html.php',
            'title'=>'404 ERROR',
            'data'=>['id'=>0],
            'arPageDisign'=>['header'=>false,'leftManu'=>false,'rightManu'=>false,'footer'=>false]
        ],
        '500'=>[
            'filePath'=>'web/pages/500/html.php',
            'title'=>'500 ERROR',
            'data'=>['id'=>0],
            'arPageDisign'=>['header'=>false,'leftManu'=>false,'rightManu'=>false,'footer'=>false]
        ],
        'directory'=>[
            'filePath'=>'web/pages/directory/html.php',
            'title'=>'Directory',
            'data'=>['id'=>0]
        ],
        'timeline'=>[
            'filePath'=>'web/pages/timeline/html.php',
            'title'=>'Directory',
            'data'=>['id'=>0]
        ],
        'user'=>[
            'filePath'=>'web/pages/user/html.php',
            'title'=>'Users list',
            'data'=>[]
        ],
        'create-new-user'=>[
            'filePath'=>'web/pages/create_new_user/html.php',
            'js'=>'web/pages/create_new_user/function.js',
            'title'=>'Create new user',
            'data'=>[]
        ],



    );