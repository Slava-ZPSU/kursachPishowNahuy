<?php

 return [
     'Accounts' => [
         [
             'email' => 'user1@gmail.com',
             'nickname' => 'User 1',
             'login' => 'User1',
             'password' => password_hash('12345678', PASSWORD_BCRYPT),
             'token' => '',
             'status' => 1,
         ],
     ],
     'Admins' => [
         [
             'email' => 'mainAdmin@gmail.com',
             'nickname' => 'Main Admin',
             'login' => 'MainAdmin',
             'password' => password_hash('MainAdmin', PASSWORD_BCRYPT),
             'role' => 'main',
         ],
         [
             'email' => 'regularAdmin1@gmail.com',
             'nickname' => 'Regular Admin 1',
             'login' => 'RegularAdmin1',
             'password' => password_hash('RegularAdmin1', PASSWORD_BCRYPT),
             'role' => 'regular',
         ],
     ],
     'Products' => [
         [
             'image' => '/public/images/TBoIRebirthPoster.png',
             'name' => 'The Binding of Isaac Rebirth',
             'price' => 299,
             'creator' => 'Nicalis, Inc',
             'publisher' => 'Nicalis, Inc',
             'category' => 'RogueLike',
             'description' => 'When Isaac’s mother starts hearing the voice of God demanding a sacrifice be made to prove her faith, Isaac escapes into the basement facing droves of deranged enemies, lost brothers and sisters, his fears, and eventually his mother.\r\n\r\nGameplay\r\nThe Binding of Isaac is a randomly generated action RPG shooter with heavy Rogue-like elements. Following Isaac on his journey players will find bizarre treasures that change Isaac’s form giving him super human abilities and enabling him to fight off droves of mysterious creatures, discover secrets and fight his way to safety.\r\n\r\nAbout the Binding Of Isaac: Rebirth\r\nThe Binding of Isaac: Rebirth is the ultimate of remakes with an all-new highly efficient game engine (expect 60fps on most PCs), all-new hand-drawn pixel style artwork, highly polished visual effects, all-new soundtrack and audio by the the sexy Ridiculon duo Matthias Bossi + Jon Evans. Oh yeah, and hundreds upon hundreds of designs, redesigns and re-tuned enhancements by series creator, Edmund McMillen. Did we mention the poop?',
         ],
     ],
 ];