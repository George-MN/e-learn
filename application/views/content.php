<?php

?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home page | admin</title>
	
	<meta name="" content="" />
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/demo.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/component.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/set1.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/buttons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/cs-skin-underline.css" />
	<script src="<?php echo base_url(); ?>assets/js2/navig.js"></script>
</head>

<body>
	<!-- navigation -->
	<nav class="pages-nav">
		<div class="pages-nav__item"><a class="link link--page" href="#page-home">Home</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-docu"> Add Content</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-training">Uploads</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-manuals">AddTests</a></div>
		<div class="pages-nav__item"><a class="link link--page" href="#page-software">Chats</a></div>
		<div class="pages-nav__item"><a href="hades/logout">Logout </a></div>
		
	</nav>
	<!-- /navigation-->
	<!-- pages stack -->
	<div class="pages-stack">
		<!-- page -->
		<div class="page" id="page-home">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Set new topics</h1>
				
			
			<section class="content">
					<?php
                echo "My home page";
			?>
				  <form action='me.php'>
				<span class="input input--hoshi">

					<input class="input__field input__field--hoshi" type="text" id="input-4" required='required'/>
					<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
						<span class="input__label-content input__label-content--hoshi"><h1>Study Field</h1></span>
					</label>
				</span>
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="text" id="input-5" required='required' />
					<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-5">
						<span class="input__label-content input__label-content--hoshi"><h1>Topic</h1></span>
					</label>
				</span>
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="text" id="input-6" required='required'/>
					<label class="input__label input__label--hoshi input__label--hoshi-color-3" for="input-6">
						<span class="input__label-content input__label-content--hoshi"><h1>Author</h1></span>
					</label>
				</span><br>
				<button class="button button--saqui button--round-l button--text-thick" data-text="Add topic" type ='submit' align='center'>ADD</button><br>
				</form>
			</section>
				
				</header>
				<br>
				<p class="others">Topics </p>
				<p class="info">
					
					
				</p>
			
			
		</div>
		<!-- /page -->
		<div class="page" id="page-docu">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Add Content</h1>
				<section class="content">
					<?php
                echo "<h2> Field F.C.H.P</h2>";
			?>
				  <form action='me.php'>
				  	
				<div>
				<select class="cs-select cs-skin-underline" name='topic'>
					<option value="" disabled selected>Choose a Topic</option>
					<option value="1">Histolology</option>
					<option value="2">Autology</option>
					<option value="3">Autopsy</option>
					<option value="4">Phamacology</option>
					<option value="5">Mediology</option>
				</select>
				</div>
				<br>
				<br>
				
					<textarea  type="textarea" id="" required='required' rows='700' cols='500' name='content'/>
					
					
				</textarea>
				
				
				<button class="button button--saqur button--round-l button--text-thick" data-text="Add topic" type ='submit' align='center'>ADD</button><br>
				</form>
			</section>
				<p class="bp-header__desc"> </p>
				<p class="info">
					<?php
                echo "";
			?>
				</p>
			</header>
			
		</div>
		<div class="page" id="page-training">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Upload Video, Text or Audio</h1>
				<?php
                echo "Topics";
			?>
				<p class="bp-header__desc">Add video on </p>
				<p class="info">
					<?php
                echo "My topics";
			?>
				</p>
			</header>
			
		</div>
		<div class="page" id="page-manuals">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Add Tests</h1>
				
				<p class="bp-header__desc">topics</p>
				<p class="info">
					<?php
                echo "tests";
			?>
				</p>
			</header>
			
			
		</div>
		<div class="page" id="page-software">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Chats</h1>
				<?php
                echo "My home page";
			?>
				<p class="bp-header__desc">Buddies</p>
				<p class="info">
					<?php
                echo "people";
			?>
				</p>
			</header>
			
			
		</div>
		
	</div>
	<!-- /pages-stack -->
	<button class="menu-button"><span>Menu</span></button>
	<script src="<?php echo base_url(); ?>assets/js2/classie.js"></script>
	<script src="<?php echo base_url(); ?>assets/js2/main.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/input.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
		<script src="<?php echo base_url(); ?>assets/js2/selectFx.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
</body>

</html>
