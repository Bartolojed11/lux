<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('img/ceo1.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ ucfirst(Auth::user()->lname). ', ' .  ucfirst(Auth::user()->fname[0]) .'.' }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @php
        $cloth_list_cat = isset($cloth_list_cat) ? $cloth_list_cat : '';
      @endphp
      <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ ($page == 'index') ? 'active' : '' }}"><a href="/admin/pages"><i class="fa fa-mail-reply-all"></i> <span>Requests</span></a></li>
        <li class="{{  ($page == 'add-cloth') ? 'active' : ''  }}"><a href="/admin/pages/create"><i class="fa fa-plus-circle"></i> <span>Add</span></a></li>
      <li class="treeview {{  !empty($cloth_list_cat) ? 'active menu-open' : '' }} ">
          <a href="#">
            <i class="fa fa-list"></i> <span>Clothes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{ ($cloth_list_cat == 'blazers' ) ? 'active' : '' }}"><a href="/admin/pages/category/blazers">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Blazers</a></li>
              <li class="{{ ($cloth_list_cat == 'dress' ) ? 'active' : '' }}"><a href="/admin/pages/category/dress">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Dress</a></li>
              <li class="{{ ($cloth_list_cat == 'gymwear' ) ? 'active' : '' }}"><a href="/admin/pages/category/gymwear">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Gymwear</a></li>
              <li class="{{ ($cloth_list_cat == 'jackets' ) ? 'active' : '' }}"><a href="/admin/pages/category/jackets">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Jackets</a></li>
              <li class="{{ ($cloth_list_cat == 'jeans' ) ? 'active' : '' }}"><a href="/admin/pages/category/jeans">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Jeans</a></li>
              <li class="{{ ($cloth_list_cat == 'shirts' ) ? 'active' : '' }}"><a href="/admin/pages/category/shirts">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Shirts</a></li>
              <li class="{{ ($cloth_list_cat == 'shorts' ) ? 'active' : '' }}"><a href="/admin/pages/category/shorts">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i>Shorts</a></li>

          </ul>
        </li>
      <li class="{{ $page == 'on-delivery' ? 'active' : ''}}"><a href="/admin/pages/orders/on-delivery"><i class="fa fa-truck"></i> <span>On Delivery</span></a></li>
        
        
        <li class="header">CUSTOMERS</li>
        <li class="{{ ($page == 'customers-list') ? 'active' : '' }}"><a href="/admin/pages/customers/list"><i class="fa fa-users"></i> <span>Customers With Orders</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
