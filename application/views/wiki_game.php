<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link href="<?php echo base_url('/public/css/mainstyle.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/public/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<script type='text/javascript' src="<?php echo base_url('/public/js/angular.min.js'); ?>"></script>
	<script type='text/javascript' src="<?php echo base_url('/public/js/wikijs.js'); ?>"></script>
	<meta charset="utf-8">
	<title>Wikipedia Game</title>
</head>
<body>

<div id="container" ng-app="wikiGame" ng-controller="wikiCtrl">
	<h1>The Wikipedia Game</h1>
	
	<div id="body">
		<p>Starting at your chosen Wikipedia article, you have to get to a randomly selected article using only Wikipedia links contained in each page.</p>
	</div>
	<label>Article Name: </label>
	<input type="text" name="starttitle" ng-model="startTitle" />
	<span class="errorMessages" ng-init="articleError = true" ng-hide="articleError">Article with this name doesn't exist</span>
	<br><br>
	<div class="customtooltip"> <button ng-click="degreeRandom()">4 Degrees of Random</button>
		<span class="tooltiptext">Chooses random link within article. Process is done 4 times</span>
	</div>
	<div class="customtooltip"> <button ng-click="fullRandom()">Fully Random</button>
		<span class="tooltiptext">Chooses any random article across all of Wikipedia</span>
	</div>
	<br><br>
	<div name="hyperlink" ng-hide="linkDest" ng-init="linkDest = true">
		Destination: <a ng-href="https://en.wikipedia.org/wiki/{{endTitle}}" target="_blank">{{endTitle}}</a>
	</div>
	<br><br>
	<span class="pathtext">{{linkPath}}</span>
	<br><br>
	<input type="text" name="nextlink" id="nextlink" ng-model="nextTitle" ng-keyup="autoComp(nextTitle)" placeholder="Next Link" class="form-control" ng-focus="onFocus()" ng-blur="onBlur()"/>
	<button name="selectlink" ng-click="nextLink()">Select</button>	
	<span class="errorMessages" ng-init="nextError = true" ng-hide="nextError">Article body doesn't reference this</span>
	<br>
	<ul class="list-group pre-scrollable" ng-hide="hideDrop">
		<li class="list-group-item" ng-repeat="foundTitle in dropDown" ng-mousedown="dropMouseDown()" ng-click="selectTitle(foundTitle)">{{foundTitle}}</li>
	</ul>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>