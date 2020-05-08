<?php

/* 
 * >_Created by robby on 08 April.
 * Time: 21:30
 * Copyright @ 2020
 *
 */
session_start();
session_unset();
header('Location: index.php');
exit;
