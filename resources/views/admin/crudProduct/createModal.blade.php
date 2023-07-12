<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">新增產品</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- 在這裡放置產品相關資料的表單 -->
        <form id="addProductForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')

            {{ csrf_field() }}

            <!-- 表單中的欄位 -->
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">描述</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <!-- 其他表單欄位，例如 price, category_id, image -->
            <div class="form-group">
                <label for="price">價格</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="category_id">分類</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">圖片</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>

        <input type="submit" form="addProductForm" class="btn btn-primary" />
    </div>
</div>
