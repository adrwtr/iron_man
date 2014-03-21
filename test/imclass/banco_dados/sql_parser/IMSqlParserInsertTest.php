<?php
namespace test\imclass\apps;

use imclass\apps\AppConcreto;

class AppConcretoTest extends \PHPUnit_Framework_TestCase
{
   var $objAppConcreto;

   function __construct()
   {
      $this->objAppConcreto = new AppConcreto();
   }