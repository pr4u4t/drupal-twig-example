<?php
	namespace Drupal\robco_twig\TwigExtension;

	class HtmlFilter{

		public static getContent($html,$attr,$value){
			if(!($dom = new DOMDocument()))	return -1;
			$dom->loadHTML($html);
			if(!($xpath = new DOMXpath($dom))) return -2;
			if(!($result = $xpath->query("//*[@$attr = '$value']"))) return -3;
			if(!($keepme = $result->item(0))) return -4;
			if(!($tempDom = new DOMDocument())) return -5;
			if(!($tempImported = $tempDom->importNode($keepme, true))) return -6;
			$tempDom->appendChild($tempImported);
			if(!($newHtml = $tempDom->saveHTML())) return -7;
			return $newHtml;
	}
