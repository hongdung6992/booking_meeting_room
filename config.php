<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123123');
define('DB_NAME', 'booking_meeting_room');

$protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
define('ROOT_URL', $protocol . $_SERVER['HTTP_HOST']);

