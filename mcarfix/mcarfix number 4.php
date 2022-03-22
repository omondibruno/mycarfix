<!DOCTYPE html>
<html>
<body>

<?php
//services offered are in codes 
$mechanics = array (
  array("verscar",12,13,16,23,34,56,67,45,67,45,67,18),
  array("adx",15,34,42,43,16,13,23,34,56,67,45,13),
  array("vpower",5,243,16,13,23,34,56,67,45,13),
  array("mRover",17,1513,16,23,34,56,67,45,67,45)
);
    
for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$mechanics[$row][$col]."</li>";
  }
  echo "</ul>";
}
?>

</body>
</html>