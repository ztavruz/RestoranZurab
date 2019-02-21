<?php

require(__DIR__."/database/connection.php");
use \RedBeanPHP\R as R;

echo R::testConnection();
