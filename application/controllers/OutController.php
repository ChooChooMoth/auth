<?php
class OutController implements IController {
  public function outAction() {
  	session_start();
    $fc = FrontController::getInstance();
    /* Инициализация модели */
    $model = DbModel::getInstance();

	$output = $model->render(USER_LIST_FILE);
    $fc->setBody($output);

  }
}
?>