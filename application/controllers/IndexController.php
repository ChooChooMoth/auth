<?php
class IndexController implements IController {
  public function indexAction() {
    $fc = FrontController::getInstance();
    /* Инициализация модели */
    $model = DbModel::getInstance();
	$output = $model->render(USER_DEFAULT_FILE);
    $fc->setBody($output);

  }
}
?>