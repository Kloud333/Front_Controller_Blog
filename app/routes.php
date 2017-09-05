<?php
/**
 * route_name => [path, file, function, methods]
 */

return [
    'main_page' => [
        'path' => '/',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\index',
        'methods' => ['GET']
    ],

    'post_by_id' => [
        'path' => '/post/{id}',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\postById',
        'methods' => ['GET']
    ],
    'post_by_author' => [
        'path' => '/author/{criteria}',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\postsByAuthor',
        'methods' => ['GET']
    ],
    'login_page' => [
        'path' => '/login',
        'file' => 'controllers\users.php',
        'function' => 'app\\src\\controllers\\users\\loginPage',
        'methods' => ['GET']
    ],
    'registration_page' => [
        'path' => '/registration',
        'file' => 'controllers\users.php',
        'function' => 'app\\src\\controllers\\users\\registrationPage',
        'methods' => ['GET']
    ],
    'user_cabinet_page' => [
        'path' => '/user/cabinet/',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\userCabinet',
        'methods' => ['GET']
    ],
    'login' => [
        'path' => '/login',
        'file' => 'controllers\users.php',
        'function' => 'app\\src\\controllers\\users\\login',
        'methods' => ['POST']
    ],
    'logout' => [
        'path' => '/logout',
        'file' => 'controllers\users.php',
        'function' => 'app\\src\\controllers\\users\\logout',
        'methods' => ['POST']
    ],
    'registration' => [
        'path' => '/registration',
        'file' => 'controllers\users.php',
        'function' => 'app\\src\\controllers\\users\\registration',
        'methods' => ['POST']
    ],
    'add_post' => [
        'path' => '/add',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\addPost',
        'methods' => ['POST']
    ],
    'delete_post' => [
        'path' => '/delete/{num}',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\deletePost',
        'methods' => ['GET']
    ],
    'edit_post' => [
        'path' => '/edit/post/{num}',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\editPost',
        'methods' => ['GET']
    ],
    'save_edit' => [
        'path' => '/save_edit',
        'file' => 'controllers\posts.php',
        'function' => 'app\\src\\controllers\\posts\\saveEdit',
        'methods' => ['POST']
    ],
];
