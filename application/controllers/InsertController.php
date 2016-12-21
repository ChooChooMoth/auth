<?php
	class InsertController implements IController {
	  public function insertAction() {
	  	session_start();
	  	$_SESSION['name'] = $_POST['name'];
	  	$_SESSION['pass'] = $_POST['pass'];

	  	$model = DbModel::getInstance();

	  	$user = $model->query("SELECT * FROM users WHERE name='".$_POST['name']."'");
	  	$row = $user -> fetch(PDO::FETCH_ASSOC);

	  	if(empty($row['id']))
	  	{
	  		if($_POST['pass'] == $_POST['passCheck'])
	  		{
	    		$data = array($_POST['name'], $_POST['pass']);
				$stmt = $model->multiPrepare('INSERT INTO users (name, password)', $data);
				$stmt->multiExecute($data);
				header('Location: /out/out');
				exit;
			}
			else{
				header('Location: /reg/reg');
				echo "Passwords do not match";
  	  			exit;
			} 
		}	
  	  	else {
  	  		header('Location: /reg/reg');
	  		echo "This name is already taken";
  	  		exit;
  	  	}



  	  } 		
	}
?>