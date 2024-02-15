<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="/tambah-data">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->




        <li class="nav-heading">Admin</li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin') ? '' : 'collapsed' }}" href="/admin">
                <i class="bi bi-currency-dollar"></i>
                <span>Data Harga</span>
            </a>
        </li><!-- End Dashboard Nav -->

    </ul>


</aside><!-- End Sidebar-->
