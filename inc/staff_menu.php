
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