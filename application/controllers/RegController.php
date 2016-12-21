<?php
class RegController implements IController {
  public function regAction() {
    $fc = FrontController::getInstance();
    /* Инициализация модели */
    $model = DbModel::getInstance();
	$output = $model->render(USER_REG_FILE);
    $fc->setBody($output);

  }
}
?>