<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header("location:"."index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>XC Panel 702+</title>
    <link rel="icon" type="image/x-icon" href="img/log0.png"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_multiple_tables.css">
    <!-- END PAGE LEVEL STYLES -->
  <!-- Custom styles for this template-->
  <style>
       .alert-success
    {
            color: white;
            background-color: #2780e3 !important;
            border:none;
    }
  </style>
 
  <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>

</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="htts://ahdpanels.xyz" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="https://ahdpanels.xyz"><img alt="logo" src="img/log0.png"> <span class="navbar-brand-name">XC W/INTRO MANAGER
</span></a>
            </div>

         

            <ul class="navbar-item flex-row ml-auto nav-dropdowns">
               
               

               
                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <div class="media">
                            <img src="img/log0.png" class="img-fluid" alt="admin-profile">
                            <div class="media-body align-self-center">
                                <h6><span>Hi,</span> <?= $_SESSION['N'] ?></h6>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                        <div class="">
                            
                          
                          
                            <div class="dropdown-item">
                                <a class="" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <div class="topbar-nav header navbar" role="banner">
            <nav id="topbar">
                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="index.html">
                            <img src="img/logo.png" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="https://ahdpanels.xyz" class="nav-link">XC W/INTRO Manager</a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="topAccordion">

                    <li class="menu single-menu <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'app'){echo('active');}?>">
                        <a href="app.php">
                            <div class="">
                                <i class="fa fa-home fa-1x"></i>
                                <span>Main App </span>
                            </div>
                           
                        </a>
                       
                    </li>

                    <li class="menu single-menu <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'extra'){echo('active');}?>">
                        <a href="extra.php">
                            <div class="">
                           <i class="fa fa-wrench mr-1"></i>
                                <span>Extra</span>
                            </div>
                           
                        </a>
                       
                    </li>

                    <li class="menu single-menu <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'extra'){echo('active');}?>">
                        <a href="intro.php">
                            <div class="">
                           <i class="fa fa-film mr-1"></i>
                                <span>Intro</span>
                            </div>
                           
                        </a>
                
                    </li>
                    
                    <li class="menu single-menu <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'VPN'){echo('active');}?>">
                        <a href="vpn.php">
                            <div class="">
                           <i class="fa fa-map-marker mr-1"></i>
                                <span>VPN</span>
                            </div>
                           
                        </a>
                       
                    </li>


                    <li class="menu single-menu <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'Theme'){echo('active');}?>">
                        <a href="theme.php">
                            <div class="">
                    <i class="fa fa-paint-brush mr-1" aria-hidden="true"></i>

                                <span>Themes</span>
                            </div>
                          
                        </a>
                     
                    </li>

                    <li class="menu single-menu <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'announcement'){echo('active');}?>">
                        <a href="announcement.php">
                            <div class="">
                              <i class="fa fa-bullhorn mr-1"></i>
                                <span>Announcement</span>
                            </div>
                      
                        </a>
                   
                    </li>

                    <li class="menu single-menu<?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'maintenance'){echo('active');}?>">
                        <a href="maintenance.php">
                            <div class="">
                               <i class="fa fa-cogs mr-1"></i>
                                <span>Maintenance</span>
                            </div>
                          
                        </a>
                        
                    </li>

                    <li class="menu single-menu<?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'send_message'){echo('active');}?>">
                        <a href="message.php">
                            <div class="">
                                <i class="fa fa-comments mr-1"></i>
                                <span>Message</span>
                            </div>
                          
                            
                        </a>
                         
                       
                    </li>
                    <li class="menu single-menu<?php if(basename($_SERVER["SCRIPT_FILENAME"]) == 'logs'){echo('active');}?>">
                        <a href="logs.php">
                            <div class="">
                                <i class="fa fa-user-secret"></i>
                                <span>IP-Spy</span>
                            </div>
                          
                            
                        </a>
                         
                       
                    </li>
                     <li class="menu single-menu add-menue <?php if(basename($_SERVER["SCRIPT_FILENAME"] , '.php') == 'parental_reset'){echo('active');}?>">
                        <a href="parental_reset.php">
                            <div class="">
                    <i class="fa fa-unlock mr-1"></i> 

                                <span>Parental Password</span>
                            </div>
                          
                            
                        </a>
                         
                       
                    </li>
                     <li class="menu single-menu add-menue <?php if(basename($_SERVER["SCRIPT_FILENAME"] , '.php') == 'update'){echo('active');}?>">
                        <a href="update.php">
                            <div class="">
                               <i class="fa fa-cloud-upload mr-1"></i>
                                <span>Push Update</span>
                            </div>
                          
                            
                        </a>
                         
                       
                    </li>
                     <li class="menu single-menu add-menue <?php if(basename($_SERVER["SCRIPT_FILENAME"] , '.php') == 'user'){echo('active');}?>">
                        <a href="user.php">
                            <div class="">
                               <i class="fa fa-address-book mr-1"></i>
                                <span>Update User/Pass</span>
                            </div>
                          
                            
                        </a>
                         
                       
                    </li>
                     <li class="menu single-menu add-menue <?php if(basename($_SERVER["SCRIPT_FILENAME"] , '.php') == 'language'){echo('active');}?>">
                        <a href="language.php">
                            <div class="">
                               <i class="fa fa-language mr-1"></i>
                                <span>Language</span>
                            </div>
                          
                            
                        </a>
                         
                       
                    </li>
            
                    <li class="menu single-menu add-menue <?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'send_message'){echo('active');}?>">
                        <a href="logout.php">
                            <div class="">
                               <i class="fa fa-sign-out mr-1"></i>
                                <span>Logout</span>
                            </div>
                          
                            
                        </a>
                         
                       
                    </li>

                    <li class="menu single-menu">
                        <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                              <i class="fa fa-plus-circle mr-1"></i>
                                <span>More</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                           
                        </a>
                         <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                            <li>
                                <a href="parental_reset.php"><i class="fa fa-unlock mr-1"></i> Parental Password</a>
                            </li>
                            <li>
                                <a href="update.php"><span><i class="fa fa-cloud-upload mr-1"></i></span>Push Update </a>
                            </li>
                            <li>
                                <a href="user.php"><i class="fa fa-address-book mr-1"></i> Update User/Pass</a>
                            </li>
                            <li>
                                <a href="language.php"><i class="fa fa-language mr-1"></i> Language</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="fa fa-sign-out mr-1"></i> Logout </a>
                            </li>
                          
                        </ul>
                    
                    </li>
                </ul>
            </nav>
        </div>
        <!--  END TOPBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content" style="min-height:480px">
            <div class="layout-px-spacing">