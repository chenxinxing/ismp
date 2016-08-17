  <?php
  session_start();
  require_once "../.././commonlib.php";
  // require_once "../.././".$FILE_WRITER_LIB;

  if (!empty($_POST))
  {
	  $cn = connectDB();
	  $remoteCnQry="select * from tbl_process_db_access where pname='SMSGW'";
	  $res = Sql_exec($cn,$remoteCnQry);
	  $dt = Sql_fetch_array($res);
	
	  $dbtype=$dt['db_type'];
	  $MYSERVER=$dt['db_server'];
	  $MYUID=$dt['db_uid'];
	  $MYPASSWORD=$dt['db_password'];
	  $MYDB=$dt['db_name'];
	  ClosedDBConnection($cn);
	  $remoteCn=connectDB();
	
	  $action = mysql_real_escape_string(htmlspecialchars($_POST['action']));
	  $action_id = mysql_real_escape_string(htmlspecialchars($_POST['action_id']));
	
	  $is_error = 0;
	  $err_field = array();
	  $count = 0;
	  $seperator = "";
	
	  if($action == "insert"){
		  $qry = "insert into `keyword` (";	
		  $values = "";	
	  } elseif($action == "update") {
		  $qry = "update `keyword` set ";		
	  } elseif($action == "delete"){
		  $qry = "delete from `keyword` where `id`='".$action_id."'";
	  }
	
	  foreach($_POST as $pname => $pvalue){
		  $pname = mysql_real_escape_string(htmlspecialchars(trim($pname)));
		  $$pname = trim($pvalue);
			
		  if(!($pname == "action" || $pname == "action_id")){
			  if($count>0){
				  $seperator = ",";
			  }
			
			  if($action == "insert"){
				  $qry .= $seperator.$pname;
				  $values .= $seperator."'".$$pname."'";
			  } elseif($action == "update") {
				  $qry .= $seperator." ".$pname."='".$$pname."'";
			  }
			  $count++;
		  }
	  }
	
	  if($action == "insert"){
		  $qry .= ") values (".$values.")";
	  } elseif($action == "update") {
		  $qry .= " where id = '$action_id'";
	  }
	
	  // echo $qry;
	  //exit;
	  try {
		  $res = Sql_exec($remoteCn,$qry);
	  } catch (Exception $e){
		  $is_error = 1;
		  array_push($err_field,$qry);
	  }
	
	  foreach($err_field as $e_val){
		  $is_error .= "|".$e_val;
	  } 
	
	  echo $is_error;
	
	  if($remoteCn)ClosedDBConnection($remoteCn);
  }

  ?>