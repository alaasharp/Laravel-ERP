<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href=""><span>[</span>Dashboard<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="/admin" class="br-menu-link {{$menu_active==1? ' active':''}}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <!---///////      Companies          ///////---->
        <a href="#" class="br-menu-link {{$menu_active==2? ' active':''}}">
          <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-flag-outline tx-24"></i>
            <span class="menu-item-label">Companies</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{url('/admin/companies/create')}}" class="nav-link">Create</a></li>
          <li class="nav-item"><a href="{{route('companies.index')}}" class="nav-link">Show</a></li>
        </ul>

        <!---///////      Employees          ///////---->
        <a href="#" class="br-menu-link {{$menu_active==3? ' active':''}}">
          <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-cloud-outline tx-24"></i>
            <span class="menu-item-label">Employees</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{url('/admin/employees/create')}}" class="nav-link">Create</a></li>
          <li class="nav-item"><a href="{{route('employees.index')}}" class="nav-link">Show</a></li>
        </ul>

      </div><!-- br-sideleft-menu -->

    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->