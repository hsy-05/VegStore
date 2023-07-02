<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="crudCategoryModalLabel">修改分類</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- 在這裡放置產品相關資料的表單 -->
        <form id="editProductForm{{ $category->id }}" action="{{ route('categorys.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @method('POST')

            {{ csrf_field() }}

            <!-- 表單中的欄位 -->
            <div class="form-group">
                <label for="category_name">分類名稱</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name}}" required>
            </div>

        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>

        <input type="submit" form="editProductForm{{ $category->id }}" class="btn btn-primary" />
    </div>
</div>
