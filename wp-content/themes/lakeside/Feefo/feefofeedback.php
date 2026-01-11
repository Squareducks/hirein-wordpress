<?php
//ini_set('display_errors', 1); 

//echo phpinfo();

$curdir = getcwd();


// The principal possible parameters passed here are $logon and $limit. 
//  $vendorref can be used if you want the feedback for particular products, for which you have sent unique vendorrefs 
//  $vendorref may contain wildcards  (e.g.   *SKU1234*  would pick up a feedback on 'SKU1234 THURSDAY'
//  You could also pass various other parameters - see the parameters passed at the top of the feedback viewing page on the Feefo site.
// have added mode, can be product or service or both

$logon = array_key_exists('logon', $_GET) ? $_GET['logon'] : null;
$limit = array_key_exists('limit', $_GET) ? $_GET['limit'] : null;
$mode = array_key_exists('mode', $_GET) ? $_GET['mode'] : null;
$vendorref = array_key_exists('vendorref', $_GET) ? $_GET['vendorref'] : null;
$suppressnegatives = array_key_exists('suppressnegatives', $_GET) ? $_GET['suppressnegatives'] : null;
$vendorref="CITIES625*";

$xml_filename = "http://www.feefo.com/feefo/xmlfeed.jsp?logon=wwww.poochandmutt.com/horse%20%26%20pony%20direct";

if ($limit)
	$xml_filename .= "&limit=".$limit;
if ($vendorref)
  $xml_filename.="&vendorref=".$vendorref; 
if ($mode)
  $xml_filename.="&mode=".$mode; 
if ($suppressnegatives)
  $xml_filename.="&negativesanswered=true";


 
if (phpversion() < "5"){
	$xmldoc = domxml_open_file( $xml_filename);
	$xsldoc = domxml_xslt_stylesheet_file ( "http://www.horseandponydirect.com/wp-content/themes/organic_shop/Feefo/feedback.xsl");
	$result = $xsldoc->process($xmldoc);
	echo $result->dump_mem();
}
else
{
	$doc = new DOMDocument();
	$xsl = new XSLTProcessor();
	$doc->load("http://www.horseandponydirect.com/wp-content/themes/organic_shop/Feefo/feedback.xsl");
	$xsl->importStyleSheet($doc);
	$doc->load($xml_filename);
	echo $xsl->transformToXML($doc);
}

?>