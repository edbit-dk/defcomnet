<?php

return [
    [
        'cmd' => 'HELP', 
        'input' => '[cmd|page]', 
        'info' => 'shows info about command',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 1,
        'is_guest' => 1
    ],
    [
        'cmd' => 'UPLINK', 
        'input' => '<access code>', 
        'info' => 'uplink to network',
        'is_user' => 0,
        'is_host' => 0,
        'is_visitor' => 1,
        'is_guest' => 0
    ],
    [
        'cmd' => 'REGISTER', 
        'input' => '<username>', 
        'info' => 'create account',
        'is_user' => 0,
        'is_host' => 0,
        'is_visitor' => 1,
        'is_guest' => 0
    ],
    [
        'cmd' => 'LOGON', 
        'input' => '<username>', 
        'info' => 'login (alias: logon) ',
        'is_user' => 0,
        'is_host' => 0,
        'is_visitor' => 1,
        'is_guest' => 1
    ],
    [
        'cmd' => 'LOGOUT', 
        'input' => NULL, 
        'info' => 'leave host/node (alias: exit, dc, quit, close) ',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 0,
        'is_guest' => 1
    ],
    [
        'cmd' => 'VERSION', 
        'input' => NULL, 
        'info' => 'SysCorpOS V.1.9.84',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 1,
        'is_guest' => 1
    ],
    [
        'cmd' => 'MUSIC', 
        'input' => '<start|stop|next>', 
        'info' => 'play 80s music',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 1,
        'is_guest' => 1
    ],
    [
        'cmd' => 'COLOR', 
        'input' => '<green|white|yellow|blue>', 
        'info' => 'terminal color',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 1,
        'is_guest' => 1
    ],
    [
        'cmd' => 'TERM', 
        'input' => '<DEC-VT100|IBM-3270>', 
        'info' => 'change terminal mode',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 1,
        'is_guest' => 1
    ],
    [
        'cmd' => 'SCAN', 
        'input' => NULL, 
        'info' => 'list connected nodes (alias: scan)',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 0,
        'is_guest' => 0
    ],
    [
        'cmd' => 'CONNECT', 
        'input' => '<host>', 
        'info' => 'connect to host (alias: connect)',
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 0,
        'is_guest' => 0
    ],
    [
        'cmd' => 'MAIL', 
        'input' => '[send|read|list|delete]', 
        'info' => "email user: -s <subject> <user>[@host] < <body> \n
        list emails: [-l] \n
        read email: [-r] <ID> \n
        sent emails: -s \n
        sent email: -s <ID> \n
        delete email: -d <ID>",
        'is_user' => 1,
        'is_host' => 1,
        'is_visitor' => 0,
        'is_guest' => 0
    ],
    [
        'cmd' => 'DIR', 
        'input' => NULL, 
        'info' => 'list files on host (alias: dir)',
        'is_user' => 0,
        'is_host' => 1,
        'is_visitor' => 0,
        'is_guest' => 1
    ],
    [
        'cmd' => 'TYPE', 
        'input' => '<filename>', 
        'info' => 'print contents of file (alias: more, open)',
        'is_user' => 0,
        'is_host' => 1,
        'is_visitor' => 0,
        'is_guest' => 1
    ],
    [
        'cmd' => 'DEBUG', 
        'input' => '[dump]', 
        'info' => 'run memory dump on accounts.f',
        'is_user' => 1,
        'is_host' => 0,
        'is_visitor' => 0,
        'is_guest' => 1
    ],
];