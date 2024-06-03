<?php

require_once "functions/utils.php";

session_start();
session_destroy();

redirect("index.php");
