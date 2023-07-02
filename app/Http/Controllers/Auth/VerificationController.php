<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
// $this->middleware('auth');
// 此中間件確保使用者必須通過身份驗證才能訪問該控制器的方法。如果使用者未經身份驗證，將被重新導向到登入頁面。

// $this->middleware('signed')->only('verify');
// 此中間件確保只有簽署的 URL 才能訪問名為 "verify" 的方法。在某些情況下，例如確認郵件地址時，通常會使用簽署的 URL 來保護該功能。

// $this->middleware('throttle:6,1')->only('verify', 'resend');
// 此中間件用於限制指定的方法（"verify" 和 "resend"）的請求範率。在此範例中，每分鐘允許最多 6 個請求，超過限制的請求將被暫時拒絕，直到時間間隔（此處為 1 分鐘）結束。
}
