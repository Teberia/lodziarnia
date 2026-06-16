<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('login'); 

// Stronal logowania i wylogowania
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');


// Strona powitalna po zalogowaniu;
Utils::addRoute('welcome', 'WelcomeCtrl');


// Panel do zarządzania uzytkonikami;
 Utils::addRoute('userList', 'UserCtrl', ['admin']);
 Utils::addRoute('addUser', 'UserCtrl', ['admin']);
 Utils::addRoute('deleteUser', 'UserCtrl', ['admin']);
 Utils::addRoute('editUser', 'UserCtrl', ['admin']);
 Utils::addRoute('saveUser', 'UserCtrl', ['admin']);
 Utils::addRoute('viewUsers', 'UserCtrl', ['admin']);
 Utils::addRoute('deactivateUser', 'UserCtrl', ['admin']);
 Utils::addRoute('activateUser', 'UserCtrl', ['admin']);


// Panel do zarzadzania rolami;
 Utils::addRoute('roleList', 'RoleCtrl', ['admin']); 
 Utils::addRoute('addRole', 'RoleCtrl', ['admin']);  
 Utils::addRoute('deleteRole', 'RoleCtrl', ['admin']);
 Utils::addRoute('editRole', 'RoleCtrl', ['admin']);
 Utils::addRoute('saveRole', 'RoleCtrl', ['admin']);
 Utils::addRoute('viewRoles', 'RoleCtrl', ['admin']);
 

// Panel do zarządzania magazynem;
Utils::addRoute('inventory', 'InventoryCtrl', ['produkcja', 'manager']);
Utils::addRoute('addInventory', 'InventoryCtrl', ['produkcja']);
Utils::addRoute('editInventory', 'InventoryCtrl', ['produkcja']);
Utils::addRoute('saveInventory', 'InventoryCtrl', ['produkcja']);
Utils::addRoute('deleteInventory', 'InventoryCtrl', ['produkcja']);
Utils::addRoute('deactivateInventory', 'InventoryCtrl', ['produkcja']);
Utils::addRoute('activateInventory', 'InventoryCtrl', ['produkcja']);

// Panel do zarządzania zamowieniami - TODO;
// Panel do raportów - TODO;
