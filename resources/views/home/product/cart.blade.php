<!-- 顯示購物車內容 -->
@extends('home.home')

@section('content')
    @if (!is_null($cart) && count($cart) > 0)
        <div class="row">
            <div class="col text-center">
                <h2 class="text-center">購物車</h2>
            </div>
        </div>
        <table class="table table-hover text-center table-bordered table-sm">
            <thead>
                <tr class="table-info">
                    <th scope="col">產品名稱</th>
                    <th scope="col">產品圖片</th>
                    <th scope="col">產品數量</th>
                    <th scope="col">價格</th>
                    <th scope="col" class="col-2">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="align-middle">{{ $product->title }}</td>
                        <td class="align-middle"><img src="{{ asset('/images/uploads/productImage/' . $product->image) }}"
                                style="width: 50px">
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <form action="{{ route('cart.decrease', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-secondary me-2">-</button>
                                </form>
                                <span class="mx-2">{{ isset($cart[$product->id]) ? $cart[$product->id]['quantity'] : 0 }}</span>
                                <form action="{{ route('cart.increase', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-secondary">+</button>
                                </form>
                            </div>
                        </td>

                        <td class="align-middle">{{ $product->price }}</td>
                        <td class="align-middle">
                            <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">刪除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="3" class="text-end">總價格：</td>
                    <td>{{ $totalPrice }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>購物車是空的。</p>
    @endif
@endsection
