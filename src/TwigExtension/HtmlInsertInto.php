<?php

	namespace Drupal\robco_twig\TwigExtension;

        class HtmlInsertInto{

                public static function getContent($html,$pattr,$pvalue,$eTag,$eattr = NULL,$data = NULL){
                        if(!($dom = new \DOMDocument('1.0', 'UTF-8'))) return -1;
                        $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
                        if(!($xpath = new \DOMXpath($dom))) return -2;
			if(!($result = $xpath->query("//*[@$attr = '$value']"))) return -3;
			if(!($parent = $result->item(0))) return -4;
			if(!($node = $dom->createElement($etag,$data))) return -5;
			$parent->appendChild($node);
                       	if(!($newHtml = $dom->saveHTML())) return -6;
                        return $newHtml;
                }
        }
