<?php

$rec_limit = 5;

if(isset($_GET['p'] )) {
   $page = $_GET['p'] + 1;
   $offset = $rec_limit * $page;
   $counter = $offset + 1;
} else {
   $page = 0;
   $offset = 0;
   $counter = 1;
}

$left_rec = $total - ($page * $rec_limit);

?>