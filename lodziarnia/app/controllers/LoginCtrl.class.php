<?php namespace app\controllers;
use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
class LoginCtrl
{
    public function action_login()
    {
        if (
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"] === "POST"
        ) {

        $username = trim($_POST['login'] ?? '');
        $password = $_POST['haslo_hash'] ?? '';
        
            if (empty($username) || empty($password)) {
                App::getMessages()->addMessage(
                    new Message("Proszę podać login i hasło", Message::ERROR)
                );
                App::getSmarty()->display("Login.tpl");
                return;
            }
            $db = App::getDB();
            $user = $db->get("uzytkownicy", "*", ["login" => $username]);
            if ($user && ($user['status_konta'] ?? '') !== 'A') {
                App::getMessages()->addMessage(
                    new Message("Konto jest nieaktywne", Message::ERROR)
                );
                App::getSmarty()->display("Login.tpl");
                return;
            }
            if (
                $user &&
                isset($user["haslo_hash"]) &&
                password_verify($password, $user["haslo_hash"])
            ) {
                SessionUtils::store("user", $user);
                App::getConf()->roles = [];
                $_SESSION["_amelia_roles"] = serialize(App::getConf()->roles);
                $userId = isset($user["uzytkownik_id"])
                    ? $user["uzytkownik_id"]
                    : null;
                $assignedRoles = [];
                if ($userId) {
                    $roleIds = $db->select("uzytkownicy_role", "rola_id", [
                        "uzytkownik_id" => $userId,
                    ]);
                    if (!empty($roleIds)) {
                        $roleNames = $db->select("role", "nazwa", [
                            "rola_id" => $roleIds,
                        ]);
                        if (!empty($roleNames)) {
                            foreach ($roleNames as $rname) {
                                RoleUtils::addRole($rname);
                                $assignedRoles[] = $rname;
                            }
                        }
                    }
                }
                if (empty($assignedRoles)) {
                    RoleUtils::addRole("user");
                }
                if (!empty($assignedRoles)) {
                    SessionUtils::store("user_roles", $assignedRoles);
                } else {
                    SessionUtils::store("user_roles", ["user"]);
                }
                App::getRouter()->redirectTo("welcome");
            } else {
                App::getSmarty()->display("Login.tpl");
            }
        } else {
            App::getSmarty()->display("Login.tpl");
        }
    }
    public function action_logout()
    {
        SessionUtils::remove("user");
        App::getConf()->roles = [];
        $_SESSION["_amelia_roles"] = serialize(App::getConf()->roles);
        App::getRouter()->redirectTo(App::getRouter()->getDefaultRoute());
    }
}
