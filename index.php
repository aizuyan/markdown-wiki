<?php
//根路径
defined("ROOT_PATH") or define("ROOT_PATH", __DIR__.DIRECTORY_SEPARATOR);
defined("ROOT_URL") or define("ROOT_URL", 'http://'.$_SERVER['HTTP_HOST'].DIRECTORY_SEPARATOR);
//获取URI
$ROOT_URL = ROOT_URL;

$uri = ltrim($_REQUEST['uri'], "/");

$file = ROOT_PATH.$uri;
if(!is_file($file)){
	//404;
	echo "not found file!!";
}

include_once("./Parsedown.php");
$Parsedown = new Parsedown();

//get include file

$left = $Parsedown->text(file_get_contents(ROOT_PATH."wiki/TOC.md"));
$left = preg_replace("/href=\"(.*?)\"/", "href=\"".ROOT_URL."wiki/$1\"", $left);
$left = '<div id="nav" class="float-left left">'.$left."</div>";
$center = $Parsedown->text(file_get_contents($file));

//generate center right content by center data
$right_contents = [];
$center = preg_replace_callback('/\<h2\>(.*)\<\/h2\>/', function($matchs) use (&$right_contents){
	$id = md5(count($right_contents).$matchs[0]);
	$right_contents[$matchs[1]] = $id;
	return "<h2 id='{$id}'>".$matchs[1]."</h2>";
}, $center);
$center = '<div class="float-left center">'.$center."</div>";

$right = "<div class='float-left right'><ul>";
foreach ($right_contents as $name => $id) {
	$right .= "<li><a href='#{$id}'>{$name}</a></li>";
}
$right .= "</ul></div>";

$template_bodys = $left.$center.$right;

include "template/default.md";
