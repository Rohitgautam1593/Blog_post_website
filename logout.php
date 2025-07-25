<?php
require_once __DIR__ . '/includes/auth.php';
logoutUser();
header('Location: templates/login.php');
exit; 