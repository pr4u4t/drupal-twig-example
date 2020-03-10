<?php
	namespace Drupal\robco_twig\TwigExtension;

	class HtmlFilter{

		public static function getContent($html,$attr,$value,$elemClass = NULL){
			if(!($dom = new \DOMDocument('1.0', 'UTF-8'))) return -1;
			$dom->loadHTML('<?xml encoding="UTF-8">' . $html);
			if(!($xpath = new \DOMXpath($dom))) return -2;
			if(!($result = $xpath->query("//*[@$attr = '$value']"))) return -3;
			if(!($keepme = $result->item(0))) return -4;
			if(!($tempDom = new \DOMDocument('1.0', 'UTF-8'))) return -5;
			if($elemClass !== NULL && $elemClass != '' && is_string($elemClass)){ 
				$pClass = $keepme->getAttribute("class");
				$keepme->setAttribute("class","$pClass $elemClass");
			}
			if(!($tempImported = $tempDom->importNode($keepme, true))) return -6;
			$tempDom->appendChild($tempImported);
			if(!($newHtml = $tempDom->saveHTML())) return -7;
			return $newHtml;
		}
	}
