<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="<?=base_url('work_place')?>">DOC TRACER - <?=$this->session->office?></a>

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
                    <a class="dropdown-item" href="<?=base_url('d_create')?>"> <i class="fa fa-file-plus"></i> My Document/s </a>
                    <a class="dropdown-item" href="<?=base_url('log_documents')?>"> <i class="fa fa-list"></i> Log Document/s </a>
                    <a class="dropdown-item" href="<?=base_url('archive')?>"> <i class="fa fa-book"></i> Archive </a>
                    <a class="dropdown-item" href="<?=base_url('outside_document')?>"> <i class="fa fa-file"></i> Outside Document </a>
                </div>
                
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings <i class="fa fa-cog"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?=base_url('admin/change_pass')?>"> Change Password <i class="fa fa-key"></i></a>
                    <a class="dropdown-item" href="<?=base_url('logout')?>"> Logout <i class="fa fa-sign-out"></i></a>
              </div>
            </li>
        </ul>
    </div>
</nav>