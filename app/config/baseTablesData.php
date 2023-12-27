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
             'image' => 'uploads/TBoIRebirthPoster.png',
             'name' => 'The Binding of Isaac Rebirth',
             'price' => 299,
             'creator' => 'Nicalis, Inc',
             'publisher' => 'Nicalis, Inc',
             'category' => 'RogueLike',
             'description' => 'When Isaac’s mother starts hearing the voice of God demanding a sacrifice be made to prove her faith, Isaac escapes into the basement facing droves of deranged enemies, lost brothers and sisters, his fears, and eventually his mother.\r\n\r\nGameplay\r\nThe Binding of Isaac is a randomly generated action RPG shooter with heavy Rogue-like elements. Following Isaac on his journey players will find bizarre treasures that change Isaac’s form giving him super human abilities and enabling him to fight off droves of mysterious creatures, discover secrets and fight his way to safety.\r\n\r\nAbout the Binding Of Isaac: Rebirth\r\nThe Binding of Isaac: Rebirth is the ultimate of remakes with an all-new highly efficient game engine (expect 60fps on most PCs), all-new hand-drawn pixel style artwork, highly polished visual effects, all-new soundtrack and audio by the the sexy Ridiculon duo Matthias Bossi + Jon Evans. Oh yeah, and hundreds upon hundreds of designs, redesigns and re-tuned enhancements by series creator, Edmund McMillen. Did we mention the poop?',
         ],
         [
             'image' => 'uploads/Enter_the_Gungeon.jpg',
             'name' => 'Enter The Gungeon',
             'price' => 255,
             'creator' => 'Dodge Roll',
             'publisher' => 'Devolver Digital',
             'category' => 'RogueLike',
             'description' => 'Enter the Gungeon is a bullet hell dungeon crawler following a band of misfits seeking to shoot, loot, dodge roll and table-flip their way to personal absolution by reaching the legendary Gungeon’s ultimate treasure: the gun that can kill the past. Select a hero [or team up in co-op] and battle your way to the bottom of the Gungeon by surviving a challenging and evolving series of floors filled with the dangerously adorable Gundead and fearsome Gungeon bosses armed to the teeth. Gather precious loot, discover hidden secrets, and chat with opportunistic merchants and shopkeepers to purchase powerful items to gain an edge.\r\n\r\nThe Gungeon: Enter the Gungeon – a constantly evolving bullet hell fortress that elegantly blends meticulously hand-designed rooms within a procedurally-generated labyrinth bent on destroying all that enter its walls. But beware – the Gungeon responds to even the most modest victory against its sentries and traps by raising the stakes and the challenges found within!\r\n\r\nThe Cult of the Gundead: The Gungeon isn’t just traps and chasms – calm your nerves and steady your aim as you face down the gun-totting Cult of the Gundead. These disciples of the gun will stop at nothing to put down the heroes in their tracks and employ any tactics necessary to defend their temple.\r\n\r\nThe Gungeoneers: Choose between one of several unlikely heroes, each burdened by a deep regret and in search of a way to change their past, no matter the cost. Filled with equal parts courage and desperation, these adventurers won’t hesitate to dive across flaming walls, roll through a wall of bullets, or take cover behind whatever is around to make it to their goal alive!\r\n\r\nThe Guns: Discover and unlock scores of uniquely fantastic guns to annihilate all that oppose you in the Gungeon – each carrying their own unique tactics and ammunition. Unleash everything from the tried and true medley of missiles, lasers, and cannonballs to the bizarrely effective volley of rainbows, fish, foam darts, and bees! Yep, bees.',
         ],
     ],
 ];