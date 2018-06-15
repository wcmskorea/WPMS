<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cert;
use App\Models\Config;
use Auth;

class RegisterController extends Controller
{
    public $userModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $userModel)
    {
        $this->middleware('guest');

        $this->userModel = $userModel;
    }

    // 회원 가입 약관 페이지
    public function terms()
    {
        $theme = cache('config.theme')->theme ? : 'default';
        return view("theme.$theme.user.terms");
    }

    // 회원 가입 폼
    public function registerForm(Request $request)
    {
        $rules = [
            'agreeStipulation' => 'required',
            'agreePrivacy' => 'required',
        ];

        $messages = [
            'agreeStipulation.required' => ':attribute에 동의해야 회원가입을 진행할 수 있습니다.',
            'agreePrivacy.required' => ':attribute에 동의해야 회원가입을 진행할 수 있습니다.',
        ];

        $attributes = [
            'agreeStipulation' => '회원가입약관',
            'agreePrivacy' => '개인정보처리방침안내',
        ];

        $this->validate($request, $rules, $messages, $attributes);

        $messages = $this->userModel->addPasswordMessages($this->userModel->messages);
        $params = [
            'agreeStipulation' => $request->agreeStipulation,
            'agreePrivacy' => $request->agreePrivacy,
            'passwordMessage' => $messages['password.regex'],
        ];
        $theme = cache('config.theme')->theme ? : 'default';

        return view("theme.$theme.user.register", $params);
    }

    // 회원 가입 수행
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rulesRegister, User::$messagesRegister);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput(); //Basic POST
        }

        //$user = $this->userModel->joinUser($request);
        //if(!cache('config.email.default')->emailCertify) {
            Auth::login($user);
        //}

        return redirect(route('user.welcome', [
            'nick' => $user->nick,
            'email' => $user->email,
        ]));
    }

    // 회원 가입 정보 입력 폼으로 리다이렉트 하는 메소드
    public function registerFormGet(Request $request)
    {
        // if(!$request->agreeStipulation || !$request->agreePrivacy) {
        //     return alertRedirect('회원가입 약관 동의 페이지를 거치지 않고 회원가입을 진행할 수 없습니다.');
        // }
        $theme = cache('config.theme')->theme ? : 'default';

        return view("theme.$theme.user.register", $request->all());
    }

    // 수동 유효성 검사
    public function customValidate(Request $request)
    {
        $adminConfig = new Config();
        $rulePassword = $adminConfig->getPasswordRuleByConfigPolicy();
        $rules = array_add($this->userModel->rulesRegister, 'password', $rulePassword);
        $messages = $this->userModel->addPasswordMessages($this->userModel->messages);

        return validator($request->all(), $rules, $messages);
    }

    // ajax - 회원 가입 폼 유효성 검사
    public function registerValidate(Request $request)
    {
        $validator = $this->customValidate($request);

        $message = [];
        if($validator->fails()) {
            $message = $validator->errors()->all();
        }

        return [
            'message' => $message
        ];
    }
}
