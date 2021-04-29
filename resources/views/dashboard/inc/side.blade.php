  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <img src="{{ asset('admin/dist/img/logo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">3bites</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="{{ route('d.category.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Categories
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('d.product.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Products
                          </p>
                      </a>
                  </li>



                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Orders
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('d.extra.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-info"></i>
                          <p>
                              Extras
                          </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="{{ route('d.user.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Users
                          </p>
                      </a>
                  </li>



                  <li class="nav-item">
                      <a href="{{ route('d.admin.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Admins
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('d.info.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-info"></i>
                          <p>
                              Information
                          </p>
                      </a>
                  </li>


                  <li class="nav-header">العمليات</li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          <i class="nav-icon far fa-circle text-danger"></i>
                          Log Out
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
              </ul>
          </nav>

      </div>
  </aside>
