<?php

/**
 * Grab the title from a page/URL
 */
class PageGrabber {
    private $url = "";
    
    /**
     * Constructor
     * @param string $url URL to get title from
     */
    public function __construct($url){
        $this->url = $url;
    }
	
    /**
     * Get the title from the url
     * @return string the title of the URL page
     */
    public function get_title() {
	@$content = file_get_contents($this->url, FILE_USE_INCLUDE_PATH); //ignore warnings
	if(strlen($content) > 0) {
            preg_match("/<title.*>(.*)<\/title>/i", $content, $title); // ignore case sensitive
            return $title[1];
	}
	
        return "";
    }
}
