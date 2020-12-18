
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/wp.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>

                            <li>
                                <a href="reqlist.php" aria-expanded="true"><i class="ti-layout-list-thumb"></i><span>Requests List</span></a>
                            </li>

                            <?php
                                if(strcmp($_SESSION['role'],'admin') == 0){
                            ?>
                                <li>
                                <a href="usrlist.php" aria-expanded="true"><i class="ti-user"></i><span>User List</span></a>
                                </li>

                                <li>
                                <a href="recovery.php" aria-expanded="true"><i class="ti-lock"></i><span>Password Recovery</span></a>
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->

    <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                        <!-- <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- header area end -->