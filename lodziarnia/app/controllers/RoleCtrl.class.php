<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\SessionUtils;


class RoleCtrl {

	public function action_roleList() {
		RoleUtils::requireRole('admin');

		$db = App::getDB();

		$roles = $db->select('role', [
			'rola_id', 'nazwa', 'status', 'data_utworzenia', 'data_modyfikacji'
		]);

		App::getSmarty()->assign('roles', $roles);
		App::getSmarty()->display('Roles.tpl');
	}

 

}

