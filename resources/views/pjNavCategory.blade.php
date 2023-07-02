{{-- 產品分類 --}}
   <div class="nav flex-column nav-pills navCate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <nav class="navbar navbar-expand-lg px-0 navbar-light bg-light flex-column">

            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="collapse"
                        data-target="#submenu1" aria-expanded="false">
                        時蔬
                    </a>
                    <ul class="nav flex-column collapse" id="submenu1">
                        {{-- <li> <button class="nav-link active">Home</button></li> --}}

                        <li><a class="dropdown-item" href="#" id="v-pills-home-tab" data-toggle="pill"
                                data-target="#v-pills-home" aria-controls="v-pills-home"
                                aria-selected="true">葉菜類</a></li>
                        <li><a class="dropdown-item" href="#" id="v-pills-profile-tab" data-toggle="pill"
                                data-target="#v-pills-profile" aria-controls="v-pills-profile"
                                aria-selected="false">根莖葉</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="collapse"
                        data-target="#submenu2" aria-expanded="false">
                        冷凍食品
                    </a>
                    <ul class="nav flex-column collapse" id="submenu2">
                        <li><a class="dropdown-item" href="#">水餃</a></li>
                        <li><a class="dropdown-item" href="#">披薩</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="collapse"
                        data-target="#submenu3" aria-expanded="false">
                        休閒食品
                    </a>
                    <ul class="nav flex-column collapse" id="submenu3">
                        <li><a class="dropdown-item" href="#">餅乾</a></li>
                        <li><a class="dropdown-item" href="#">蛋糕</a></li>
                        <li><a class="dropdown-item" href="#">蜜餞</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
