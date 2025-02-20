<?php
require_once(__DIR__ . '../../utils/functions.php');
session_start();

session_destroy();
redirectToUrl('/tests/Cours/index.php');
