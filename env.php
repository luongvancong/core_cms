<?php
$env = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/.env');
$env = json_decode($env, true);

// Put env variables
foreach($env as $key => $value) {
    putenv("$key=$value");
}