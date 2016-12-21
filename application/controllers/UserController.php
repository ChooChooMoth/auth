<?php
class UserController implements IController {
  public function listAction() {
  	session_start();
    
   	$_SESSION['name'] = $_POST['name'];
  	$_SESSION['pass'] = $_POST['pass'];

	$model = DbModel::getInstance();

  	$user = $model->query("SELECT * FROM users WHERE name='".$_POST['name']."'");
  	$row = $user -> fetch(PDO::FETCH_ASSOC);    

  	if(!empty($row['id']))
  	{
  		if($row['password'] == $_POST['pass'])
  		{
			header('Location: /out/out');
			exit;
		}
		else {
			header('Location: /index/index');
			echo "Incorrect password";
			exit;
		}
	}	
   	else {
   		header('Location: /index/index');
  		echo "There are no user with such name"; 
  		exit;
  	  	}
  }

}
