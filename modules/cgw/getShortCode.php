<?php
require_once "../.././commonlib.php";

$cn = connectDB();
$qry="SELECT * FROM ismp.tbl_process_db_access WHERE pname=\"CGW\"";
$res = Sql_exec($cn,$qry);
$dt=Sql_fetch_array($res);
$dbtype=$dt["db_type"];
$MYSERVER=$dt["db_server"];
$MYUID=$dt["db_uid"];
$MYPASSWORD=$dt["db_password"];
$MYDB=$dt["db_name"];
ClosedDBConnection($cn);

$remote_cn = connectDB();

$qry = "Select distinct bno from cdr order by bno asc"; 

	
    $res = Sql_exec($remote_cn,$qry);
	$v_arr = array();
                            
    while($dt = Sql_fetch_array($res)){
		$bno = $dt['bno'];
		$v_arr[$bno] = $bno;
	}
	
if($cn)ClosedDBConnection($cn);
if($remote_cn)ClosedDBConnection($remote_cn);

echo json_encode($v_arr);
?>