<?php
namespace App\Http\Controllers\Backend\Auth;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mockery\Generator\StringManipulation\Pass\Pass;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASBOARD;
    /**
     * show login form for admin guard
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    /**
     * login for admin guard
     *
     * @return void
     */
    public function do_login(Request $request)
    {   
        //Validate login data
        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);
        //Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //Redirect to dashboard
            return redirect()->intended(route('admin.dashboard'));
        } else {
            //Error when conditon false
            return back();
        }
    }
}
