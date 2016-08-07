<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HEALTH | Elearning</title>

    <link href="<?php echo base_url(); ?>tempcss/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tempcss/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="<?php echo base_url(); ?>tempcss/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tempcss/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tempcss/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>tempcss/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tempcss/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>tempcss/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/jquery.hvideo.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>tempcss/js/hvideo-debug.js" type="text/javascript" charset="utf-8"></script>
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>tempcss/css/hvideo.css" type="text/css" media="screen" title="HTML5 video base style" charset="utf-8">
        <script type="text/javascript" charset="utf-8">
            $(function(){
                $('#test1').hvideo({
                    //autoresize: true
                });
                // Using hvideo-debug.js we can enable logging alot of stuff to console:
                //hvideo.debug('#test1');
            });
        </script>
        <style type="text/css" media="screen">
            
            #test1 { margin-top:20px; margin-left:20px; }
        </style>


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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $username ?></strong>
                             </span> <span class="text-muted text-xs block">Student<b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>hades/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>hades/index"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span ></span></a>
                       <!--  <ul class="nav nav-second-level">
                            <li class="active"><a href="index.html">Dashboard v.1</a></li>
                            <li ><a href="<?php //echo base_url(); ?>hades/dash2">Dashboard v.2</a></li>
                            <li ><a href="dashboard_3.html">Dashboard v.3</a></li>
                            <li ><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        </ul> -->
                    </li>
                    
                    <li >
                        <a href="<?php echo base_url(); ?>courses/allcourses"><i class="fa fa-diamond"></i> <span class="nav-label">Register courses</span> <!-- <span class="label label-primary pull-right">NEW</span> --></a>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>courses/mycourses"><i class="fa fa-diamond"></i> <span class="nav-label">My-courses</span><!--  <span class="label label-primary pull-right">NEW</span> --></a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Notes</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>courses/content">Text</a></li>
                            <li><a href="graph_morris.html">PDF</a></li>
                            <li><a href="graph_rickshaw.html">Audio</a></li>
                            <li class="active"><a href="graph_rickshaw.html">Video</a></li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Exams </span><!-- <span class="label label-warning pull-right">16/24</span> --></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mailbox.html">Online tests</a></li>
                            <li><a href="mail_detail.html">Quiz</a></li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Progress</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="form_basic.html">Exams</a></li>
                            <li><a href="form_advanced.html">Courses</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Certification</span>  <!-- <span class="pull-right label label-primary">SPECIAL</span> --></a>
                        <ul class="nav nav-second-level">
                            <li><a href="contacts.html">Completion cirt</a></li>
                            <li><a href="profile.html">Merit cert</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Consultation</span> </a>
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to HEALTH E-learning.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
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
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
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
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Modal Window</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Modal Window</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">NEW</span>
                            <h5>IT-01 - Design Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a5.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when looking at its layout. The point of using Lorem Ipsum is that it has.
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">48%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                            <div class="col-sm-4">
                                 <div class="font-bold"></div>
                                    
                            </div>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" align='center'>
                                Launch demo modal
                            </button>
                            <div class="col-sm-4 text-right">
                                <div class="font-bold"></div>
                                     
                            </div>
                            </div>
                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div id="test1" class="hvideo">
                                                
                                                <video width="500" height="200"
                                                       poster="http://hunch.se/tmp/Spotify_-_the_story.jpg"
                                                       autobuffer>
                                                  <source src="<?php echo base_url(); ?>resource/videos/SINACH - WAY MAKER.mp4"
                                                          type="video/mp4">
                                                  <!-- <source src="http://hunch.se/tmp/Spotify_-_the_story_720p.ogv"
                                                          type="video/ogg"> -->
                                                    <div class="fallback">
                                                        You must have an HTML5 capable browser.
                                                    </div>
                                                </video>
                                                <controls>
                                                    <button class="play-pause paused" title="Toggle playback"></button>
                                                    <extended>
                                                        <bar class="position" title="Current position">
                                                            <p class="meta">0:00</p>
                                                        </bar>
                                                        <bar class="total">
                                                            <p class="meta" title="Total length">0:00</p>
                                                        </bar>
                                                        <bar class="buffered"></bar>
                                                        <bar class="unbuffered"></bar>
                                                        <button class="mute-audio" title="Mute/unmute audio"></button>
                                                        <button class="zoom" title="Zoom in/out"></button>
                                                    </extended>
                                                </controls>
                                            </div>

                                           <!--  separate -->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Modal title</h4>
                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                                remaining essentially unchanged.</p>
                                                    <div class="form-group"><label>Sample Input</label> <input type="email" placeholder="Enter your email" class="form-control"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        <!-- separate -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>IT-04 - Marketing Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a4.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a5.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a8.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker.
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">32%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 32%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    24
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    3th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $190,325 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>IT-07 - Finance Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a4.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a8.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                Uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">73%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 73%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    11
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    6th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $560,105 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>IT-02 - Developers Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a8.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a4.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">61%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 61%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    43
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    1th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $705,913 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="label label-warning pull-right">DEADLINE</span>
                            <h5>IT-05 - Administration Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a4.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin.
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">14%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 14%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    8
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    7th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $40,200 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>IT-08 - Lorem ipsum Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a8.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their. ometimes by accident, sometimes on purpose (injected humour and the like).
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">25%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 25%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    25
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    4th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $140,105 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-title">

                            <h5>IT-02 - Graphic Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a4.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                Very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">82%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 82%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    68
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    2th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $701,400 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>IT-06 - Standard  Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a4.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a8.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">26%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 26%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    16
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    8th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $160,100 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>IT-09 - Modern Team</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a8.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                Words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in.
                            </p>
                            <div>
                                <span>Status of current project:</span>
                                <div class="stat-percent">18%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 18%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    53
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    9th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $60,140 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        
        
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
<script src="<?php echo base_url(); ?>tempcss/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>tempcss/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>tempcss/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>tempcss/js/plugins/jeditable/jquery.jeditable.js"></script>

<!-- Data Tables -->
<script src="<?php echo base_url(); ?>tempcss/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>tempcss/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>tempcss/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>tempcss/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


<!-- Custom and plugin javascript -->
<script src="<?php echo base_url(); ?>tempcss/js/inspinia.js"></script>
<script src="<?php echo base_url(); ?>tempcss/js/plugins/pace/pace.min.js"></script>



</body>

</html>
