<?php
class DbModel extends PDO{

  private static $instance = null;

  public static function getInstance(){
    if (null == self::$instance)
    {
      self::$instance = new self();
    }

      return self::$instance;
  }

  public function __construct()
        {
            $config = include('application/libs/config.php');
            parent::__construct($config['dbdsn'],$config['dbuser'],$config['dbpass']);
            $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('mPDOStatement', array($this)));
        }
  public function multiPrepare($sql, $data)
        {
            $rows = count($data[0]);
            $cols = count($data);
            $rowString = '(' . rtrim(str_repeat('?,', $cols), ',') . '),';
            $valString = rtrim(str_repeat($rowString, $rows), ',');
            return $this->prepare($sql . ' VALUES ' . $valString);
        }
  public function render($file) 
        {
            ob_start(); 
            include($file);
            return ob_get_clean();
        }
}


