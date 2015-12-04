<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php echo isset($template_metas) ? $template_metas : ""; ?>
		<?php echo isset($template_links) ? $template_links : ""; ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $ROOT_URL; ?>styles/hybrid.css" />
		<style type="text/css">
		* {
		    font-family: Verdana,"Lantinghei SC","Hiragino Sans GB","Microsoft Yahei",Helvetica,arial,\5b8b\4f53,sans-serif
		}
		body {
		    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		    font-size: 14px;
		    line-height: 1.42857143;
		    color: #333
		}		
		.float-left {
			float: left;
		}
		.left {
			width: 200px;
			height: 100%;
		}
		.center{
			width: 760px;
			height: 100%;
			padding: 10px;
		}
		.right {
			width: 250px;
			height: 100%;
		}
		ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		li > a{
			text-decoration: none;
		}
		#nav {
			padding: 20px 15px;
			background-color: #E3E3E3;
		}
		#nav > ul > li {
			padding: 10px;
		}
		#nav >ul > li > ul {
			padding: 5px;
		}
		.right {
			background-color: #EEE;
		}
		.right > ul > li {
			padding: 5px;
		}
		dl,ol,ul {
		    margin-top: 0
		}

		ol,ul {
		    margin-bottom: 10px
		}

		ol ol,ol ul,ul ol,ul ul {
		    margin-bottom: 0
		}
		a {
			color: #337ab7;
			text-decoration: none
		}

		a:focus,a:hover {
			color: #23527c;
			text-decoration: underline
		}

		a:focus {
			outline: dotted thin;
			outline: -webkit-focus-ring-color auto 5px;
			outline-offset: -2px
		}		
		.left a:hover {
			color: #66d178;
			text-decoration: underline
		}

		.left a:active {
			color: #35b558
		}		
		</style>
	</head>
	<body>
		<?php echo isset($template_bodys) ? $template_bodys : ""; ?>
		<?php echo isset($template_javasctipts) ? $template_javasctipts : ""; ?>
	<script type="text/javascript" src="<?php echo $ROOT_URL; ?>js/highlight.pack.js"></script>
	<script type="text/javascript">
	hljs.initHighlightingOnLoad();
	</script>
	</body>
</html>
