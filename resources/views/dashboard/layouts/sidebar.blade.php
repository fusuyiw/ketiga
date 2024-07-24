 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center">
         <div class="sidebar-brand-icon">
             <img src="{{ asset('img\Logo_Kota_Malang.ico') }}" width="30" height="30">
         </div>
         <div class="sidebar-brand-text mx-3">WebGis Kota Malang</div>
     </a>


     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
         <a class="nav-link" href="/dashboard">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         CRUD
     </div>



     <!-- Nav Item - Read -->
     <li class="nav-item">
         <a class="nav-link" href="{{ url('/dashboard/fasum') }}">
             <i class="fa-solid fa-eye"></i>
             <span>Fasum</span></a>
     </li>



     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Front End
     </div>

     <!-- Nav Item - Home -->
     <li class="nav-item">
         <a class="nav-link" href="/" target="_blank">
             <i class="fa-solid fa-house"></i>
             <span>Home</span></a>
     </li>

     <!-- Nav Item - Peta -->
     <li class="nav-item">
         <a class="nav-link" href="/peta" target="_blank">
             <i class="fa-solid fa-map"></i>
             <span>Peta</span></a>
     </li>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
             aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Pages</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Fasum</h6>
                 <a class="collapse-item" href="/Rumah-Sakit" target="_blank">Rumah Sakit</a>
                 <a class="collapse-item" href="/Sarana-Transportasi" target="_blank">Sarana Transportasi</a>
                 <a class="collapse-item" href="/Taman-Kota" target="_blank">Taman Kota</a>
                 <a class="collapse-item" href="/Pasar-Modern" target="_blank">Mall</a>
                 <a class="collapse-item" href="/Polsek" target="_blank">Polsek</a>
                 <a class="collapse-item" href="/Kantor-Pemerintahan" target="_blank">Kantor Pemerintahan</a>
                 <a class="collapse-item" href="/Perguruan-Tinggi" target="_blank">Kampus</a>
             </div>
         </div>
     </li>


 </ul>
 <!-- End of Sidebar -->
