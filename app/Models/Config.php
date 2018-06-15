<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Config extends Model
{
    protected $fillable = ['title', 'description', 'keywords', 'agree'];

    public static $rules1 = [
        'title' => 'bail|required|alpha_dash|string|min:1|max:45',
        'description' => 'bail|required|string|min:1|max:100',
        'keywords' => 'bail|required',
    ];
    public static $messages1 = [
        'title.required' => '사이트 제목은 필수 입력사항 입니다.',
        'title.alpha_dash' => '사이트 제목은 문자, 숫자, 대쉬(-), 언더스코어(_)만 포함할 수 있습니다.',
        'title.min'  => '사이트 제목은 1~45자까지 입력하실 수 있습니다.',
        'title.max'  => '사이트 제목은 1~45자까지 입력하실 수 있습니다.',
        'description.required'  => '사이트 설명은 필수 입력사항 입니다.',
        'description.min'  => '사이트 설명은 1~100자까지 입력하실 수 있습니다.',
        'description.max'  => '사이트 설명은 1~100자까지 입력하실 수 있습니다.',
        'keywords.required'  => '사이트 키워드는 필수 입력사항 입니다.',
        'agree.required'  => '관리자 정보호보 서약은 필수 선택사항  입니다.',        
    ];
    public static $rules2 = [];
    public static $messages2 = [];
    public static $rules3 = [];
    public static $messages3 = [];
    public static $rules4 = [];
    public static $messages4 = [];
    public static $rules5 = [];
    public static $messages5 = [];
    public static $rules6 = [];
    public static $messages6 = [];    

    public function __construct()
    {
        //
    }

    // 비밀번호 정책 설정에 따라 비밀번호 정규식 조합
    public function getPasswordRuleByConfigPolicy() {
        $config = cache("config.user") ? : json_decode(Config::where('name', 'config.user')->first()->vars);
        $rulePieces = array();
        $ruleString = array();
        $ruleArr = [
            'required', 'confirmed',
        ];
        $index = 0;
        if($config->passwordPolicyUpper == 1) {     // 대문자를 1개 이상 포함할 때
            $rulePieces[$index] = '(?=.*[A-Z])';
            $index++;
        }
        if($config->passwordPolicyNumber == 1) {     // 숫자를 1개 이상 포함할 때
            $rulePieces[$index] = '(?=.*\d)';
            $index++;
        }
        if($config->passwordPolicySpecial == 1) {     // 특수문자를 1개 이상 포함할 때
            $rulePieces[$index] = '(?=.*[~`!@#$%^&*()\-_=+])';
            $index++;
        }

        // 비밀번호 규칙 정규식 조합
        $ruleString = '/^(?=.*[a-z])' . implode($rulePieces) . '.{' . $config->passwordPolicyDigits . ',}/';

        array_push($ruleArr,  'regex:' . $ruleString);

        return $ruleArr;
    }

    // 환경 설정 인덱스 페이지에 들어갈 데이터
    public function getConfigIndexParams()
    {
        // $admins = User::where('level', 10)->get();

        return [
            'configWebsite' => cache("config.website"),
            'configPolicy' => cache("config.policy"),
            'configUser' => cache("config.user"),
            'configMail' => cache("config.mail"),
            'configTheme' => cache("config.theme"),
            'configApi' => cache("config.api"),
        ];
    }

    public function createConfigController($configName)
    {
        switch ($configName) {
            case 'website':
                return $this->createConfigWebsite();
            case 'policy':
                return $this->createConfigPolicy();
            case 'user':
                return $this->createConfigUser();
            case 'mail':
                return $this->createConfigMail();
            case 'theme':
                return $this->createConfigTheme();
            case 'api':
                return $this->createConfigApi();
            default:
                # code...
                break;
        }
    }

    // 사이트 설정을 config 테이블에 추가한다.
    public function createConfigWebsite()
    {
        $configData = array (
            'admin' => config('wpms.admin'),
            'title' => config('wpms.title'),
            'description' => config('wpms.description'),
            'keywords' => config('wpms.keywords'),
            'filterwords' => config('wpms.filterwords'),
            'ipallow' => config('wpms.ipallow'),
            'ipdeny' => config('wpms.ipdeny'),
            'metatag' => config('wpms.metatag'),
            'script' => config('wpms.script'),
            'css' => config('wpms.css'),
            'fileallow' => config('wpms.fileallow'),
        );
        return $this->createConfig('config.website', $configData);
    }

    // 운영 설정 가져오기
    public function createConfigPolicy()
    {
        $configData = array (
            'pointUse' => config('wpms.pointUse'),
            'pointLogin' => config('wpms.pointLogin'),
            'pointRegist' => config('wpms.pointRegist'),
            'pointSendMemo' => config('wpms.pointSendMemo'),
            'pointTerm' => config('wpms.pointTerm'),
            'pointRead' => config('wpms.pointRead'),
            'pointWrite' => config('wpms.pointWrite'),
            'pointComment' => config('wpms.pointComment'),
            'pointDownload' => config('wpms.pointDownload'),
            'pointFirstBuy' => config('wpms.pointFirstBuy'),
            'pointBirth' => config('wpms.pointBirth'),
            'pointRenewal' => config('wpms.pointRenewal'),
            'pointRecommend' => config('wpms.pointRecommend'),
        );
        return $this->createConfig('config.policy', $configData);
    }

    // 사용자 설정 가져오기
    public function createConfigUser()
    {
        $configData = array (
            'useSns' => config('wpms.useSns'),
            'useName' => config('wpms.useName'),
            'useWebsite' => config('wpms.useWebsite'),
            'useTel' => config('wpms.useTel'),
            'useMobile' => config('wpms.useMobile'),
            'useAddress' => config('wpms.useAddress'),
            'useSignature' => config('wpms.useSignature'),
            'useCertEamil' => config('wpms.useCertEamil'),
            'useProfile' => config('wpms.useProfile'),
            'defaultLevel' => config('wpms.defaultLevel'),
            'expireNick' => config('wpms.expireNick'),
            'expireDate' => config('wpms.expireDate'),
            'useFilter' => config('wpms.useFilter'),
            'useStipulation' => config('wpms.useStipulation'),
            'usePrivacy' => config('wpms.usePrivacy'),
            'passwordPolicyDigits' => config('wpms.passwordPolicyDigits'),
            'passwordPolicySpecial' => config('wpms.passwordPolicySpecial'),
            'passwordPolicyUpper' => config('wpms.passwordPolicyUpper'),
            'passwordPolicyNumber' => config('wpms.passwordPolicyNumber'),
        );
        return $this->createConfig('config.user', $configData);
    }

    // 메일 설정 가져오기
    public function createConfigMail()
    {
        $configData = array (
            'emailUse' => config('wpms.emailUse'),
            'emailMaster' => config('wpms.emailMaster'),
            'emailMasterName' => config('wpms.emailMasterName'),
            'emailSendMaster' => config('wpms.emailSendMaster'),
            'emailSendWriter' => config('wpms.emailSendWriter'),
            'emailSendRegister' => config('wpms.emailSendRegister'),
        );
        return $this->createConfig('config.mail', $configData);
    }

    // 메일 설정 가져오기
    public function createConfigTheme()
    {
        $configData = array (
            'theme' => config('wpms.theme'),
        );
        return $this->createConfig('config.theme', $configData);
    }

    // API 설정 가져오기
    public function createConfigApi()
    {
        $configData = array (
            'kakaoKey' => null,
            'kakaoSecret' => null,
            'kakaoRedirect' => null,
            'naverKey' => null,
            'naverSecret' => null,
            'naverRedirect' => null,
            'facebookKey' => null,
            'facebookSecret' => null,
            'facebookRedirect' => null,
            'googleKey' => null,
            'googleSecret' => null,
            'googleRedirect' => null,
        );
        return $this->createConfig('config.api', $configData);
    }

    // configs 테이블에 해당 row를 추가한다.
    public function createConfig($name, $configData)
    {
        $config = new Config();
        $config->name = $name;
        $config->vars = json_encode($configData);
        $config->save();
        return $config;
    }

    // 설정을 변경한다.
    public function updateConfig($data, $name='', $theme=0)
    {
        // DB엔 안들어가는 값은 데이터 배열에서 제외한다.
        $data = array_except($data, ['_token', '_method', 'id']);
        if($name) {
            Cache::forget("config.$name");
            return $this->updateConfigByOne($name, $data);
        }

        $configData = [
            'title' => ($data['title']) ? : cache('config.website')->title,
            'description' => ($data['description']) ? : cache('config.website')->description,
            'keywords' => ($data['keywords']) ? : cache('config.website')->keywords,
            'filterwords' => ($data['filterwords']) ? [ 0 => $data['filterwords'] ] : cache('config.website')->filterwords,
            'ipallow' => ($data['ipallow']) ? [ 0 => $data['ipallow'] ] : cache('config.website')->ipallow,
            'ipdeny' => ($data['ipdeny']) ? [ 0 => $data['ipdeny'] ] : cache('config.website')->ipdeny,
            'metatag' => ($data['metatag']) ? : '',
            'script' => ($data['script']) ? : '',
            'css' => ($data['css']) ? : '',            
            'fileallow' => ($data['fileallow']) ? : cache('config.website')->fileallow,
        ];

        // 설정이 변경될 때 캐시를 지운다.
        Cache::forget("config.website");

        return $this->updateConfigByOne('website', $configData);
    }

    public function updateConfigByOne($name, $data)
    {
        $config = Config::where('name', 'config.'. $name)->first();

        // json 타입을 배열로 변경.
        $originalData = json_decode($config->vars, true);
        
        // 업데이트할 설정값을 원래 설정 값에 덮어 씌운다.
        foreach($data as $key => $value) {
            $originalData[$key] = $data[$key];
        }

        $config->vars = json_encode($originalData);

        // 변경된 설정을 decode해서 캐시에 등록한다.
        Cache::forever("config.$name", json_decode($config->vars));
        
        return $config->save();
    }

    // json형태로 저장된 설정을 배열형태로 변환하는 메소드
    public function pullConfig($config) {
        return json_decode($config['vars']);
    }
}
