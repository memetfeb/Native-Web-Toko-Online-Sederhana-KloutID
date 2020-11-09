 <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                                <!-- breadcrumb -->
                                <ol class="breadcrumb d-inline-flex pl-0 pt-0">
                                    <li class="breadcrumb-item active"><a class="white-text" href="">SELAMAT DATANG <?php echo $_SESSION['nama_lengkap']; ?></a></li>
                                </ol>
                                <!-- End breadcrumb -->

                                <!-- ini untuk pojok kanan -->

                                <div class="header-button ml-auto">
                                    <!-- ini untuk akun kanan atas -->
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#"><?php echo $_SESSION['nama_lengkap']; ?></a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="editpegawai.php?id=<?php echo $_SESSION['idpegawai']?>">
                                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                                    </div>
                                                </div>


                                                <div class="account-dropdown__footer">
                                                    <a href="logout.php">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>