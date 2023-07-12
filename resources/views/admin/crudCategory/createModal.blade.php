<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">新增主分類</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- 在這裡放置產品相關資料的表單 -->
        <form id="addCategoryForm" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            {{ csrf_field() }}

            <!-- 新增主分類欄位 -->
            <div class="form-group">
                <label for="category_name">主分類</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>

            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
        <input type="submit" form="addCategoryForm" class="btn btn-primary" value="新增" />
    </div>
</div>

{{-- -------------------------------------- --}}
