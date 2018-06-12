<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Config extends Model
{
    protected $fillable = ['title', 'description', 'keywords', 'agree'];

    public static $rules = [
        'title' => 'bail|required|alpha_dash|string|min:1|max:45',
        'description' => 'bail|required|string|min:1|max:100',
        'keywords' => 'bail|required',
    ];

    public static $messages = [
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

    // 환경 설정 인덱스 페이지에 들어갈 데이터
    public function getConfigIndexParams()
    {
        // $admins = User::where('level', 10)->get();

        return [
            'configWebsite' => cache("config.website"),
        ];
    }

    // 설정을 변경한다.
    public function updateConfig($data, $name='', $theme=0)
    {
        // DB엔 안들어가는 값은 데이터 배열에서 제외한다.
        $data = array_except($data, ['_token', '_method']);
        if($name) {
            Cache::forget("config.$name");
            return $this->updateConfigByOne($name, $data);
        }        

        $configData = [
            'title' => ($data['title']) ? : cache('config.website')->title,
            'description' => ($data['description']) ? : cache('config.website')->description,
            'keywords' => ($data['keywords']) ? : cache('config.website')->keywords,
            'filterwords' => ($data['filterwords']) ? : cache('config.website')->filterwords,
            'ipallow' => ($data['ipallow']) ? : cache('config.website')->ipallow,
            'ipdeny' => ($data['ipdeny']) ? : cache('config.website')->ipdeny,
            'metatag' => ($data['metatag']) ? : '',
            'script' => ($data['script']) ? : '',
            'css' => ($data['css']) ? : '',            
            'fileallow' => ($data['fileallow']) ? : 'gif|jpg|jpeg|png|swf|asx|asf|wmv|wma|mpg|mpeg|mov|avi|mp3|hwp|doc|docx|xls|xlsx|ppt|pptx|zip',
        ];

        // 설정이 변경될 때 캐시를 지운다.
        Cache::forget("config.website");

        return $this->updateConfigByOne('website', $configData);
    }

    public function updateConfigByOne($name, $data)
    {
        $config = Config::where('name', 'config.'. $name)->first();

        // json 타입을 배열로 변경.
        $originalData = (!$config) ? array() : json_decode($config['vars'], true);

        // 업데이트할 설정값을 원래 설정 값에 덮어 씌운다.
        foreach($data as $key => $value) {
            $originalData[$key] = $data[$key];
        }
        
        if(!$config) {
            $config = new Config();
            $config->name = 'config.'. $name;
        }

        Cache::forever("config.". $name, $originalData);

        $config->vars = json_encode($originalData);
        
        return $config->save();
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

    // 회원 가입 설정을 config 테이블에 추가한다.
    public function createConfigWebsite()
    {
        $configData = array (
            'title' => '',
            'description' => '',
            'keywords' => '',
            'filterwords' => '18아,18놈,18새끼,18뇬,18노,18것,18넘,개년,개놈,개뇬,개새,개색끼,개세끼,개세이,개쉐이,개쉑,개쉽,개시키,개자식,개좆,게색기,게색끼,광뇬,뇬,눈깔,뉘미럴,니귀미,니기미,니미,도촬,되질래,뒈져라,뒈진다,디져라,디진다,디질래,병쉰,병신,뻐큐,뻑큐,뽁큐,삐리넷,새꺄,쉬발,쉬밸,쉬팔,쉽알,스패킹,스팽,시벌,시부랄,시부럴,시부리,시불,시브랄,시팍,시팔,시펄,실밸,십8,십쌔,십창,싶알,쌉년,썅놈,쌔끼,쌩쑈,썅,써벌,썩을년,쎄꺄,쎄엑,쓰바,쓰발,쓰벌,쓰팔,씨8,씨댕,씨바,씨발,씨뱅,씨봉알,씨부랄,씨부럴,씨부렁,씨부리,씨불,씨브랄,씨빠,씨빨,씨뽀랄,씨팍,씨팔,씨펄,씹,아가리,아갈이,엄창,접년,잡놈,재랄,저주글,조까,조빠,조쟁이,조지냐,조진다,조질래,존나,존니,좀물,좁년,좃,좆,좇,쥐랄,쥐롤,쥬디,지랄,지럴,지롤,지미랄,쫍빱,凸,퍽큐,뻑큐,빠큐,ㅅㅂㄹㅁ',
            'ipallow' => '',
            'ipdeny' => '',
            'metatag' => '',
            'script' => '',
            'css' => '',
            'fileallow' => 'gif|jpg|jpeg|png|swf|asx|asf|wmv|wma|mpg|mpeg|mov|avi|mp3|hwp|doc|docx|xls|xlsx|ppt|pptx|zip',
        );

        return $this->createConfig('config.website', $configData);
    }
}
