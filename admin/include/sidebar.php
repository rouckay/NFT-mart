 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-book">
             </i>
         </div>
         <div class="sidebar-brand-text mx-3">PUBG Dokon</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <li class="nav-item ">
         <a class="nav-link" href="add_product.php">
             <i class="fas fa-fw fa-plus"></i>
             <span>Add Product</span></a>
     </li>
     <li class="nav-item ">
         <a class="nav-link" href="all_products.php">
             <i class="fas fa-fw fa-list"></i>
             <span>All Products</span></a>
     </li>
     <li class="nav-item ">
         <a class="nav-link" href="add_cat.php">
             <i class="fas fa-fw fa-plus"></i>
             <span>Add Category</span></a>
     </li>
     <li class="nav-item ">
         <a class="nav-link" href="categorieslist.php">
             <i class="fas fa-fw fa-list"></i>
             <span>All Categories</span></a>
     </li>
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
             aria-controls="collapseOne">
             <i class="fas fa-fw fa-users"></i>
             <span>Members</span>
         </a>
         <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Members All CRUD Exits:</h6>
                 <a class="collapse-item" href="all_members.php">Member List</a>
                 <a class="collapse-item" href="../signup.php">Add Member</a>
                 <a class="collapse-item" href="online_members.php">List Of Online Member</a>
             </div>
         </div>
     </li>
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Components</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Custom Components:</h6>
                 <a class="collapse-item" href="Home_page_background.php">Home Page Background</a>
                 <a class="collapse-item" href="buttons.php">Buttons</a>
                 <a class="collapse-item" href="cards.php">Cards</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Utilities</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Custom Utilities:</h6>
                 <a class="collapse-item" href="utilities-color.php">Colors</a>
                 <a class="collapse-item" href="utilities-border.php">Borders</a>
                 <a class="collapse-item" href="utilities-animation.php">Animations</a>
                 <a class="collapse-item" href="utilities-other.php">Other</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Addons
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
             aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Pages</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Login Screens:</h6>
                 <a class="collapse-item" href="login.php">Login</a>
                 <a class="collapse-item" href="register.php">Register</a>
                 <a class="collapse-item" href="forgot-password.php">Forgot Password</a>
                 <div class="collapse-divider"></div>
                 <h6 class="collapse-header">Other Pages:</h6>
                 <a class="collapse-item" href="404.php">404 Page</a>
                 <a class="collapse-item" href="blank.php">Blank Page</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="charts.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="tables.php">
             <i class="fas fa-fw fa-table"></i>
             <span>Tables</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

     <!-- Sidebar Message 
<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>PUBG</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="">Upgrade to Pro!</a> 
</div>
-->
 </ul>