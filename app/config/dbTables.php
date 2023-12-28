<?php

return [
    'Accounts' => [
        'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
        'email' => 'VARCHAR(50) UNIQUE NOT NULL',
        'image' => 'VARCHAR(50)',
        'nickname' => 'VARCHAR(20) NOT NULL',
        'login' => 'VARCHAR(20) NOT NULL',
        'password' => 'VARCHAR(255) UNIQUE NOT NULL',
        'token' => 'VARCHAR(30) NOT NULL',
        'status' => 'INT NOT NULL',
    ],
    'Admins' => [
        'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
        'email' => 'VARCHAR(50) UNIQUE NOT NULL',
        'image' => 'VARCHAR(50)',
        'nickname' => 'VARCHAR(20) NOT NULL',
        'login' => 'VARCHAR(20) NOT NULL',
        'password' => 'VARCHAR(255) UNIQUE NOT NULL',
        'role' => 'VARCHAR(50) NOT NULL',
    ],
    'Products' => [
        'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
        'image' => 'VARCHAR(50) NOT NULL',
        'name' => 'VARCHAR(50) NOT NULL',
        'price' => 'DECIMAL(6,0) NOT NULL',
        'creator' => 'VARCHAR(50) NOT NULL',
        'publisher' => 'VARCHAR(50) NOT NULL',
        'category' => 'VARCHAR(100) NOT NULL',
        'description' => 'VARCHAR(5000) NOT NULL',
    ],
    'Cart' => [
        'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
        'account_id' => 'INT NOT NULL REFERENCES Accounts(id)',
        'product_id' => 'INT NOT NULL REFERENCES Products(id)',
        'price' => 'DECIMAL(6,0) NOT NULL',
    ],

];