<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">修改產品</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- 在這裡放置產品相關資料的表單 -->
        <form id="editProductForm{{ $product->id }}" action="{{ route('products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- 表單中的欄位 -->
            <!-- 將產品ID儲存在隱藏的input欄位中 -->
            <input type="text" id="productId" name="productId" value="{{ $product->id }}">

            <div class="form-group">
                <label for="title">標題22</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">描述</label>
                <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>

            </div>
            <!-- 其他表單欄位，例如 price, category_id, image -->
            <div class="form-group">
                <label for="price">價格</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="category_id">分類</label>
                <select class="form-control" id="category_id" name="category_id" value="{{ $product->category_id }}"
                    required>
                    <!-- 根據分類資料填充選項 -->
                    {{-- @foreach ($categories as $category) --}}
                    {{-- <option value="{{ $category->id }}">{{ $category->name }}</option> --}}
                    <option value="蔬菜">蔬菜</option>
                    <option value="水果">水果</option>
                    <option value="冷凍食品">冷凍食品</option>
                    {{-- @endforeach --}}
                </select>
            </div>
            <!-- 刪除隱藏的input欄位 -->
            <div class="form-group">
                <label for="image">圖片</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                <img id="imagePreview" src="{{ asset('/images/uploads/productImage/' . $product->image) }}"
                    style="width: 50px">
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
        <input type="submit" form="editProductForm{{ $product->id }}" class="btn btn-primary" />
    </div>
</div>
