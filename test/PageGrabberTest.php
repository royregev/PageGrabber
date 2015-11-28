<?php

include ('/../PageGrabber.php');

/**
 * Test PageGrabber class
 */
class PageGrabberTest extends PHPUnit_Framework_TestCase
{
    /**
     * test if the title from the url is the expected title
     * @param string $url the url to get the title from
     * @param string $expectedTitle the expected title to get
     * 
     * @dataProvider providerTestTitleExpected
     */
    public function testTitleExpected($url, $expectedTitle)
    {	
        $p = new PageGrabber($url);
	$result = $p->get_title();
		
	$this->assertEquals($expectedTitle, $result);
    }
	
    public function providerTestTitleExpected()
    {
        return array(
            array("test/testPages/testRegularTitle.php", "This is the title"),
            array("test/testPages/testNumbersTitle.php", "Titl3 w1th Num6e7s"),
            array("test/testPages/testNonEnglishTitle.php", "כותרת בשפה אחרת"),
            array("test/testPages/testSpecialCharactersTitle.php", "#`$%special characters^&*()!'"),
            array("test/testPages/testEmptyTitle.php", ""),
            array("test/testPages/testBackspaceTitle.php", "   "),
            array("", ""),
            array("http://urldontexist.com",""),
            array("https://blazemeter.com", "JMeter, Load &amp; Continuous Performance Testing Platform")
            );
    }
}

?>