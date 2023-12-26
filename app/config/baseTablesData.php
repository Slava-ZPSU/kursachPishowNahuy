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
             'description' => 'When Isaac’s mother starts hearing the voice of God demanding a sacrifice be made to prove her faith, Isaac escapes into the basement facing droves of deranged enemies, lost brothers and sisters, his fears, and eventually his mother. Gameplay The Binding of Isaac is a randomly generated action RPG shooter with heavy Rogue-like elements. Following Isaac on his journey players will find bizarre treasures that change Isaac’s form giving him super human abilities and enabling him to fight off droves of mysterious creatures, discover secrets and fight his way to safety. About the Binding Of Isaac: Rebirth The Binding of Isaac: Rebirth is the ultimate of remakes with an all-new highly efficient game engine (expect 60fps on most PCs), all-new hand-drawn pixel style artwork, highly polished visual effects, all-new soundtrack and audio by the the sexy Ridiculon duo Matthias Bossi + Jon Evans. Oh yeah, and hundreds upon hundreds of designs, redesigns and re-tuned enhancements by series creator, Edmund McMillen. Did we mention the poop? Key Features: Over 500 hours of gameplay 4 BILLION Seeded runs! 20 Challenge runs 450+ items, including 160 new unlockables Integrated controller support for popular control pads! Analog directional movement and speed Tons of feature film quality animated endings Over 100 specialized seeds 2-Player local co-op Over 100 co-op characters Dynamic lighting, visual effects and art direction All-new game engine @60FPS 24/7 All-new soundtrack and sound design Multiple Save slots Poop physics! The ultimate roguelike A bunch of achievements Uber secrets including: 10 Playable Characters 100+ enemies, with new designs Over 50 bosses, including tons of new and rare bosses Rooms FULL OF POOP! Mystic Runes Upgradeable shops',
         ],
     ],
 ];