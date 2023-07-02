@extends('admin.adminPage')

@section('content')
    <p>目前的時間是：{{ date('Y-m-d H:i:s') }}</p>
    <div class="row">
        <div class="col text-center">
            <h2 class="text-center">產品管理</h2>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" data-id="1" data-toggle="modal" data-target="#addCategoryModal">新增產品分類</button>
            <button class="btn btn-primary" data-id="1" data-toggle="modal"
                data-target="#addSubCategoryModal">新增產品副分類</button>
        </div>
    </div>
    <table class="table table-hover text-center table-bordered table-sm">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">分類ID</th>
                <th scope="col">分類名稱</th>
                <th scope="col">副分類名稱</th>
                <th scope="col" class="col-2">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorys as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->category_id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        @foreach ($category->subcategories as $subcategory)
                            {{ $subcategory->subcategory_name }}
                        @endforeach
                    </td>
                    <td class="justify-content-center">
                        <div class="d-inline-block">
                            <button type="button" class="assign-modal btn btn-warning" data-toggle="modal"
                                data-target="#assignModal{{ $category->id }}" data-id="{{ $category->id }}">修改</button>
                        </div>

                        <div class="d-inline-block">
                            <form action="#" method="POST">
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

    {{-- [CRUD]產品分類 --}}
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            @include('admin.crudCategory.createModal')
        </div>
    </div>

    <div class="modal fade" id="addSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addSubCategoryModaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            @include('admin.crudCategory.createSubModal')
        </div>
    </div>

    @foreach ($categorys as $category)
        <div class="modal fade" id="assignModal{{ $category->id }}" tabindex="-1" role="dialog"
            aria-labelledby="assignModalLabel{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                @include('admin.crudCategory.editModal', ['category' => $category])
            </div>
        </div>
    @endforeach

    </div>


    <!-- 顯示分頁連結 -->
    <footer class="d-flex align-items-center justify-content-center">
        <div class="pagination-container row">

        </div>
    </footer>
@endsection
