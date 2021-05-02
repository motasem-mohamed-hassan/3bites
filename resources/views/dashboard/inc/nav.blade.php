  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #2774BA">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          {{-- <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li> --}}
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('d.home') }}" class="nav-link text-white">Home</a>
          </li>
          {{-- <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
          </li> --}}
      </ul>

      <!-- SEARCH FORM -->
      {{-- <form class="ml-3 form-inline">
          <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
      </form> --}}

      <!-- Right navbar links -->
      <ul class="ml-auto navbar-nav">
          {{-- <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="mr-3 img-size-50 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  Brad Diesel
                                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">Call me whenever you can...</p>
                              <p class="text-sm text-muted"><i class="mr-1 far fa-clock"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="mr-3 img-size-50 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  John Pierce
                                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">I got your message bro</p>
                              <p class="text-sm text-muted"><i class="mr-1 far fa-clock"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="mr-3 img-size-50 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  Nora Silvester
                                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">The subject goes here</p>
                              <p class="text-sm text-muted"><i class="mr-1 far fa-clock"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
          </li> --}}
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <div id="countNotification">

                      <span
                          class="badge badge-warning navbar-badge">{{ Auth::guard('admin')->user()->unreadNotifications->count() }}</span>
                  </div>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width:400px">
                  <span class="dropdown-item dropdown-header">
                      Notifications</span>
                      <div id="refreshNotification">
                  <div class="dropdown-divider"></div>
                  <div class="dropdown-item">
                      @foreach (Auth::guard('admin')->user()->unreadNotifications as $notification)
                          <i class="fas fa-file mr-2">
                              <span> {{ $notification->data['title'] }}</span>
                              <span> {{ $notification->data['user'] }}</span><br>
                          </i>
                          <span
                              class="float-right text-sm text-muted">{{ $notification->created_at->format('h:i A') }}</span>
                          <br>
                      @endforeach
                  </div>
                </div>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('d.order.waiting') }}" class="dropdown-item dropdown-footer">Go to orders page</a>
              </div>
          </li>
          {{-- <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                      class="fas fa-th-large"></i></a>
          </li> --}}
      </ul>
  </nav>
  <!-- /.navbar -->
