<?php
/**
 * Created by Mohammad reza Moshaver.
 * Date: 1/23/2018 AD
 * Time: 13:44
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

############ Initial requirements ############
require_once('class/General/General.class.php');
require_once('class/UserGroups/UserGroups.class.php');
require_once('class/Users/Users.class.php');
$General = new General();
$UserGroups = new UserGroups();
$Users = new Users();
############ Initial requirements ############

############ Check login ############
if(isset($_GET['Logout'])){
    $Users->AdminLogout();
}
$CheckLogin = $General->AdminCheckLogin();
############ Check login ############

############ Check Params & Privilege to show page ############
$show_page = '1';
$ParamError = '0';

if($CheckLogin != ''){
    $show_page = '0';
    $CheckLogin_Error = explode('_',$CheckLogin);
    $error = $CheckLogin_Error['1'];
}
############ Check Params & Privilege to show page ############
?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSD2Live - User Dashboard</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/js/core/app.js"></script>

    <script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

    <!-- LazyLoad -->

    <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="assets/js/pages/mail_list.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>


    <!-- LazyLoad -->
</head>

<body class="navbar-top">
<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top bg-slate">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <div class="navbar-right">
            <p class="navbar-text">Morning, Victoria!</p>
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bell2"></i>
                        <span class="visible-xs-inline-block position-right">Activity</span>
                        <span class="status-mark border-orange-400"></span>
                    </a>
                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
                            Activity
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-menu7"></i></a></li>
                            </ul>
                        </div>
                        <ul class="media-list dropdown-content-body width-350">
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-mention"></i></a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
                                    <div class="media-annotation">4 minutes ago</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs"><i class="icon-paperplane"></i></a>
                                </div>
                                <div class="media-body">
                                    Special offers have been sent to subscribed users by <a href="#">Donna Gordon</a>
                                    <div class="media-annotation">36 minutes ago</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-blue btn-rounded btn-icon btn-xs"><i class="icon-plus3"></i></a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch in <span class="text-semibold">Limitless</span> repository
                                    <div class="media-annotation">2 hours ago</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-purple-300 btn-rounded btn-icon btn-xs"><i class="icon-truck"></i></a>
                                </div>
                                <div class="media-body">
                                    Shipping cost to the Netherlands has been reduced, database updated
                                    <div class="media-annotation">Feb 8, 11:30</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-warning-400 btn-rounded btn-icon btn-xs"><i class="icon-bubble8"></i></a>
                                </div>
                                <div class="media-body">
                                    New review received on <a href="#">Server side integration</a> services
                                    <div class="media-annotation">Feb 2, 10:20</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs"><i class="icon-spinner11"></i></a>
                                </div>
                                <div class="media-body">
                                    <strong>January, 2016</strong> - 1320 new users, 3284 orders, $49,390 revenue
                                    <div class="media-annotation">Feb 1, 05:46</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubble8"></i>
                        <span class="visible-xs-inline-block position-right">Messages</span>
                        <span class="status-mark border-orange-400"></span>
                    </a>
                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Messages
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>
                        <ul class="media-list dropdown-content-body">
                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">James Alexander</span>
                                        <span class="media-annotation pull-right">04:58</span>
                                    </a>
                                    <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">4</span>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Margo Baker</span>
                                        <span class="media-annotation pull-right">12:16</span>
                                    </a>
                                    <span class="text-muted">That was something he was unable to do because...</span>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Jeremy Victorino</span>
                                        <span class="media-annotation pull-right">22:48</span>
                                    </a>
                                    <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Beatrix Diaz</span>
                                        <span class="media-annotation pull-right">Tue</span>
                                    </a>
                                    <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Richard Vango</span>
                                        <span class="media-annotation pull-right">Mon</span>
                                    </a>
                                    <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                </div>
                            </li>
                        </ul>
                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /main navbar -->
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default sidebar-fixed">
            <div class="sidebar-content">
                <?php include ('menu.php'); ?>
            </div>
        </div>
        <!-- /main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-6">


                        <div class="content-group">
                            <div class="panel-body bg-blue border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                                <div class="content-group-sm">
                                    <h5 class="text-semibold no-margin-bottom">
                                        <?php echo $_SESSION['AdminName']; ?>
                                    </h5>
                                </div>
                                <a href="#" class="display-inline-block content-group-sm">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-responsive" alt="" style="width: 120px; height: 120px;">
                                </a>
                                <h6 class="no-margin">
                                    <a class="text-white" href="<?php echo $URL; ?>/Panel/page/Admin/Admin_ChangePass.php?ID=<?php echo $_SESSION['AdminID']; ?>">
                                        <i class="icon-cog6 position-left"></i> <u>Change password</u></a>
                                </h6>
                            </div>
                            <div class="panel panel-body no-border-top no-border-radius-top">
                                <div class="form-group mt-5">
                                    <label class="text-semibold">Full name:</label>
                                    <span class="pull-right-sm"><?php echo $_SESSION['AdminName']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label class="text-semibold">Phone number:</label>
                                    <span class="pull-right-sm">+90 541 000 0000</span>
                                </div>
                                <div class="form-group">
                                    <label class="text-semibold">Email:</label>
                                    <span class="pull-right-sm">yzmamo@gmail.com</span>
                                </div>
                                <div class="form-group no-margin-bottom">
                                    <label class="text-semibold">Billing Address:</label>
                                    <span class="pull-right-sm">Shahnaz St. Tabriz, Iran</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Latest Updates<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                                        <div class="heading-elements">
                                            <a href="#" class="heading-text">See all →</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="list-feed">
                                            <li class="border-warning-400">
                                                Status update on project <a href="#">1 Page Parallax Landing Page </a>
                                                <div class="text-muted text-size-small mt-5">12 minutes ago</div>
                                            </li>
                                            <li class="border-warning-400">
                                                Payment received for project <a href="#">Wordpress Theme Customization</a>
                                                <div class="text-muted text-size-small mt-5">2 hours ago</div>
                                            </li>
                                            <li class="border-warning-400">
                                                An invoice created for project <a href="#">Wordpress Theme Customization</a>
                                                <div class="text-muted text-size-small mt-5">8 hours ago</div>
                                            </li>
                                            <li class="border-warning-400">
                                                New quote for your project <a href="#">Wordpress Theme Customization</a>
                                                <div class="text-muted text-size-small mt-5">1 day ago</div>
                                            </li>
                                            <li class="border-warning-400">
                                                You submitted a quote for <a href="#">Wordpress Theme Customization</a>
                                                <div class="text-muted text-size-small mt-5">2 days ago</div>
                                            </li>
                                            <li class="border-warning-400">
                                                Status update on project <a href="#">Angular 2 Web App (SPA)</a>
                                                <div class="text-muted text-size-small mt-5">1 week ago</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title">Latest Messages</h6>

                                <div class="heading-elements not-collapsible">
                                    <span class="label bg-blue heading-text">2 Unread</span>
                                </div>
                            </div>



                            <div class="table-responsive">
                                <table class="table table-inbox">
                                    <tbody data-link="row" class="rowlink">

                                    <tr class="unread">
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="styled">
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">

                                        </td>
                                        <td class="table-inbox-image">
											<span class="btn bg-warning-400 btn-rounded btn-icon btn-xs">
												<span class="letter-icon"></span>
											</span>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="#">
                                                <div class="letter-icon-title text-default">Keyhan A.</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject">Wordpress Theme Customization</div>
                                            <span class="table-inbox-preview">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
                                        </td>

                                        <td class="table-inbox-time">
                                            10:21 pm
                                        </td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="styled">
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">

                                        </td>
                                        <td class="table-inbox-image">
											<span class="btn bg-warning-400 btn-rounded btn-icon btn-xs">
												<span class="letter-icon"></span>
											</span>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="#">
                                                <div class="letter-icon-title text-default">Keyhan A.</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject">Wordpress Theme Customization</div>
                                            <span class="table-inbox-preview">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
                                        </td>

                                        <td class="table-inbox-time">
                                            10:21 pm
                                        </td>
                                    </tr>



                                    <tr>
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="styled">
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">

                                        </td>
                                        <td class="table-inbox-image">
											<span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
												<span class="letter-icon"></span>
											</span>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="#">
                                                <div class="letter-icon-title text-default">Mamo YZ</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject">	1 Page Parallax Landing Page</div>
                                            <span class="table-inbox-preview">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
                                        </td>
                                        <td class="table-inbox-time">
                                            4:28 am
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="styled">
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">

                                        </td>
                                        <td class="table-inbox-image">
											<span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
												<span class="letter-icon"></span>
											</span>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="#">
                                                <div class="letter-icon-title text-default">Mamo YZ</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject">	1 Page Parallax Landing Page</div>
                                            <span class="table-inbox-preview">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
                                        </td>
                                        <td class="table-inbox-time">
                                            4:28 am
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="styled">
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">

                                        </td>
                                        <td class="table-inbox-image">
											<span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
												<span class="letter-icon"></span>
											</span>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="#">
                                                <div class="letter-icon-title text-default">Mamo YZ</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject">	1 Page Parallax Landing Page</div>
                                            <span class="table-inbox-preview">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
                                        </td>
                                        <td class="table-inbox-time">
                                            4:28 am
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox rowlink-skip">
                                            <input type="checkbox" class="styled">
                                        </td>
                                        <td class="table-inbox-star rowlink-skip">

                                        </td>
                                        <td class="table-inbox-image">
											<span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
												<span class="letter-icon"></span>
											</span>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="#">
                                                <div class="letter-icon-title text-default">Mamo YZ</div>
                                            </a>
                                        </td>
                                        <td class="table-inbox-message">
                                            <div class="table-inbox-subject">	1 Page Parallax Landing Page</div>
                                            <span class="table-inbox-preview">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
                                        </td>
                                        <td class="table-inbox-time">
                                            4:28 am
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">My Projects</h5>
                            </div>
                            <div class="panel-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                            <table class="table datatable-basic togglable">
                                <thead>
                                <tr>
                                    <th>Project No.</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                    <th>Updated on</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#P2L0495</td>
                                    <td><a href="project-single.html">Wordpress Theme Customization</a></td>
                                    <td><span class="label border-left-info label-striped">Ongoing Development</span></td>
                                    <td><span class="badge bg-info">45%</span></td>
                                    <td>12/08/2017 - 22:56</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-arrow-right8"></i> Go to Project</a></li>
                                                    <li><a href="#"><i class="icon-envelope"></i> Open Messages</a></li>
                                                    <li><a href="#"><i class="icon-coin-dollar"></i> View Invoices</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#P2L0501</td>
                                    <td><a href="project-single.html">1 Page Parallax Landing Page</a></td>
                                    <td><span class="label border-left-grey label-striped">Awaiting Quote</span></td>
                                    <td><span class="badge bg-grey">0%</span></td>
                                    <td>12/08/2017 - 22:56</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-arrow-right8"></i> Go to Project</a></li>
                                                    <li><a href="#"><i class="icon-envelope"></i> Open Messages</a></li>
                                                    <li><a href="#"><i class="icon-coin-dollar"></i> View Invoices</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#P2L0644</td>
                                    <td><a href="project-single.html">Angular 2 Web App (SPA)</a></td>
                                    <td><span class="label border-left-grey label-striped">Awaiting Payment</span></td>
                                    <td><span class="badge bg-grey">0%</span></td>
                                    <td>12/08/2017 - 22:56</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-arrow-right8"></i> Go to Project</a></li>
                                                    <li><a href="#"><i class="icon-envelope"></i> Open Messages</a></li>
                                                    <li><a href="#"><i class="icon-coin-dollar"></i> View Invoices</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#P2L0334</td>
                                    <td>
                                        <a class="text-grey" href="project-single.html">
                                            <del>4 Pages Personal Website</del>
                                        </a>
                                    </td>
                                    <td><span class="label border-left-danger label-striped">Canceled (Dispute)</span></td>
                                    <td><i class="icon-minus2 text-grey"></i></td>
                                    <td>12/08/2017 - 22:56</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-arrow-right8"></i> Go to Project</a></li>
                                                    <li><a href="#"><i class="icon-envelope"></i> Open Messages</a></li>
                                                    <li><a href="#"><i class="icon-coin-dollar"></i> View Invoices</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#P2L0246</td>
                                    <td><a href="project-single.html">Healthcare Company Landing Page (Joomla)</a></td>
                                    <td><span class="label border-left-success label-striped">Completed</span></td>
                                    <td><span class="badge bg-success">100%</span></td>
                                    <td>12/08/2017 - 22:56</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-arrow-right8"></i> Go to Project</a></li>
                                                    <li><a href="#"><i class="icon-envelope"></i> Open Messages</a></li>
                                                    <li><a href="#"><i class="icon-coin-dollar"></i> View Invoices</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->
</body>

</html>