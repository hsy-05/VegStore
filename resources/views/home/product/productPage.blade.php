{{-- 產品顯示頁面 --}}

@extends('home.home')

@section('content')
    {{-- @can('admin')
        <div class="row float-right">
            <button type="button" class="btn btn-primary btn-margin">新增</button>
            <button type="button" class="btn btn-warning btn-margin">修改</button>
            <button type="button" class="btn btn-danger btn-margin">刪除</button>
        </div>
    @endcan --}}
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @foreach ($products as $product)
                    <div class="col my-2">
                        <div class="card h-100 mx-auto border border-dark rounded-3" style="width: 250px;">
                            <div class="overflow-hidden">
                                <img src="{{ asset('/images/uploads/productImage/' . $product->image) }}"
                                    class="d-block w-100 imageHov" alt="Image 1">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="card-text">NT$ {{ $product->price }}元</p>
                                </div>
                                <div class="mt-auto">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light btn-block text-center btn-spCart">
                                            <i class="fa fa-shopping-cart"></i> 加入購物車
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- 顯示分頁連結 -->
    <footer class="d-flex align-items-center justify-content-center">
        <div class="pagination-container row">
            <div class="col-md-6">
                {!! $products->links('pagination::bootstrap-4') !!}
            </div>
            <div>
                <span class="total-items">共 {!! $products->total() !!} 筆</span>
            </div>
        </div>
    </footer>
@endsection
