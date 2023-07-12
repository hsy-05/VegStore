@extends('admin.adminPage')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h2 class="text-center">產品管理</h2>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">新增產品</button>
        </div>
    </div>
    <table class="table table-hover text-center table-bordered table-sm">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">產品名稱</th>
                <th scope="col">產品介紹</th>
                <th scope="col">價格</th>
                <th scope="col">產品圖片</th>
                <th scope="col" class="col-2">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                    <td class="align-middle">{{ $product->title }}</td>
                    <td class="align-middle">{{ $product->description }}</td>
                    <td class="align-middle">{{ $product->price }}</td>
                    <td class="align-middle"><img src="{{ asset('/images/uploads/productImage/' . $product->image) }}" style="width: 50px"></td>
                    <td class="justify-content-center align-middle">
                        <div class="d-inline-block">
                            <button type="button" class="assign-modal btn btn-warning" data-toggle="modal"
                                data-target="#assignModal{{ $product->id }}" data-id="{{ $product->id }}">修改</button>
                        </div>

                        <div class="d-inline-block">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('確定刪除嗎？')">刪除</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    {{-- 互動視窗 --}}
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            @include('admin.crudProduct.createModal')
        </div>
    </div>
    @foreach ($products as $product)
        <div class="modal fade" id="assignModal{{ $product->id }}" tabindex="-1" role="dialog"
            aria-labelledby="assignModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                @include('admin.crudProduct.editModal', ['product' => $product])
            </div>
        </div>
    @endforeach

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
