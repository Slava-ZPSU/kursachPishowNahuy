<?php

return [
    // MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'about' => [
        'controller' => 'main',
        'action' => 'about',
    ],
    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],
    'allProducts' => [
        'controller' => 'main',
        'action' => 'allProducts',
    ],

    // AccountController
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/recovery' => [
        'controller' => 'account',
        'action' => 'recovery',
    ],
    'account/confirm/{token:\w+}' => [
        'controller' => 'account',
        'action' => 'confirm',
    ],
    'account/reset/{token:\w+}' => [
        'controller' => 'account',
        'action' => 'reset',
    ],
    'account/profile' => [
        'controller' => 'account',
        'action' => 'profile',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],

    // AdminController
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'admin/add' => [
        'controller' => 'admin',
        'action' => 'add',
    ],
    'admin/moderation' => [
        'controller' => 'admin',
        'action' => 'moderation',
    ],
    'admin/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'admin/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
    'admin/register' => [
        'controller' => 'admin',
        'action' => 'register',
    ],

    // Cart
    'cart/addProductToCart/{id:\d+}' =>[
        'controller' => 'cart',
        'action' => 'addProductToCart',
    ],
    'cart/showCart' =>[
        'controller' => 'cart',
        'action' => 'showCart',
    ],
];