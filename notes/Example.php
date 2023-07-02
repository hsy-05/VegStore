<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{

    /**
     * 可被批量賦值的屬性。
     *
     * @var array
     */
    // protected $fillable = ['name'];
    // -------------------------------------------------------------------
    /**
     * 不可被批量賦值的屬性。
     *
     * @var array
     */
    // protected $guarded = ['price'];

    // -------------------------------------------------------------------
    /**
     * 說明模型是否應該被戳記時間。
     *
     * @var bool
     */
    // public $timestamps = false;

    // -------------------------------------------------------------------
    /**
     * 模型的日期欄位儲存格式。
     *
     * @var string
     */
    // protected $dateFormat = 'U';

    // -------------------------------------------------------------------
    // 自訂欄位名稱，並用來儲存時間戳記
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';

    // -------------------------------------------------------------------
    // 取得模型
    //     use App\Flight;

    //     $flights = App\Flight::all();

    //     foreach ($flights as $flight) {
    //         echo $flight->name;
    //     }

    // -------------------------------------------------------------------
    // 新增額外的限制

    // Eloquent 的 all 方法會回傳在模型資料表中所有的結果。
    // 由於每個 Eloquent 模型可以當作一個查詢建構器，所以你可以在查詢中增加規則，然後透過 get 方法來取得結果
    // $flights = App\Flight::where('active', 1)
    //            ->orderBy('name', 'desc')
    //            ->take(10)
    //            ->get();


    // -------------------------------------------------------------------
    //取得單一模型或 Aggregate

    // // 透過主鍵取得模型...
    // $flight = App\Flight::find(1);

    // // 取得符合查詢條件的第一個模型...
    // $flight = App\Flight::where('active', 1)->first();

    // //使用主鍵陣列作為參數來呼叫 find 方法，這會回傳符合記錄的集合
    // $flights = App\Flight::find([1, 2, 3]);

    // -------------------------------------------------------------------
    // Not Found 拋出例外
    // $model = App\Flight::findOrFail(1);

    // $model = App\Flight::where('legs', '>', 100)->firstOrFail();

    // Route::get('/api/flights/{id}', function ($id) {
    //     return App\Flight::findOrFail($id);
    // });

    // -------------------------------------------------------------------
    //     取得 AGGREGATE(總計)
    //     可以使用查詢建構器提供的 count、sum、max 和其他 aggregate 方法。
    //     這些方法會回傳確切的純量值，而不是完整的模型實例

    //$count = App\Flight::where('active', 1)->count();

    // $max = App\Flight::where('active', 1)->max('price');

    // ======================================================================

    #   在 Laravel 的 Models 目錄中，常見的發生事件（events）包括：

    #   creating：在創建新模型之前觸發。可以在此事件中進行一些預處理邏輯，例如對資料進行修改或設置預設值。
    #   created：在模型成功創建之後觸發。可以在此事件中處理一些與創建後相關的邏輯，例如發送通知或觸發其他操作。
    #   updating：在更新模型之前觸發。可以在此事件中進行一些預處理邏輯，例如對資料進行修改或檢查變更。
    #   updated：在模型成功更新之後觸發。可以在此事件中處理一些與更新後相關的邏輯，例如發送通知或觸發其他操作。
    #   deleting：在刪除模型之前觸發。可以在此事件中進行一些預處理邏輯，例如檢查是否允許刪除或處理相關資料的清理。
    #   deleted：在模型成功刪除之後觸發。可以在此事件中處理一些與刪除後相關的邏輯，例如發送通知或觸發其他操作。
    #   restoring：在還原軟刪除的模型之前觸發。如果模型支援軟刪除（Soft Deletes），則可以在此事件中進行還原前的處理邏輯。
    #   restored：在成功還原軟刪除的模型之後觸發。如果模型支援軟刪除（Soft Deletes），則可以在此事件中處理還原後的邏輯。
    #   在模型類別中使用 boot() 方法註冊這些事件的回調函式
    // ======================================================================
    // parent::boot();

    // // 在創建模型之前執行的邏輯
    // static::creating(function ($user) {
    //     // ...
    // });

    // // 在更新模型之前執行的邏輯
    // static::updating(function ($user) {
    //     // ...
    // });

    // // 在刪除模型之前執行的邏輯
    // static::deleting(function ($user) {
    //     // ...
    // });

    // // 其他自定義邏輯...
    // -------------------------------------------------------------------
}
