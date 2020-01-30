<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-heart"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin <sup>Q</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
{{-- 
  <!-- Divider -->
  <hr class="sidebar-divider"> --}}

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>


  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Nav Item - Travel Packages -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('travel-package.index') }}">
      <i class="fas fa-plane rotate-n-15 fa-lg"></i>
      <span>Travel packages</span></a>
  </li>

  <!-- Nav Item - Gallery -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('gallery.index') }}">
      <i class="fas fa-images rotate-n-15 fa-lg"></i>
      <span>Gallery</span></a>
  </li>

  <!-- Nav Item - transaction -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('transaction.index') }}">
      <i class="fas fa-money-bill-wave-alt rotate-n-15 fa-lg"></i>
      <span>Transaction</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>