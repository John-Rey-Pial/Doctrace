<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">DOC TRACER - Admin</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>


    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Documents
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('admin/') ?>"> <i class="fa fa-list"></i> Sample Program Output </a>
                    <a class="dropdown-item" href="<?= base_url('admin/log_documents') ?>"> <i class="fa fa-list"></i> Log Document/s </a>
                    <a class="dropdown-item" href="<?= base_url('admin/outside_log_documents') ?>"> <i class="fa fa-book"></i> Outside Log Document/s </a>
                    <a class="dropdown-item" href="<?= base_url('admin/admin1') ?>"> <i class="fa fa-book"></i> Accounts </a>
                </div>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Settings <i class="fa fa-cog"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url('admin/change_pass') ?>"> Change Password <i class="fa fa-key"></i></a>
                    <a class="dropdown-item" href="<?= base_url('logout') ?>"> Logout <i class="fa fa-sign-out"></i></a>
                </div>
            </li>
        </ul>
    </div>
</nav>