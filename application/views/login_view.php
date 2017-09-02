<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>E learning portal | login</title>
        <meta name="description" content="Morphing Buttons Concept: Inspiration for revealing content by morphing the action element" />
        <meta name="keywords" content="expanding button, morph, modal, fullscreen, transition, ui" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/component.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/content.css" />
        <script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
    </head>
    <body>
        <?php
        //login code
        ?>
        <div class="container">
            <!-- Top Navigation -->

            <header class="codrops-header">
                <h1>Welcome to the health E-learning portal</h1>
                <p>get information about health anytime anywhere</p>
                <span class="logerror"><?php echo validation_errors();  
                  
                 
                  
                ?></span>
            </header>
            <section>


                <div class="mockup-content">
                    <p>Pea horseradish azuki bean lettuce avocado asparagus okra.</p>
                   
                    <div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
                        <button type="button">Login</button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-1">
                                    <span class="icon icon-close">Close the dialog</span>
                                    <h2>Login</h2>
                                   
                                    
                                    <?php echo form_open('verifylogin'); ?>
                                   

                                    <label>Email</label><input type="text" required='required' name='email' placeholder='Email'/>
                                    <label>Password</label><input type="password" name='password' required='required'/>
                                    <div class="submit">
                                        <input type="submit"  value="LOGIN" >
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- morph-button -->
                    <strong class="joiner">or</strong>
                    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
                        <button type="button">Signup</button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-2">
                                    <span class="icon icon-close">Close the dialog</span>
                                    <h2>Sign Up</h2>
                                    <form method="post" action = "<?php echo base_url(); ?>verifylogin/signup">


                                        <label>Email</label><input type="text" name='myemail' placeholder='Email' required='required'/>
                                        <label>Password</label><input type="password" name='mypassword' required='required'/>
                                        <label>Repeat Password</label><input type="password" name='mypasswordver' required='required'/>
                                        <div class="submit">
                                            <input type="submit"  value="Sign up" >
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!-- morph-button -->
                                   
                    <p>Kohlrabi radish okra azuki bean corn fava bean mustard tigernut juccama green bean celtuce collard greens avocado quandong.</p>
                </div><!-- /form-mockup -->
            </section>
            <section class="related">

            </section>

            <script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/uiMorphingButton_fixed.js"></script>
            <script>
                (function () {
                    var docElem = window.document.documentElement, didScroll, scrollPosition;

                    // trick to prevent scrolling when opening/closing button
                    function noScrollFn() {
                        window.scrollTo(scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0);
                    }

                    function noScroll() {
                        window.removeEventListener('scroll', scrollHandler);
                        window.addEventListener('scroll', noScrollFn);
                    }

                    function scrollFn() {
                        window.addEventListener('scroll', scrollHandler);
                    }

                    function canScroll() {
                        window.removeEventListener('scroll', noScrollFn);
                        scrollFn();
                    }

                    function scrollHandler() {
                        if (!didScroll) {
                            didScroll = true;
                            setTimeout(function () {
                                scrollPage();
                            }, 60);
                        }
                    }
                    ;

                    function scrollPage() {
                        scrollPosition = {x: window.pageXOffset || docElem.scrollLeft, y: window.pageYOffset || docElem.scrollTop};
                        didScroll = false;
                    }
                    ;

                    scrollFn();

                    [].slice.call(document.querySelectorAll('.morph-button')).forEach(function (bttn) {
                        new UIMorphingButton(bttn, {
                            closeEl: '.icon-close',
                            onBeforeOpen: function () {
                                // don't allow to scroll
                                noScroll();
                            },
                            onAfterOpen: function () {
                                // can scroll again
                                canScroll();
                            },
                            onBeforeClose: function () {
                                // don't allow to scroll
                                noScroll();
                            },
                            onAfterClose: function () {
                                // can scroll again
                                canScroll();
                            }
                        });
                    });

                    // for demo purposes only
                    [].slice.call(document.querySelectorAll('form button')).forEach(function (bttn) {
                        bttn.addEventListener('click', function (ev) {
                        });
                    });
                })();
            </script>
        </div><!-- /container -->
    </body>
</html>