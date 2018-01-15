<?php

define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Shem@admin1995');
   define('DB_DATABASE', 'myshift_data');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(mysqli_connect_errno())
   {
       die("Connection Failed!" . mysqli_connect_error());
   }
   

