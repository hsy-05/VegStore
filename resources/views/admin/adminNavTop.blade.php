<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('adminPage')}}">購物網站管理者</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav adminNav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productManage')}}">產品管理</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    產品管理
                </a>
                <div class="dropdown-menu bg-dark subDpDown">
                    <a class="dropdown-item text-white" href="{{ route('productManage')}}">產品管理</a>
                    <a class="dropdown-item text-white" href="{{ route('prCategory')}}">產品分類</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">訂單管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">顧客管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">庫存管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">報表管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">促銷管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productPage') }}">回到網站首頁</a>
            </li>
        </ul>
    </div>
</nav>
