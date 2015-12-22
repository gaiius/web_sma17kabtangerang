<?php 

if($page > 0) {
   $last = $page - 2;

   echo "<a href='index.php?page=".$paging_location."&p=".$page."' style='float: right;'>".$rec_limit." Data Selanjutnya</a><span style='float: right;'>|</span>";
   echo "<a href='index.php?page=".$paging_location."&p=".$last."' style='float: right;'>".$rec_limit." Data Sebelumnya</a>";
} else if($page == 0 && $total > $rec_limit) {
   echo "<a href='index.php?page=".$paging_location."&p=".$page."' style='float: right;'>".$rec_limit." Data Selanjutnya</a>";
} else if($left_rec < $rec_limit && $total > $rec_limit && $total != 0) {
   $last = $page - 2;

   echo "<a href='index.php?page=".$paging_location."&p=".$last."'>".$rec_limit." Data Sebelumnya</a>";
}

?>