
<?php
 	include("../assets/Connection/Connection.php");
    $seluser="select count(user_id) as id  from tbl_user";
    $data=$conn->query($seluser);
    $row=$data->fetch_assoc();

    $selagency="select count(agency_id) as id  from tbl_agency";
    $data1=$conn->query($selagency);
    $row1=$data1->fetch_assoc();

    $selpack="select count(package_id) as id  from tbl_package";
    $data2=$conn->query($selpack);
    $row2=$data2->fetch_assoc();


    $selbook="select count(booking_id) as id  from tbl_packagebooking";
    $data3=$conn->query($selbook);
    $row3=$data3->fetch_assoc();
    ?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dream Build</title>

        <!-- <link rel="icon" href="img/favicon.png" type="image/png"> -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/css/bootstrap.min.css" />
        <!-- themefy CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/themefy_icon/themify-icons.css" />
        <!-- swiper slider CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/swiper_slider/css/swiper.min.css" />
      
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/select2/css/select2.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/niceselect/css/nice-select.css" />
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/owl_carousel/css/owl.carousel.css" />
        <!-- gijgo css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/gijgo/gijgo.min.css" />
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/font_awesome/css/all.min.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/tagsinput/tagsinput.css" />
        <!-- datatable CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatable/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatable/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatable/css/buttons.dataTables.min.css" />
        <!-- text editor css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/text_editor/summernote-bs4.css" />
        <!-- morris css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/morris/morris.css">
        <!-- metarial icon css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/material_icon/material-icons.css" />

        <!-- menu css  -->
        <link rel="stylesheet" href="../Assets/Template/Admin/css/metisMenu.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/css/style.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/css/colors/default.css" id="colorSkinCSS">
    </head>
    <body class="crm_body_bg">



        <!-- main content part here -->

        <!-- sidebar  -->
        <!-- sidebar part here -->
        <nav class="sidebar">
            <div class="logo d-flex justify-content-between">
                <a href="index.html"><img src="img/logo.png" alt=""></a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
            </div>
            <ul id="sidebar_menu">
                <li class="side_menu_title">
                    <span>Dashboard</span>
                </li>
                <li class="mm-active">
                    <a  href="Homepage.php"  aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/1.svg" alt="">
                        <span>Dashboard</span>
                    </a>
                   
                </li>
                <li class="side_menu_title">
                    <span>Applications</span>
                </li>
                <li class="">
                    <a   class="has-arrow" href="#" aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>Basic Data</span>
                    </a>
                    <ul>
                        <li><a href="District.php">District</a></li>
                        <li><a href="Place.php">Place</a></li>
                        <li><a href="Packagetype.php">PackageType</a></li>
                      
                        <li><a href="NewHotels.php">Hotels</a></li>
                        
                    </ul>
                </li>
                <li class="">
                    <a   class="has-arrow" href="#" aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>Verification</span>
                    </a>
                    <ul>
                        <li><a href="NewAgencylist.php">New</a></li>
                        <li><a href="Acceptedlist.php">Accepted</a></li>
                        <li><a href="Rejectedlist.php">Rejected</a></li>
                    </ul>
                </li>
                <li class="">
                    <a   class="has-arrow" href="#" aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>LogOut</span>
                    </a>
                    <ul>
                        <li><a href="../Login/Login.php">LogOut</a></li>
                        
                    </ul>
                </li>
            </ul>

        </nav>
        <!-- sidebar part end -->
        <!--/ sidebar  -->


        <section class="main_content dashboard_part">
            <!-- menu  -->
           
            <!--/ menu  -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="single_element">
                                <div class="quick_activity">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="quick_activity_wrap">
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="img/icon/College.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter"><?php echo $row["id"] ?></span> </h3>
                                                        <p>User</p>
                                                    </div>
                                                </div>
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="img/icon/Department.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter"><?php echo $row1["id"]?></span> </h3>
                                                        <p>Agencies</p>
                                                    </div>
                                                </div>
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="img/icon/professor.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter"><?php echo $row2["id"]?></span> </h3>
                                                        <p>Packages</p>
                                                    </div>
                                                </div>
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="img/icon/Student.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter"><?php echo $row3["id"]?></span> </h3>
                                                        <p>Booking</p>
                                                    </div>
                                                </div>
                                                
                                                
                                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="white_box card_height_100">
                                <div class="box_header border_bottom_1px  ">
                                    <div class="main-title">
                                        <h3 class="mb_25">Agency</h3>
                                    </div>
                                </div>
                               
                                <div class="staf_list_wrapper sraf_active owl-carousel">
                                    <?php
                                    $sel="select * from tbl_agency";
                                    $datas=$conn->query($sel);
                                    while($rows=$datas->fetch_assoc())
                                    {
                                    ?>
                                    <!-- single carousel  -->
                                    <div class="single_staf">
                                        <div class="staf_thumb">
                                            <img src="../Assets/Files/Userphoto/<?php echo $rows["agency_logo"]?>" alt="">
                                        </div>
                                        <h4><?php echo $rows["agency_name"]?></h4>
                                        <p><?php echo $rows["agency_contact"]?></p>
                                        
                                    </div>
                                   
                                     <?php
                                }
                                     ?>
                                     
                                </div>
                                 
                                
                                       <div class="box_header border_bottom_1px  ">
                                    <div class="main-title">
                                        <h3 class="mb_25">Users</h3>
                                    </div>
                                </div>
                               
                                <div class="staf_list_wrapper sraf_active owl-carousel">
                                    <?php
                                    $sel1="select * from tbl_user";
                                    $datas1=$conn->query($sel1);
                                    while($rows1=$datas1->fetch_assoc())
                                    {
                                    ?>
                                    <!-- single carousel  -->
                                    <div class="single_staf">
                                        <div class="staf_thumb">
                                            <img src="../Assets/Files/Userphoto/<?php echo $rows1["user_photo"]?>" alt="">
                                        </div>
                                        <h4><?php echo $rows1["user_name"]?></h4>
                                        <p><?php echo $rows1["user_contact"]?></p>
                                        
                                    </div>
                                   
                                    <?php 
                                }
                                    ?>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- main content part end -->

        <!-- footer  -->
        <!-- jquery slim -->
        <script src="../Assets/Template/Admin/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="../Assets/Template/Admin/js/popper.min.js"></script>
        <!-- bootstarp js -->
        <script src="../Assets/Template/Admin/js/bootstrap.min.js"></script>
        <!-- sidebar menu  -->
        <script src="../Assets/Template/Admin/js/metisMenu.js"></script>
        <!-- waypoints js -->
        <script src="../Assets/Template/Admin/vendors/count_up/jquery.waypoints.min.js"></script>
        <!-- waypoints js -->
        <script src="../Assets/Template/Admin/vendors/chartlist/Chart.min.js"></script>
        <!-- counterup js -->
        <script src="../Assets/Template/Admin/vendors/count_up/jquery.counterup.min.js"></script>
        <!-- swiper slider js -->
        <script src="../Assets/Template/Admin/vendors/swiper_slider/js/swiper.min.js"></script>
        <!-- nice select -->
        <script src="../Assets/Template/Admin/vendors/niceselect/js/jquery.nice-select.min.js"></script>
        <!-- owl carousel -->
        <script src="../Assets/Template/Admin/vendors/owl_carousel/js/owl.carousel.min.js"></script>
        <!-- gijgo css -->
        <script src="../Assets/Template/Admin/vendors/gijgo/gijgo.min.js"></script>
        <!-- responsive table -->
        <script src="../Assets/Template/Admin/vendors/datatable/js/jquery.dataTables.min.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/dataTables.responsive.min.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/dataTables.buttons.min.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/buttons.flash.min.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/jszip.min.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/pdfmake.min.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/vfs_fonts.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/buttons.html5.min.js"></script>
        <script src="../Assets/Template/Admin/vendors/datatable/js/buttons.print.min.js"></script>

        <script src="../Assets/Template/Admin/js/chart.min.js"></script>
        <!-- progressbar js -->
        <script src="../Assets/Template/Admin/vendors/progressbar/jquery.barfiller.js"></script>
        <!-- tag input -->
        <script src="../Assets/Template/Admin/vendors/tagsinput/tagsinput.js"></script>
        <!-- text editor js -->
        <script src="../Assets/Template/Admin/vendors/text_editor/summernote-bs4.js"></script>

        <script src="../Assets/Template/Admin/vendors/apex_chart/apexcharts.js"></script>

        <!-- custom js -->
        <script src="../Assets/Template/Admin/js/custom.js"></script>

        <script src="../Assets/Template/Admin/vendors/apex_chart/bar_active_1.js"></script>
        <script src="../Assets/Template/Admin/vendors/apex_chart/apex_chart_list.js"></script>
    </body>
</html>