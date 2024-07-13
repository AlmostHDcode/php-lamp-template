<div class="row flex-nowrap" id="sidebar-container">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 text-white bg-dark" id="sidebar-box">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-100" id="sidebar-content">
            <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-sm-inline">Menu</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 mt-5 align-items-center align-items-sm-start" id="main-sidebar-list">
                <li class="nav-item">
                    <a href="/dashboard.php" class="nav-link align-middle px-0">
                        <i class="fa-solid fa-house"></i>
                        <span class="ms-1 d-none d-sm-inline">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#sub1" class="nav-drop-title nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge"></i>
                        <span class="ms-1 d-none d-sm-inline">Submenu1</span>
                        <i class="nav-arrow fa-solid fa-angle-right"></i>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="sub1">
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                Subitem 1
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                Subitem 2
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" data-bs-toggle="collapse" data-bs-target="#sub2" class="nav-drop-title nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge"></i>
                        <span class="ms-1 d-none d-sm-inline">Submenu2</span>
                        <i class="nav-arrow fa-solid fa-angle-right"></i>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="sub2">
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                Subitem 1
                            </a>
                        </li>
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                Subitem 2
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <hr>
            <div id="user-dropdown" class="dropdown pb-4">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt="user profile picture" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['u_name'] ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/?logout=logout">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>