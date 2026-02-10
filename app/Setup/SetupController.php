<?php

namespace App\Setup;

use App\AppController;

use App\Setup\SetupService as Setup;

class SetupController extends AppController
{
    public function install()
    {
       return Setup::install();
    }

    public function system()
    {
       return Setup::system();
    }

    public function users()
    {
       return Setup::users();
    }

    public function hosts()
    {
       return Setup::hosts();
    }

    public function accounts()
    {
       return Setup::accounts();
    }

    public function nodes()
    {
       return Setup::nodes();
    }

    public function files()
    {
       return Setup::files();
    }

   public function help()
    {
       return Setup::help();
    }
    
}