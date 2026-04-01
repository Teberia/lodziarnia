<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;

class WelcomeCtrl {

    public function action_welcome() {
        return $this->action_default();
    }

    public function action_default() {
    $user = SessionUtils::load('user', true);

        $roles = SessionUtils::load('user_roles', true);

        $low_stock = 0;
        $high_stock = 0;
        $users_active = 0;
        $users_inactive = 0;

        if (in_array('produkcja', $roles, true) || in_array('manager', $roles, true)) {

            $db = App::getDB();


            $low_stock = $db->count('smaki', [
                'AND' => [
                    'status' => 'A',
                    'dostepna_ilosc[<]' => 5
                ]
            ]);

            $high_stock = $db->count('smaki', [
                'AND' => [
                    'status' => 'A',
                    'dostepna_ilosc[>=]' => 5
                ]
            ]);
        }

        if (in_array('admin', $roles, true)) {
            if (!isset($db)) {
                $db = App::getDB();
            }
            $users_active = $db->count('uzytkownicy', ['status_konta' => 'A']);
            $users_inactive = $db->count('uzytkownicy', ['status_konta' => 'N']);
        }


        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('roles', $roles);


        App::getSmarty()->assign('low_stock', $low_stock);
        App::getSmarty()->assign('high_stock', $high_stock);
        App::getSmarty()->assign('users_active', $users_active);
        App::getSmarty()->assign('users_inactive', $users_inactive);

        App::getSmarty()->display('Welcome.tpl');
    }
}
