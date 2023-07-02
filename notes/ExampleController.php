<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    ##插入##
    // //要在資料庫建立一筆新紀錄，只要建立一個新模型實例，並在模型上設定屬性，接著呼叫 save 方法
    public function store(Request $request)
    {

        // // 驗證請求...

        //$flight = new Flight;

        //$flight->name = $request->name;

        //$flight->save();
    }

    // -------------------------------------------------------------------

    //  ##更新##
    // save 方法也可以用於更新資料庫中已經存在的模型。
    // 要更新模型，你必須先取回模型，設定任何你希望更新的屬性，接著呼叫 save 方法。
    // 同樣的，updated_at 時間戳記將會自動被更新，所以不需要手動設定它的值
    // $flight = App\Flight::find(1);

    // $flight->name = 'New Flight Name';

    // $flight->save();


    // -------------------------------------------------------------------
    //   ##批量更新##
    //也可以針對符合給定查詢的任意數量模型執行更新。
    //在這個範例中，所有 active 並且 destination 為 San Diego 的航班，將會被標記為延遲
    // App\Flight::where('active', 1)
    //           ->where('destination', 'San Diego')
    //           ->update(['delayed' => 1]);

    // -------------------------------------------------------------------
    // 如果是從奧克蘭到聖地牙哥的航班，將價格訂為 99 美金。
    // 如果沒有符合的模型，就建立一個。
    // $flight = App\Flight::updateOrCreate(
    //     ['departure' => 'Oakland', 'destination' => 'San Diego'],
    //     ['price' => 99]
    // );

    // -------------------------------------------------------------------
    // ##刪除模型##
    // //在模型實例上呼叫 delete 方法來刪除一個模型：

    // $flight = App\Flight::find(1);

    // $flight->delete();

    // -------------------------------------------------------------------
    // ##透過主鍵刪除存在的模型##
    // //在上述範例中，我們會在呼叫 delete 方法前，從資料庫取得模型。
    // //然而，如果你知道該模型的主鍵，你可以沒有取得模型就刪除它。
    // //呼叫 destroy 方法來達成：

    // App\Flight::destroy(1);

    // App\Flight::destroy([1, 2, 3]);

    // App\Flight::destroy(1, 2, 3);

    // -------------------------------------------------------------------
    // ##透過查詢來刪除模型##
    // // 當然，你也可以在一組模型上執行刪除的語法。
    // // 在這個範例中，我們會刪除所有被標記無效的航班。
    // // 批量刪除類似批量更新，不會觸發刪除模型的任何模型事件：

    // $deletedRows = App\Flight::where('active', 0)->delete();
    // -------------------------------------------------------------------
    // ##軟刪除##
    // // 不會真的從你的資料庫中移除，deleted_at 屬性是在模型上設定並寫入到資料庫。
    // // 如果模型有不能是 null 的 deleted_at 值，該模型將會被軟刪除。
    // use Illuminate\Database\Eloquent\SoftDeletes;
    // use SoftDeletes;

    // /**
    //  * 該屬性會變更為日期。
    //  *
    //  * @var array
    //  */
    // protected $dates = ['deleted_at'];

    // -------------------------------------------------------------------
    // ##migration目錄中新增 deleted_at 欄位##
    // Schema::table('flights', function ($table) {
    //     $table->softDeletes();
    // });

    // -------------------------------------------------------------------
    // # trashed() 進行軟刪除
    // $product->trashed();


    // # 恢復軟刪除
    // $product->restore();

    // # 查詢已軟刪除資料
    // Product::withTrashed();

    // # 真刪除
    // $product->forceDelete();


    // -------------------------------------------------------------------

    // ##SoftDeletes 搭配 Pruning Models 設定定期清除軟刪除##

}
