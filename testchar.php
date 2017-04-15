<?php

$db = new mysqli("localhost", "root", "", "mysqli_2");
  
mysqli_set_charset($db, "utf8");
printf("characters: %s\n", mysqli_character_set_name($db));
