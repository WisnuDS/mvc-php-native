<?php
if (!session_id()) session_start();

require_once "core/App.php";
require_once "core/Controller.php";
require_once "core/Model.php";
require_once "core/Database.php";
require_once "core/FlashMessage.php";
require_once "core/Auth.php";

require_once "config/config.php";