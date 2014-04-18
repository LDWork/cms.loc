<!DOCTYPE  html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="template/js/jquery-latest.js"></script>
	<script src="template/bootstrap/js/bootstrap.min.js"></script>
	<script src="template/js/my_scripts.js"></script>
	<link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="template/styles/styles.css">
	<link rel="stylesheet" href="template/bootstrap/css/bootstrap-responsive.min.css">
	<title><?php echo $SITE_TITLE;?></title>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			</a>
                    <a class="brand" href="#"><?php echo $SITE_NAME; ?></a>
			<div class="nav-collapse collapse">
				<p class="navbar-text pull-right">
					<a href="<?=$SITE_URL?>" class="navbar-link" target="_blanc">На сайт</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="<?=$SITE_URL?>adm/?logout=1" class="navbar-link"><b>Выход</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</p>
				<ul class="nav">
				  <li><a href="<?=$SITE_URL.'/adm/'?>">Главная</a></li>
				  <li><a href="<?=$SITE_URL.'/adm/?view=config_save'?>">Настройки</a></li>
				</ul>
			</div><!--/.nav-collapse -->
        </div>
      </div>
</div><!-- конец шапки     -->
<div class="container">
<div class="row">
