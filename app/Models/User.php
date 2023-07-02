<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';
    const ROLE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *允許被新增或修改的欄位
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 'name', 'email', 'password', 'address', 'cellphone', 'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *隱藏資料表的欄位，避免在資料庫搜尋時資料被程式撈出來
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *資料表欄位的輸出格式轉換
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ---------------------------------

    // 指定主鍵為 user_id
    protected $primaryKey = 'user_id';

    // 禁用自動遞增
    public $incrementing = false;

    // 主鍵型別為字串
    protected $keyType = 'string';


    protected static function boot()
    {
        parent::boot();

        // 在建立新使用者前觸發 creating 事件
        static::creating(function ($model) {
            // 查詢最後一個建立的使用者
            $latestUser = static::orderBy('created_at', 'desc')->first();

            // 從最後一個使用者的 user_id 中取得數字部分，並轉換為整數
            $count = $latestUser ? (int) substr($latestUser->user_id, 1) : 0;

            // 生成新的 user_id，格式為 "U" 加上三位數的編號（例如 "U001"、"U002"）
            $user_id = 'U' . str_pad((string) ($count + 1), 3, '0', STR_PAD_LEFT);

            // 將生成的 user_id 設定到 $model（即 User 模型）的屬性中
            $model->setAttribute('user_id', $user_id);
        });
    }
}
