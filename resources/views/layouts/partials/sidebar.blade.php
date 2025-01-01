<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="/" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/warganetlogo.png') }}" alt="Warganet Logo" class="brand-image">
      <span class="brand-text font-weight-light">WARGANET</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <span class="text-light elevation-2" alt="User Image"><i class="fas fa-user-tie"></i></span>
         </div>
         <div class="info">
            <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->user()->name }}</a>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.index') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                     Customers
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('billing.index') }}" class="nav-link {{ request()->routeIs('billing.index') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>Billings</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('payments.index') }}" class="nav-link {{ request()->routeIs('payments.index') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-cash-register"></i>
                  <p>Payments</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('expenses.index') }}" class="nav-link {{ request()->routeIs('expenses.index') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-money-bill-wave"></i>
                  <p>Expenses</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('withdrawals.index') }}" class="nav-link {{ request()->routeIs('withdrawals.index') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-coins"></i>
                  <p>Withdrawals</p>
               </a>
            </li>

         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>