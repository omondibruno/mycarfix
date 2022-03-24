<?php
$tables = DB::select('SHOW TABLES');
foreach($tables as $table)
{
      echo $table->Tables_in_db_name;
}
DB::select('SHOW TABLES')
?>