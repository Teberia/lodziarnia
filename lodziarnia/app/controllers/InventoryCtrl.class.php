<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;

class InventoryCtrl {

    public function action_inventory() {

        $db = App::getDB();
        $items = $db->select('smaki', ['smak_id', 'nazwa', 'dostepna_ilosc', 'status']);

        App::getSmarty()->assign('items', $items);
        App::getSmarty()->display('Inventory.tpl');
    }

    public function action_editInventory() {
        $db = App::getDB();

        $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : null;

        if (!$id) {
            App::getRouter()->forwardTo('inventory');
            return;
        }

        $item = $db->get('smaki', '*', ['smak_id' => $id]);

        if (!$item) {
            App::getMessages()->addMessage(
                new Message('Nie znaleziono pozycji o podanym ID', Message::ERROR)
            );
            App::getRouter()->forwardTo('inventory');
            return;
        }

        App::getSmarty()->assign('item', $item);
        App::getSmarty()->display('InventoryEdit.tpl');
    }

    public function action_addInventory() {

        App::getSmarty()->assign('item', null);
        App::getSmarty()->display('InventoryEdit.tpl');
    }

    public function action_saveInventory() {

        $db = App::getDB();

        $id = isset($_POST['id']) ? intval($_POST['id']) : null;
        $nazwa = trim($_POST['nazwa'] ?? '');
        $quantity = floatval($_POST['dostepna_ilosc'] ?? 0);

        if ($nazwa === '') {
            App::getMessages()->addMessage(
                new Message('Nazwa smaku nie może być pusta', Message::ERROR)
            );
            App::getRouter()->forwardTo('inventory');
            return;
        }

        if ($id) {
            $db->update('smaki', [
                'nazwa' => $nazwa,
                'dostepna_ilosc' => $quantity,
                'data_modyfikacji' => date('Y-m-d')
            ], ['smak_id' => $id]);

            App::getMessages()->addMessage(
                new Message('Zaktualizowano pozycję magazynową', Message::INFO)
            );
        } else {
            $db->insert('smaki', [
                'nazwa' => $nazwa,
                'dostepna_ilosc' => $quantity,
                'status' => 'A',
                'data_modyfikacji' => date('Y-m-d')
            ]);

            App::getMessages()->addMessage(
                new Message('Dodano nowy smak do bazy', Message::INFO)
            );
        }

        App::getRouter()->forwardTo('inventory');
    }


    public function action_deactivateInventory() {

        $db = App::getDB();
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if (!$id) {
            App::getRouter()->forwardTo('inventory');
            return;
        }

        $item = $db->get('smaki', ['dostepna_ilosc', 'status'], ['smak_id' => $id]);

        if (!$item) {
            App::getMessages()->addMessage(
                new Message('Nie znaleziono smaku', Message::ERROR)
            );
        } elseif ($item['dostepna_ilosc'] > 0) {
            App::getMessages()->addMessage(
                new Message('Nie można dezaktywować smaku, który ma ilość większą niż 0', Message::ERROR)
            );
        } elseif ($item['status'] === 'N') {
            App::getMessages()->addMessage(
                new Message('Smak jest już dezaktywowany', Message::INFO)
            );
        } else {
            $db->update('smaki', [
                'status' => 'N',
                'data_modyfikacji' => date('Y-m-d')
            ], ['smak_id' => $id]);

            App::getMessages()->addMessage(
                new Message('Smak został dezaktywowany', Message::INFO)
            );
        }

        App::getRouter()->forwardTo('inventory');
    }


    public function action_deleteInventory() {

        $db = App::getDB();
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if (!$id) {
            App::getRouter()->forwardTo('inventory');
            return;
        }

        $item = $db->get('smaki', ['status'], ['smak_id' => $id]);

        if (!$item) {
            App::getMessages()->addMessage(
                new Message('Nie znaleziono smaku', Message::ERROR)
            );
        } elseif ($item['status'] !== 'N') {
            App::getMessages()->addMessage(
                new Message('Nie można usunąć aktywnego smaku. Najpierw go dezaktywuj.', Message::ERROR)
            );
        } else {
            $db->delete('smaki', ['smak_id' => $id]);

            App::getMessages()->addMessage(
                new Message('Smak został trwale usunięty', Message::INFO)
            );
        }

        App::getRouter()->forwardTo('inventory');
    }



public function action_activateInventory() {

    $db = App::getDB();
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if (!$id) {
        App::getRouter()->forwardTo('inventory');
        return;
    }

    $item = $db->get('smaki', ['status'], ['smak_id' => $id]);

    if (!$item) {
        App::getMessages()->addMessage(
            new Message('Nie znaleziono smaku', Message::ERROR)
        );
    } elseif ($item['status'] === 'A') {
        App::getMessages()->addMessage(
            new Message('Smak jest już aktywny', Message::INFO)
        );
    } else {
        $db->update('smaki', [
            'status' => 'A',
            'data_modyfikacji' => date('Y-m-d')
        ], ['smak_id' => $id]);

        App::getMessages()->addMessage(
            new Message('Smak został ponownie aktywowany', Message::INFO)
        );
    }

    App::getRouter()->forwardTo('inventory');
}

}
