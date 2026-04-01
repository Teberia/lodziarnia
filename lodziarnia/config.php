<?php
$conf->debug = true; # set true during development and use in your code (for instance check if true to send additional message)

# ---- Webapp location
$conf->server_name = 'localhost:3000';   # server address and port
$conf->protocol = 'http';           # http or https
$conf->app_root = '/';   # project subfolder in domain (relative to main domain)

# ---- Database config - values required by Medoo
$conf->db_type = 'mysql';
$conf->db_server = 'db_lodziarnia';
$conf->db_name = 'lodziarnia';
$conf->db_user = 'root';
$conf->db_pass = 'pass';

# ---- Database config - optional values
$conf->db_port = '3306';
$conf->db_option = [ PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];