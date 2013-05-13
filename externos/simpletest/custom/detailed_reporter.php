<?php
/*
 * Created on 25/08/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class HtmlReporterFull extends HtmlReporter {
    
    function __construct() {
        $this->HtmlReporter();
    }
    
    function paintPass($message) {
        parent::paintPass($message);
        print "<span class=\"pass\">Pass</span>: ";
        $breadcrumb = $this->getTestList();
        array_shift($breadcrumb);
        array_shift($breadcrumb);
        print implode(" -&gt; ", $breadcrumb);
        print '<br / >' . "\n";
    }
}

?>