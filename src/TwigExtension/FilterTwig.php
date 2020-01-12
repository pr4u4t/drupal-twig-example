<?php
	namespace Drupal\robco_twig\TwigExtension; 

	use Drupal\robco_twig\TwigExtension\HtmlFilter;
 
	class FilterTwig extends \Twig_Extension {    
 
  	/**
   	* Generates a list of all Twig filters that this extension defines.
  	*/
  	public function getFilters() {
    		return [
      			new \Twig_SimpleFilter('htmlcontent', array($this, 'htmlContent'))
    		];
  	}
 
  	/**
   	* Gets a unique identifier for this Twig extension.
   	*/
  	public function getName() {
    		return 'robco_twig.twig_extension';
  	}
 
  	/**
   	* Replaces all numbers from the string.
   	*/
  	public static function htmlContent($html,$attr,$value) {
  		return HtmlFilter::getContent($html,$attr,$value); 
  	}
}
