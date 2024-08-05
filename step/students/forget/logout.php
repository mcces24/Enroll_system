<?php

session_start();
setcookie('USER_LOGIN_AUTH', '', time() - 3600, '/');

header("Location: ./");