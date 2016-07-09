<?php

?>


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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/demo.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/component.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/config1.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/config2.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/organicfoodicons.css" />

	<script src="<?php echo base_url(); ?>assets/js2/navig.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/home.js"></script>
	<script>

	function callPhpFunc()
        {
        
        $.ajax({
		type: "post",
		url: '<?php echo base_url();?>/courses/clinical',
		cache: false,				
		data: $('#userForm').serialize(),
		success: function(json){						
		try{
		alert('message');		
			var obj = jQuery.parseJSON(json);
			alert( obj['STATUS']);
			alert('message');		
			
		}catch(e) {	
		alert('message');	
			alert('Exception while request..');
		}		
		},
		error: function(){	
							
			alert('Error while request..');
		}
 });
        }

       
    
                

                
    </script>

</head>

<body>
	<!-- navigation -->
	<nav class="pages-nav">
		<div class="pages-nav__item"><a class="link link--page" href="#page-home">Home</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-docu">My topics</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-manuals">Tests</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-training">Videos and Audios</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-software">Chats</a></div>
		<div class="pages-nav__item"><a href="hades.php/logout">Logout </a></div>
		
	</nav>
	<!-- /navigation-->
	<!-- pages stack -->
	<div class="pages-stack">
		<!-- page -->
		<div class="page" id="page-home">
			<div class="contatiner">
		<!-- Blueprint header -->
		
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">Register Course</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">My courses</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Progress Report</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Edit Profile</a></li>
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" id='btnList' href='#'>Clinical courses</a></li>
					<li class="menu__item"><a class="menu__link" href="#">General Courses</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Laboratory Courses</a></li>
					
					
				</ul>
				<!-- Submenu 1-1 -->

				
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2-1"href="#">Completed Courses</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Enrolled Courses</a></li>
					
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Test Undertaken</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Courses</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Certificates</a></li>
				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Tests Reports</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Course Reports</a></li>
					
				</ul>
				<!-- Submenu 3-1 -->
				
				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">General profile</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Personal profile</a></li>
					
				</ul>
				<!-- Submenu 4-1 -->
				

			</div>
		</nav>
		
		<div class="content" id='course_content'>
			<p class="info">Please choose a category</p>
			<!-- Ajax loaded content here -->
		</div>
	</div>
	<!-- /view -->
	<script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/dummydata.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/ge.js"></script>
	<script>
	(function() {
		var menuEl = document.getElementById('ml-menu'),
			mlmenu = new MLMenu(menuEl, {
				// breadcrumbsCtrl : true, // show breadcrumbs
				// initialBreadcrumb : 'all', // initial breadcrumb text
				backCtrl : false, // show back button
				// itemsDelayInterval : 60, // delay between each menu item sliding animation
				onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
			});

		// mobile menu toggle
		var openMenuCtrl = document.querySelector('.action--open'),
			closeMenuCtrl = document.querySelector('.action--close');

		openMenuCtrl.addEventListener('click', openMenu);
		closeMenuCtrl.addEventListener('click', closeMenu);

		function openMenu() {
			classie.add(menuEl, 'menu--open');
		}

		function closeMenu() {
			classie.remove(menuEl, 'menu--open');
		}

		// simulate grid content loading
		var gridWrapper = document.querySelector('.content');

		function loadDummyData(ev, itemName) {
			ev.preventDefault();

			closeMenu();
			callPhpFunc();
			setTimeout(function() {
				classie.remove(gridWrapper, 'content--loading');

				gridWrapper.innerHTML = '<ul class="products"> my name' ;
			}, 700);
		}
	})();
	</script>
			
		</div>
		<!-- /page -->
		<div class="page" id="page-docu">
			<header class="bp-header cf">
				<h1 class="bp-header__title">My Topics</h1>
				
				<p class="bp-header__desc"> </p>
				<p class="info">
					<?php
                echo "Topics";
			?>

				</p>
			</header>
			
		</div>
		<div class="page" id="page-manuals">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Tests</h1>
				<?php
                echo "My home page";
			?>
				<p class="bp-header__desc">Undertake a test on </p>
				<p class="info">
					<?php
                echo "My topics";
			?>
				</p>
			</header>
			
		</div>
		<div class="page" id="page-training">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Videos | Audios</h1>
				
				<p class="bp-header__desc">Topics </p>
				<p class="info">
					<?php
                echo "My home page";
			?>
				</p>
			</header>
			
			
		</div>
		<div class="page" id="page-software">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Chat with friends</h1>
				<?php
                echo "My home page";
			?>
				<p class="bp-header__desc">People online</p>
				<p class="info">
					<?php
                echo "People";
			?>
				</p>
			</header>
			
		</div>
		
	</div>
	<!-- /pages-stack -->
	<button class="menu-button"><span>Menu</span></button>
	<script src="<?php echo base_url(); ?>assets/js2/classie.js"></script>
	<script src="<?php echo base_url(); ?>assets/js2/main.js"></script>
</body>

</html>
