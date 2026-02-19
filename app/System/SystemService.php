<?php

namespace App\System;

use Lib\Session;

use App\Host\HostModel as Hosts;

use App\User\UserService as User;
use App\Host\HostService as Host;
use App\Email\EmailService as Mail;

class SystemService 
{

    private static $uplink = 'uplink';

    public static function boot()
    {
        echo bootup(10);
        echo text('os_boot.txt');
    }

    public static function mode($mode)
    {
        Session::set('term', strtoupper($mode));
    }

    public static function uplink($input = '')
    {
        $code = 'code';

        if(empty($input) && !Session::has(self::$uplink)) {
            User::blocked(false);
            return self::code();
        }

        // Initialize login attempts if not set
        Host::attempts();

        // Check if the user is already blocked
        User::blocked();

        if(Session::get($code) == $input) {
            sleep(1);
            User::uplink(true);

            $remote_ip = remote_ip();

            echo <<< EOT

            SUCCESS: SECURITY ACCESS CODE SEQUENCE ACCEPTED
            EOT;
            exit;

        } else {

            // Calculate remaining attempts
            $attempts_left = Host::attempts(true);

            // Block the user after 4 failed attempts
            if ($attempts_left == 0) {

                User::blocked(true);
                exit;

            } else {
                echo <<< EOT

                ERROR: ACCESS DENIED
                EOT;
            }
            
        }
    }

    public static function code()
    {
        $code = 'code';
        $access_code = access_code();

        Session::set($code, $access_code);

        echo <<< EOT
        UPLINK WITH CENTRAL NETWORK INITIATED...
        
        =----------------------------------------------------=
        | PROPERTY OF INTERNATIONAL DATA MACHINES (IDM CORP) |
        =----------------------------------------------------=

        THIS TERMINAL IS USED TO INPUT COMMAND DATA 
        FOR AUTHORIZED PERSONNEL ASSIGNED TO THE 
        IDM CORPORATION. THIS TERMINAL ALSO ALLOWS 
        ACCESS TO DEFCOM-NET.

        -------------------------------------------------
        ENTER SECURITY ACCESS CODE SEQUENCE: 
        [ {$access_code} ]
        -------------------------------------------------

        EOT;
    }

    public static function login()
    {
        sleep(1);

        $port = $_SERVER['SERVER_PORT'];
        $date = strtoupper(date('F jS, Y',));

        echo <<< EOT
        CONNECTED TO CENTRAL NETOWRK PORT $port
        $date

        =--------------------------------------------=
        | WELCOME TO ROBCOM INDUSTRIES (TM) TERMLINK |
        =--------------------------------------------=

        EOT;
    }

    public static function home() 
    {
        $username = strtoupper(User::username());
        $last_login = User::data()->last_login;
        $server_id = Host::id();

        echo <<< EOT
        CONNECTED TO DATA-NET

        =--------------------------------------------=
        | ROBCOM INDUSTRIES VIRTUAL OPERATING SYSTEM |
        |    COPYRIGHT 1975-1977 ROBCOM INDUSTRIES   |
        =--------------------------------------------=
        IDM CORP. (Armonk, New York)
        MV/OS

        WELCOME, $username ($last_login)
        __________________________________________
        EOT;
    }

    public static function user()
    {   
        $date = timestamp(User::data()->last_login);
        $username = strtoupper(User::username());
        $last_login = "$date as $username";
        $last_ip = User::data()->ip;

        $host = Hosts::where('id', 1)->first();
        $id = $host->id;
        $os = $host->os;
        $org = $host->org;
        $location = $host->location;

        $motd = $host->motd;
        $notes = $host->notes;
        $mail = Mail::unread();

        $system_info = "Welcome to $org, $location\n";
        $system_info .= isset($motd) ? "\n$motd\n" : null;
        $system_info .= isset($notes) ? "\n$notes\n" : null;
        $system_info .= isset($mail) ? "\n$mail" : null;

        $current_date = datetime($host->created_at, config('unix_timestamp'));

        echo <<< EOT
        =--------------------------------------------=
        | ROBCOM INDUSTRIES VIRTUAL OPERATING SYSTEM |
        |    COPYRIGHT 1975-1977 ROBCOM INDUSTRIES   |
        =--------------------------------------------=
                         -SERVER $id-

        SESSION: {$last_login} FROM $last_ip
        ($os): $current_date

        $system_info
        ___________________________________________ 
        EOT;
    }

    public static function connect()
    {
        $host = Host::data();
        $os = $host->os;
        $org = $host->org;
        
        echo <<< EOT
        CONNECTED TO $host->hostname

        =--------------------------------------------=
        | ROBCOM INDUSTRIES VIRTUAL OPERATING SYSTEM |
        |    COPYRIGHT 1975-1977 ROBCOM INDUSTRIES   |
        =--------------------------------------------=
        $org - $os     

        WELCOME, USER. AUTHORIZED PERSONNEL ONLY!
        ______________________________________________

        EOT;
    }

    public static function auth()
    {
        $host = Host::data();
        $last_ip = User::data()->ip;
        $os = $host->os;
        $id = $host->id;
        $location = $host->location;
        $motd = $host->motd;
        $notes =  $host->notes;
        $org = $host->org;
        $username = strtoupper(User::username());
        $last_login = '';

        if($host_user = Host::data()->user(User::id())) {

            if(empty($host_user->pivot->last_session)) {
              $host_user->pivot->last_session = now();
              $host_user->pivot->save();
            }
            $date = timestamp($host_user->pivot->last_session);
            $last_login = "$date as $username";
        }

        
        $current_date = datetime($host->created_at, config('unix_timestamp'));

        $emails = Mail::unread();
        $mail = $emails;

        $system_info = "Welcome to $org, $location\n";
        $system_info .= isset($motd) ? "\n$motd\n" : null;
        $system_info .= isset($notes) ? "\n$notes\n" : null;
        $system_info .= isset($mail) ? "\n$mail" : null;

        Host::root();

        echo <<< EOT
        =--------------------------------------------=
        | ROBCOM INDUSTRIES VIRTUAL OPERATING SYSTEM |
        |    COPYRIGHT 1975-1977 ROBCOM INDUSTRIES   |
        =--------------------------------------------=
                        -SERVER $id-

        SESSION: {$last_login} FROM $last_ip
        ($os): $current_date
        
        $system_info
        ___________________________________________ 
        EOT;
    }

}
