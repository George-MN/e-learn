<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home page | admin</title>
	<meta name="description" content="Blueprint: A basic template for a page stack navigation effect" />
	<meta name="keywords" content="blueprint, template, html, css, page stack, 3d, perspective, navigation, menu" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css2/demo.css" />
	<link rel="stylesheet" type="text/css" href="css2/component.css" />
	<script src="js2/navig.js"></script>
</head>

<body>
	<!-- navigation -->
	<nav class="pages-nav">
		<div class="pages-nav__item"><a class="link link--page" href="#page-home">Home</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-docu">Users</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-manuals">Activities</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-software">Tests</a></div>
		<div class="pages-nav__item"><a href="index.php">Logout</a></div>
		
	</nav>
	<!-- /navigation-->
	<!-- pages stack -->
	<div class="pages-stack">
		<!-- page -->
		<div class="page" id="page-home">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Admin Panel</h1>
				<?php
                echo "My home page";
			?>
				<p class="bp-header__desc">U can do the following </p>
				<p class="info">
					1. Manage users.<br>
                    2. Manage activities<br>
                    3. Manage Tests
				</p>
			</header>
			
			
		</div>
		<!-- /page -->
		<div class="page" id="page-docu">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Manage Users</h1>
				<?php
                echo "";
			?>
				<p class="bp-header__desc">Types of users </p>
				<p class="info">
					1. Health Staff<br>
                    2. Content writers<br>
                    3. Manage Tests
				</p>
			</header>
			
		</div>
		<div class="page" id="page-manuals">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Manage Activities</h1>
				<?php
                echo "My home page";
			?>
				<p class="bp-header__desc">Types of Activities </p>
				<p class="info">
					1. Content Review.<br>
                    2. Manage activities<br>
                    3. Manage Tests
				</p>
			</header>
			
		</div>
		<div class="page" id="page-software">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Admin Panel</h1>
				<?php
                echo "My home page";
			?>
				<p class="bp-header__desc">U can do the following </p>
				<p class="info">
					1. Manage users.<br>
                    2. Manage activities<br>
                    3. Manage Tests
				</p>
			</header>
			
		</div>
		
	</div>
	<!-- /pages-stack -->
	<button class="menu-button"><span>Menu</span></button>
	<script src="js2/classie.js"></script>
	<script src="js2/main.js"></script>
</body>

</html>
