<?php
session_start();
include_once "koneksi.php";
if (!@$_SESSION['username']) {
  echo "<script>alert('Login Terlebih Dahulu');window.location.href='../index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Laundry</title>


    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">



    

    <!-- <link rel="stylesheet" href="dashboard.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-owesome/6.4.0/css/all.main.css" /> -->
    <link rel="stylesheet" href="css_panel/form.css">
    <!-- <link rel="stylesheet" href="css_panel/panel.css">
    <link rel="stylesheet" href="css_panel/sidebar.css">
    <link rel="stylesheet" href="css_panel/dashboard.css">
    <link rel="stylesheet" href="css_panel/detail_transaksi.css">
    <link rel="stylesheet" href="css_panel/table.css"> --> 



    <style>
        @media print{
            .tidak_print{
                display: none !important;
            }
            .noprint{
                display: none !important;
            }
        }
    </style>
     
    
</head>

<body>


<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion noprint" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-washing-machine">[``]</i>
        </div>
        <div class="sidebar-brand-text mx-1">Clean Laundry </div>
    </a>


    <?php
        if(@$_SESSION['role']=='admin'){
    ?>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="dashboard.php?page=outlet">Outlet</a>
                <a class="collapse-item" href="dashboard.php?page=paket">Paket</a>
                <a class="collapse-item" href="dashboard.php?page=user">User</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
                <a class="nav-link" href="dashboard.php?page=member">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Registrasi Member</span></a>
            </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php?page=transaksi">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Entri Transaksi</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php?page=laporan">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>

    <?php
        }elseif(@$_SESSION['role']=='kasir'){
        ?>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
                <a class="nav-link" href="dashboard.php?page=member">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Registrasi Member</span></a>
            </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php?page=transaksi">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Entri Transaksi</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php?page=laporan">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>
    <?php
        }else{
        ?>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php?page=laporan">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>
    <?php
        }
        ?>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">



        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

               

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['username'];?> || Logout</span>
                        <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="akun/logout.php" >
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">



<!-- AWAL KONTEN -->
<?php
switch (@$_GET['page']) {

    // OUTLET SECTION
  case "outlet":
    include_once "view/view_outlet.php";
    break;
  case "tambah_outlet":
    include_once "tambah/tambah_outlet.php";
    break;
  case "edit_outlet":
    include_once "edit/edit_outlet.php";
    break;


    // MEMBER SECTION
  case "member":
    include_once "view/view_member.php";
    break;
  case "tambah_member":
    include_once "tambah/tambah_member.php";
    break;
  case "edit_member":
    include_once "edit/edit_member.php";
    break;


    // PAKET SECTION
  case "paket":
    include_once "view/view_paket.php";
    break;
  case "tambah_paket":
    include_once "tambah/tambah_paket.php";
    break;
  case "edit_paket":
    include_once "edit/edit_paket.php";
    break;


    // USER SECTION
  case "user":
    include_once "view/view_user.php";
    break;
  case "tambah_user":
    include_once "register/register.php";
    break;
  case "edit_user":
    include_once "register/edit_user.php";
    break;


    // TRANSAKSI SECTION
  case "transaksi":
    include_once "tambah/tambah_transaksi.php";
    break;
  case "laporan":
    include_once "view/view_laporan.php";
    break;
  case "detail_transaksi":
    include_once "tambah/detail_transaksi.php";
    break;

}
?>
<!-- AKHIR KONTEN -->



</div>
<!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Clean Laundry 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

</body>

</html>
