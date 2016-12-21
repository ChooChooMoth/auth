<?php
class BbController implements IController {
  public function bbAction() {
	session_start();
	session_destroy();
	header('Location: /index/index');
  }
}
?>