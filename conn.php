<?php

/* 
 * >_Created by robby on 31 March.
 * Time: 19:44
 * Copyright @ 2020
 *
 */

define('hostname', 'localhost');
define('user', 'ibbor');
define('password', '@Gaktaugwlupa0');
define('databaseName', 'sandung');

/* $connect untuk melakukan koneksi ke database, sesuai dengan argument yang telah didefinisikan. */
$connect = mysqli_connect(hostname, user, password, databaseName) or die('Unable to Connect');
