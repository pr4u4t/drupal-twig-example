<?php
	namespace Drupal\robco_twig\TwigExtension; 

	use Drupal\robco_twig\TwigExtension\HtmlFilter;
 
	class FilterTwig extends \Twig_Extension {    
 
  	/**
   	* Generates a list of all Twig filters that this extension defines.
  	*/
  	public function getFilters() {
    		return [
			new \Twig_SimpleFilter('htmlcontent', array($this, 'htmlContent')),
			new \Twig_SimpleFilter('insertinto', array($this, 'htmlInsertInto'))
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
  	public static function htmlContent($html,$attr,$value,$elemClass = NULL) {
  		return HtmlFilter::getContent($html,$attr,$value,$elemClass); 
	}

	public static function htmlInsertInto($html,$pattr,$pvalue,$eTag,$eattr = NULL,$data = NULL){
		return HtmlInsertInto::getContent($html,$pattr,$pvalue,$eTag,$eattr,$data);
	}
}
