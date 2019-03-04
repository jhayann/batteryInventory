   <li class="list-group-item sidebar-separator-title text-muted align-items-center menu-collapsed d-flex">
        <small>MAIN MENU</small>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-dark" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt mr-3"></i>
            <span>Dashbord</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-tasks fa-fw mr-3"></span>
            <span>PRODUCTS</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">OPTION:</h6>
            <a class="dropdown-item" href="?page=<?= _crypt('addproduct') ?>" id="">Add product</a>
            <a class="dropdown-item" href="?page=<?= _crypt('listproduct') ?>">Manage Product</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-boxes fa-fw mr-3"></span>
            <span>SUPPLIER</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">Supplier option:</h6>
           <!-- <a class="dropdown-item" href="?page=addsupplier" data-toggle="modal" data-target="#addcredit">Add supplier</a> -->
           <a class="dropdown-item" href="?page=<?= _crypt('addsupplier')?>">Add supplier</a>
            <a class="dropdown-item" href="?page=<?= _crypt('listsupplier')?>">Manage supplier</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-shopping-cart fa-fw mr-3"></span>
            <span>ORDER</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">Order option:</h6>
           <a class="dropdown-item" href="?page=<?= _crypt('neworder')?>">Product order</a>
            <a class="dropdown-item" href="?page=<?= _crypt('listorder')?>">Order list</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-user fa-fw mr-3"></span>
            <span>Manage Accounts</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">Users Option:</h6>
            <a class="dropdown-item" href="?page=<?= _crypt('UserList')?>">Users List</a>
            <a class="dropdown-item" href="?page=<?= _crypt('adduser')?>">Add Staff</a>

        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark list-group-item" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-chart-line fa-fw mr-3"></span>
            <span>Point of Sales</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 52px, 0px);">
            <h6 class="dropdown-header">POS Option:</h6>
            <a class="dropdown-item" href="?page=<?= _crypt('pos')?>">POS </a>
            <a class="dropdown-item" href="?page=<?= _crypt('listpurchases')?>">Purchases</a>

        </div>
    </li>
   <!-- <li class="nav-item">
        <a class="nav-link bg-dark list-group-item" href="?page=logs">
            <i class="fas fa-fw fa-envelope mr-3"></i>
            <span>Logs</span>

        </a>
    </li> -->