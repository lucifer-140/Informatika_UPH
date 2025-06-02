<?php

session_start();
session_regenerate_id();
session_destroy();
//unset($_SESSION['count']); // cuma menghapus variable session count
header('Location: /session.php', false, 302);