    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- search form (Optional) -->
        <form  method="get" id='searchForm' action="{{ route('view') }}" class="sidebar-form">
          <div class="input-group">
            <input type="text" autocomplete="off"  name='search' data-provide="typeahead" id='search' class="form-control"  placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit"   class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div style="padding-left: 5px; color:white;">
            <label style="padding-top: 5px" >Filter</label>
            <div class="checkbox">
              <label>
                <input  type="radio"  class="flat-green"  name='cb_option' id='cb_option' <?php  if(!isset($_REQUEST['cb_option']) ||  @$_REQUEST['cb_option'] == 1)
                echo "checked" ?> value="1">
                Reference Number
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input  type="radio"  name='cb_option' id='cb_option' <?php if(isset($_REQUEST['cb_option']) &&  $_REQUEST['cb_option'] == 2)
                echo "checked" ?>  value="2" >
                Customer
              </label>
            </div>
            <div class="checkbox" >
              <label>
                <input type="radio"   name='cb_option' id='cb_option' <?php if(isset($_REQUEST['cb_option']) &&  $_REQUEST['cb_option'] == 3)
                echo "checked" ?>  value="3" >
                Message
              </label>
            </div>
          </div>

        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header">Main Menu</li>
          <!-- Optionally, you can add icons to the links -->
          <li><a href='{{ route('home') }}'><i class="fa fa-home"></i> <span>Home</span></a></li>

          <li><a href=''><i class="fa fa-user"></i> <span>Customers</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Plan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=''><span>Monthly Plan</span></a></li>
              <li><a href=''><span>Misc</span></a></li>
              
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>Billing</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=''>Generate</a></li>
              <li><a href=''>SMS</a></li>
              <li><a href=''>Summary Report</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-gears"></i> <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=''>System</a></li>
              <li><a href=''>Notifications</a></li>
            </ul>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>