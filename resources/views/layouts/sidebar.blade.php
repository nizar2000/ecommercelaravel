<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('products') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Product</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('categorie') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Categories</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('contact') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Contact</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('clients.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Users</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('commandes.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Commandes</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="/profile">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span></a>
    </li>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit">Logout</button>
  </form>
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
  
    
    
  </ul>