
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addSubCategoryModalLabel">新增副分類</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- 在這裡放置產品相關資料的表單 -->
        <form id="addSubCategoryForm" action="{{ route('subcategorys.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            {{ csrf_field() }}

            <!-- 表單中的欄位 -->
            <div class="form-group">
                <label for="category_id">主分類</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- 新增副分類欄位 -->
            <div class="form-group">
                <label for="subcategory_name">副分類名稱</label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" required>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
        <input type="submit" form="addSubCategoryForm" class="btn btn-primary" value="新增" />
    </div>
</div>
