<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <!-- <img src="img/admin-user.png" alt="" class="circle responsive-img valign profile-image"> -->
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                    <a class="white-text profile-btn" ><?php echo e(Auth::user()->name); ?> </a>
                    <p class="user-roal"><?php echo e(Auth::user()->email); ?></p>
                </div>
            </div>
        </li>
        <li class="bold"><a href="<?php echo e(route('beranda')); ?>" class="waves-effect waves-cyan"><i class="mdi mdi-view-dashboard"></i> Dashboard</a>
        </li>
        <li class="bold"><a href="<?php echo e(url('logout')); ?>" class="waves-effect waves-cyan"><i class="mdi mdi-logout-variant"></i> Logout</a>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi mdi-menu" ></i></a>
</aside>