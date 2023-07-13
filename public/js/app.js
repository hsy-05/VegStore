$(document).ready(function () {
    $('.carousel').carousel({
        interval: 3000 // 自動切換的間隔時間（毫秒）
    });
});

// // [未使用]若網頁下滑時，navTop變為半透明
// $(document).ready(function () {
//     // 監聽視窗的滾動事件
//     $(window).scroll(function () {
//         // 判斷捲軸的位置，當捲軸超過指定的位置時加上半透明樣式，否則移除半透明樣式
//         if ($(this).scrollTop() > 10) {
//             $('.navTop').addClass('navTop-transparent');
//         } else {
//             $('.navTop').removeClass('navTop-transparent');
//         }
//     });
// });

// //[未使用]左邊漂浮的nav
// window.addEventListener('scroll', function () {
//     var div = document.getElementById('v-pills-tab');
//     var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

//     if (scrollTop > 280) {
//         div.style.position = 'fixed';
//         div.style.top = '78px';
//         div.style.width = '130px';
//     } else {
//         div.style.position = 'static';
//     }
// });

//[管理者]修改按鈕
$(document).ready(function () {
    // 監聽點擊修改按鈕事件
    $('.assign-modal').click(function () {
        var productId = $(this).data('id');
        $('#editProductForm' + productId).addClass('active');
    });

    // 監聽表單提交事件
    $('#editProductForm').submit(function () {
        // 僅提交具有 active class 的表單
        if (!$(this).hasClass('active')) {
            return false;
        }
    });
});

// // [未使用] [管理者]點擊nav-link時改變樣式
// $(document).ready(function() {
//     $('.adminNav .nav-item > .nav-link').click(function(){
//         $('.adminNav .nav-item > .nav-link').removeClass('active');
//         $(this).addClass('active');
//     });
// });

// 副dropdown
$(document).ready(function () {
    $('.subDpDown a.dropdown-toggle').on('click', function (e) {
        $(this).next('ul.dropdown-menu').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});


// --------
