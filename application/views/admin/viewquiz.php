<!DOCTYPE html>
<html>

<head>

    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HEALTH | E-learning</title>

    <link href="<?php echo base_url(); ?>tempcss/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tempcss/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url(); ?>tempcss/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url(); ?>tempcss/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>tempcss/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tempcss/css/style.css" rel="stylesheet">

</head>

<body>
<?php
if(isset($this->session->userdata['logged_in'])){
    $username=($this->session->userdata['logged_in']['username']);
}
else{
    redirect(base_url(),'refresh');
}

?>
    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url(); ?>tempcss/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $username; ?></strong>
                             </span> <span class="text-muted text-xs block">Learner<b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url(); ?>user/profile">Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>user/notes">Notes</a></li>
                              
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>hades/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li >
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span ></span></a>
                       <!--  <ul class="nav nav-second-level">
                            <li class="active"><a href="index.html">Dashboard v.1</a></li>
                            <li ><a href="<?php //echo base_url(); ?>hades/dash2">Dashboard v.2</a></li>
                            <li ><a href="dashboard_3.html">Dashboard v.3</a></li>
                            <li ><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        </ul> -->
                    </li>
                   
                     <li>
                        <a href="<?php echo base_url(); ?>content/mycourses"><i class="fa fa-diamond"></i> <span class="nav-label">My-courses</span><!--  <span class="label label-primary pull-right">NEW</span> --></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">View</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>content/content">Text</a></li>
                            <li><a href="<?php echo base_url(); ?>content/mypdf">PDF</a></li>
                            <li><a href="<?php echo base_url(); ?>content/audio">Audio</a></li>
                            <li><a href="<?php echo base_url(); ?>content/video">Video</a></li>

                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Assignments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>content/create_assignment">Create</a></li>
                            <li><a href="<?php echo base_url(); ?>content/View_assignment">Submitted</a></li>
                            

                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Quiz</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="<?php echo base_url(); ?>content/create_quiz">Create</a></li>
                            
                

                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>content/enrollment">Enrollment</a></li>
                            <li><a href="<?php echo base_url(); ?>content/quiz_taken">Quizes</a></li>
                            

                        </ul>
                    </li>
                    <li>
                       <a href="<?php echo base_url(); ?>content/questions"><i class="fa fa-diamond"></i> <span class="nav-label">Respond to Questions</span><!--  <span class="label label-primary pull-right">NEW</span> --></a>
                   </li>
                   

                    
                   
                   
                  
                   <!--  <li>

                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="search_results.html">Search results</a></li>
                            <li><a href="lockscreen.html">Lockscreen</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="login_two_columns.html">Login v.2</a></li>
                            <li><a href="forgot_password.html">Forget password</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="500.html">500 Page</a></li>
                            <li><a href="empty_page.html">Empty page</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info pull-right">NEW</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="toastr_notifications.html">Notification</a></li>
                            <li><a href="nestable_list.html">Nestable list</a></li>
                            <li><a href="agile_board.html">Agile board</a></li>
                            <li><a href="timeline_2.html">Timeline v.2</a></li>
                            <li><a href="diff.html">Diff</a></li>
                            <li><a href="idle_timer.html">Idle timer</a></li>
                            <li><a href="spinners.html">Spinners</a></li>
                            <li><a href="tinycon.html">Live favicon</a></li>
                            <li><a href="google_maps.html">Google maps</a></li>
                            <li><a href="code_editor.html">Code editor</a></li>
                            <li><a href="modal_window.html">Modal window</a></li>
                            <li><a href="forum_main.html">Forum view</a></li>
                            <li><a href="validation.html">Validation</a></li>
                            <li><a href="tree_view.html">Tree view</a></li>
                            <li><a href="chat_view.html">Chat view</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="draggable_panels.html">Draggable Panels</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="video.html">Video</a></li>
                            <li><a href="tabs_panels.html">Tabs & Panels</a></li>
                            <li><a href="notifications.html">Notifications & Tooltips</a></li>
                            <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="table_basic.html">Static Tables</a></li>
                            <li><a href="table_data_tables.html">Data Tables</a></li>
                            <li><a href="jq_grid.html">jqGrid</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
                            <li><a href="carousel.html">Bootstrap Carusela</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
                    </li>
                    <li class="landing_link">
                        <a target="_blank" href="Landing_page/index.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
                    </li>
                    <li class="special_link">
                        <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                    </li>
                </ul>
 -->
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to health E-learning</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Quiz View</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        
                        <li class="active">
                            <strong>Set quiz</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <?php if ($quiz) {
                        foreach ($quiz as $key) {
                      ?>
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Question <?php echo $key['question_number']?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    
                           <div class="alert alert-info">
                           <h3> <?php echo $key['question']?></h3>
                           </div>
                            <div class="alert alert-danger">
                               <?php echo $key['answer1']?> 
                            </div>
                            <div class="alert alert-danger">
                                <?php echo $key['answer2']?>  
                            </div>
                            <div class="alert alert-danger">
                                <?php echo $key['answer3']?>  
                            </div>
                            <div class="alert alert-danger">
                                <?php echo $key['answer4']?> 
                            </div>
                            <div class="alert alert-success">
                            answer
                             <div class="radio i-checks"><label> <input type="radio" disabled="" checked="" value="option2"> <i></i> <?php echo $key['correct']?></label></div>

                                 
                            </div>

                    </div>
                </div>
            </div>
            </div> 
        </div>
      <?php       
                        }
                    } ?>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>tempcss/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>tempcss/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url(); ?>tempcss/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php echo base_url(); ?>tempcss/js/plugins/toastr/toastr.min.js"></script>

</body>

</html>
