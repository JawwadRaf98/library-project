<?php 
    include('includes/config.php');

?>


<!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary  sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">E-Librabry</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="category.php" >
        <i class="fas fa-fw fa-list-alt"></i>
        <span>Category</span>
    </a>
</li>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="books.php">
        <i class="fas fa-fw fa-book"></i>
        <span>Books</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="user.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<?php if($_SESSION['userData']['super'] == 1) { 
    ?>
    <li class="nav-item">
    <a class="nav-link" href="admin.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Admin</span></a>
</li>

<?php } ?>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>