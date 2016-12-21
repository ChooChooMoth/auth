<?php
	  class mPDOStatement extends PDOStatement
    {
      public $dbh;
      protected function __construct($dbh) {
            $this->dbh = $dbh;
        }
      public function multiExecute($data)
        {
            $bindArray = array();
            array_walk_recursive($data, function($item) use (&$bindArray) { $bindArray[] = $item; });
            $this->execute($bindArray);
        }  
}
?>