<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\SessionUtils;


class UserCtrl {

	public function action_userList() {
		RoleUtils::requireRole('admin');

		$db = App::getDB();

		$users = $db->select('uzytkownicy', [
			'uzytkownik_id', 'imie', 'nazwisko', 'login', 'status_konta', 'data_utworzenia', 'data_modyfikacji'
		]);

		foreach ($users as &$u) {
			$uids = isset($u['uzytkownik_id']) ? $u['uzytkownik_id'] : null;
			$u['role'] = '';
			if ($uids) {
				$roleIds = $db->select('uzytkownicy_role', 'rola_id', ['uzytkownik_id' => $uids]);
				if (!empty($roleIds)) {
					$roleNames = $db->select('role', 'nazwa', ['rola_id' => $roleIds]);
					if (!empty($roleNames)) {
						$u['role'] = implode(', ', $roleNames);
					}
				}
			}

		}

		App::getSmarty()->assign('users', $users);
		App::getSmarty()->display('Users.tpl');
	}






	public function action_editUser() {
		RoleUtils::requireRole('admin');

		$db = App::getDB();
		$id = isset($_GET['id']) ? intval($_GET['id']) : null;
		$user = null;
		if ($id) {
			$user = $db->get('uzytkownicy', '*', ['uzytkownik_id' => $id]);
		}

		App::getSmarty()->assign('user', $user);
		App::getSmarty()->display('UserEdit.tpl');
	}







	public function action_saveUser() {
		RoleUtils::requireRole('admin');

		if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
			$db = App::getDB();

			$currentUserId = SessionUtils::load('user', true)['uzytkownik_id'] ?? null;

			$id = isset($_POST['uzytkownik_id']) && $_POST['uzytkownik_id'] !== '' ? intval($_POST['uzytkownik_id']) : null;

			$data = [
    			'imie' => trim($_POST['imie'] ?? ''),
    			'nazwisko' => trim($_POST['nazwisko'] ?? ''),
    			'login' => trim($_POST['login'] ?? ''),
    			'status_konta' => (!empty($_POST['active']) && ($_POST['active'] === '1' || $_POST['active'] === 'on')) ? 'A' : 'N',
    			'data_modyfikacji' => date('Y-m-d')
		];

			if ($currentUserId !== null) {
				$data['zmodyfikowal'] = $currentUserId;
			}


			if (isset($_POST['haslo']) && $_POST['haslo'] !== '') {
				$data['haslo_hash'] = password_hash($_POST['haslo'], PASSWORD_DEFAULT);
			}

			$roleName = isset($_POST['rola']) ? trim($_POST['rola']) : null;

			if ($id) {
				$db->update('uzytkownicy', $data, ['uzytkownik_id' => $id]);
				App::getMessages()->addMessage(new Message('Zapisano zmiany', Message::INFO));
				$userId = $id;
			} else {
				if (!isset($data['haslo_hash'])) {
					$data['haslo_hash'] = password_hash('changeme', PASSWORD_DEFAULT);
				}
				$data['data_utworzenia'] = date('Y-m-d');
				if ($currentUserId !== null) {
					$data['utworzyl'] = $currentUserId;
					$data['zmodyfikowal'] = $currentUserId;
				}
				$db->insert('uzytkownicy', $data);
				// get inserted id (Medoo)
				$userId = $db->id();
				App::getMessages()->addMessage(new Message('Dodano nowego użytkownika', Message::INFO));
			}

				if ($roleName && isset($userId)) {
					$roleId = $db->get('role', 'rola_id', ['nazwa' => $roleName]);
					if ($roleId) {
						$db->delete('uzytkownicy_role', ['uzytkownik_id' => $userId]);
						$db->insert('uzytkownicy_role', ['uzytkownik_id' => $userId, 'rola_id' => $roleId, 'data_nadania' => date('Y-m-d')]);
					}
				}
		}

		App::getRouter()->redirectTo('userList');
	}






	public function action_deleteUser() {
		RoleUtils::requireRole('admin');

		$id = isset($_GET['id']) ? intval($_GET['id']) : null;
		if ($id) {
			$db = App::getDB();
			$db->delete('uzytkownicy_role', ['uzytkownik_id' => $id]);
			$db->delete('uzytkownicy', ['uzytkownik_id' => $id]);
			App::getMessages()->addMessage(new Message('Usunięto użytkownika', Message::INFO));
		}

		App::getRouter()->redirectTo('userList');
	}






	public function action_deactivateUser() {
		RoleUtils::requireRole('admin');

		$id = isset($_GET['id']) ? intval($_GET['id']) : null;
		if ($id) {
			$db = App::getDB();
			$current = $db->get('uzytkownicy', 'status_konta', ['uzytkownik_id' => $id]);
			if ($current !== null) {
				$new = ($current === 'A') ? 'N' : 'A';
				$db->update('uzytkownicy', ['status_konta' => $new, 'data_modyfikacji' => date('Y-m-d')], ['uzytkownik_id' => $id]);
				App::getMessages()->addMessage(new Message('Zmieniono status użytkownika', Message::INFO));
			}
		}

		App::getRouter()->redirectTo('userList');
	}






	public function action_activateUser() {
		RoleUtils::requireRole('admin');
		$id = isset($_GET['id']) ? intval($_GET['id']) : null;
		if ($id) {
			$db = App::getDB();
			$db->update('uzytkownicy', ['status_konta' => 'A', 'data_modyfikacji' => date('Y-m-d')], ['uzytkownik_id' => $id]);
			App::getMessages()->addMessage(new Message('Aktywowano użytkownika', Message::INFO));
		}
		App::getRouter()->redirectTo('userList');
	}


}

