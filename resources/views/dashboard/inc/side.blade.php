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




                  {{-- <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Orders
                          </p>
                      </a>
                  </li> --}}
                  <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Orders
                          </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: block;">
                          <li class="nav-item">
                              <a href="{{ route('d.order.waiting') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Orders waiting</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('d.order.confirmed') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Orders Confirmed</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  @if (Auth::guard('admin')->user()->is_super)
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
                          <a href="{{ route('d.extra.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-cart-plus"></i>
                              <p>
                                  Extras
                              </p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{ route('d.gift.index') }}" class="nav-link">
                              <i class="nav-icon fas fa-award"></i>
                              <p>
                                  Points
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
                  @endif

                  <li class="nav-header mb-5 pb-5"></li>
                  <li class="nav-item mt-5 pt-5">
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
