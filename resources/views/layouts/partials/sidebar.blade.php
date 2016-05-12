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
                    <a class="white-text profile-btn" >{{ Auth::user()->name }} </a>
                    <p class="user-roal">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </li>
        <li class="bold"><a href="{{ route('beranda') }}" class="waves-effect waves-cyan"><i class="mdi mdi-view-dashboard"></i> Dashboard</a>
        </li>
        <li class="bold"><a href="{{ route('kategori') }}" class="waves-effect waves-cyan"><i class="mdi mdi-tag-multiple"></i> Kategori</a>
        </li>
        <li class="bold"><a href="{{ route('buku') }}" class="waves-effect waves-cyan"><i class="mdi mdi-book-multiple-variant"></i> Data Buku</a>
<!--         </li>
        <li class="bold"><a href="{{ route('pelanggan') }}" class="waves-effect waves-cyan"><i class="mdi mdi-account-multiple"></i> Data Pelanggan</a>
        </li> -->
        <li class="bold"><a href="{{ route('transaksi') }}" class="waves-effect waves-cyan"><i class="mdi mdi-cart"></i> Transaksi</a>
        <li class="bold"><a href="{{ route('laporan') }}" class="waves-effect waves-cyan"><i class="mdi mdi-shopping"></i> Data Transaksi</a>
        </li>
        <li class="bold"><a href="{{ url('logout') }}" class="waves-effect waves-cyan"><i class="mdi mdi-logout-variant"></i> Logout</a>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi mdi-menu" ></i></a>
</aside>