<?php

return [
    [
        'id' => 1,
        'user_id' => 1,
        'hostname' => 'DATA-NET', 
        'password' => word_pass(),
        'org' => 'INTERNATIONAL DATA MACHINES CORP. (IDM)',
        'location' => 'ARMON, NEW YORK, USA [ONLINE]',
        'welcome' => 'WELCOME TO IDM CORP.',
        'notes' => 'SYSADMIN: ADMIN@DATA-NET',
        'os' => 'U/DOS V1.10',
        'ip' => random_ip(),
        'is_network' => 1,
        'level_id' => 1,
        'created_at' => timestamp("1911-06-16 06:30:00", true)
    ],
    [
        'id' => 2,
        'user_id' => 1,
        'hostname' => 'GEC-NET', 
        'password' => word_pass(),
        'org' => 'GENERAL ENERGY & COMMUNICATION (GEC)',
        'location' => 'SAN RAMON, CALIFORNIA, USA [ENCRYPTED]',
        'welcome' => 'WELCOME TO GEC CORP.',
        'notes' => 'SYSADMIN: ADMIN@GEC-NET',
        'os' => 'U/DOS V3.0',
        'ip' => random_ip(),
        'is_network' => 1,
        'level_id' => 3,
        'created_at' => timestamp("1892-04-30 06:30:00", true)
    ],
    [
        'id' => 3,
        'user_id' => 1,
        'hostname' => 'DEFCON-NET', 
        'password' => word_pass(),
        'org' => 'DEFENSE & CONTROL (DFC)',
        'location' => 'LOS ANGELES, CALIFORNIA, USA [LOCKED]',
        'welcome' => 'WELCOME TO DEFCON CORP.',
        'notes' => 'SYSADMIN: ADMIN@DEFCON-NET',
        'os' => 'U/DOS V4.0',
        'ip' => random_ip(),
        'is_network' => 1,
        'level_id' => 4,
        'created_at' => timestamp("1958-10-30 06:30:00", true)
    ],
    [
        'id' => 4,
        'user_id' => 1,
        'hostname' => 'SYNCORP-NET', 
        'password' => word_pass(),
        'org' => 'THE SYNDICATE CORPORATION (SYN)',
        'location' => '[REDACTED] [UNKNOWN]',
        'welcome' => 'WELCOME TO THE SYNDICATE',
        'notes' => 'SYSADMIN: [REDACTED]',
        'os' => '[REDACTED]',
        'ip' => random_ip(),
        'is_network' => 1,
        'level_id' => 6,
        'created_at' => timestamp("1933-01-30 06:30:00", true)
    ],
];