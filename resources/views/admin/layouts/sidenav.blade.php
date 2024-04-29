<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="index2.html">Dashboard2</a></li>
            <li><a href="index3.html">Dashboard3</a></li>
          </ul>
        </li>
        <li><a>Blog <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('admin.blogs.create')}}">Add new</a></li>
            <li><a href="{{route('admin.blogs.index')}}">View All</a></li>
          </ul>
        </li>
        <li><a> Product Categoreies <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('admin.categories.create')}}">Add new</a></li>
            <li><a href="{{route('admin.categories.index')}}">View All</a></li>
          </ul>
        </li>
        <li><a> Products <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
              <li><a href="{{route('admin.products.index')}}">View All</a></li>
              <li><a href="{{route('admin.products.create')}}">Add new module</a></li>
          </ul>
        </li>
        <li><a href="{{route('admin.subscription')}}">Subscriptions</a></li>
        <li><a href="{{route('admin.ContactMessages')}}">ContactMessages</a></li>
        <li><a href="{{route('admin.users.index')}}">Users</a></li>

      </ul>
    </div>


  </div>
      <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div>
