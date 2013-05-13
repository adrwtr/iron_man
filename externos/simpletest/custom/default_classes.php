<?php
/*
 * Created on 25/08/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class BaseTestSuite extends TestSuite {
	
   //private
   var $directory;
   
   function __construct($label = '') {
   	$this->directory = '';      
      $this->TestSuite($label);      
      $this->addTestCases();      
   } 
      
   //public 
   function addClassTest($file) {
      $this->addFile($this->directory . strtr($file, '.', '/') . '.class.php');
   }
      
   //public 
   function addTestCases() {}
}
 
 
class BaseUnitTest extends UnitTestCase {
	
}
 
?>