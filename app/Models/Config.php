<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Config extends Model
{
    protected $fillable = ['title', 'description', 'keywords', 'agree'];

    public static $rules = [
        // 'title' => 'bail|required|alpha_dash',
        'title' => 'required|string|min:1|max:45',
        'description' => 'required|string|min:1|max:100',
        'keywords' => 'required',
    ];

    public static $messages = [
        'title.required' => '사이트 제목은 필수 입력사항 입니다.',
        'description.required'  => '사이트 설명은 필수 입력사항 입니다.',
        'keywords.required'  => '사이트 키워드는 필수 입력사항 입니다.',
        'agree.required'  => '관리자 정보호보 서약은 필수 선택사항  입니다.',
        'title.min'  => '사이트 제목은 1~45자까지 입력하실 수 있습니다.',
        'title.max'  => '사이트 제목은 1~45자까지 입력하실 수 있습니다.',
        'description.min'  => '사이트 설명은 1~100자까지 입력하실 수 있습니다.',
        'description.max'  => '사이트 설명은 1~100자까지 입력하실 수 있습니다.',
    ];

    // 환경 설정 인덱스 페이지에 들어갈 데이터
    public function getConfigIndexParams()
    {
        // $admins = User::where('level', 10)->get();

        return [
            'configWebsite' => cache("config.website"),
            // 'configBoard' => cache("config.board"),
            // 'configJoin' => cache("config.join"),
            // 'configEmailDefault' => cache("config.email.default"),
            // 'configEmailBoard' => cache("config.email.board"),
            // 'configEmailJoin' => cache("config.email.join"),
            // 'configSns' => cache("config.sns"),
            // 'configExtra' => get_object_vars(cache("config.extra")),
            // 'admins' => $admins,
            // 'newSkins' => getSkins('news'),
            // 'searchSkins' => getSkins('searches'),
            // 'userSkins' => getSkins('users'),
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

        // 설정이 변경될 때 캐시를 지운다.
        Cache::forget("config.website");

        $configData = [
            'title' => $data['title'],
            'description' => $data['description'],
            'keywords' => $data['keywords'],
            'filterwords' => $data['filterwords'],
            'ipallow' => $data['ipallow'],
            'ipdeny' => $data['ipdeny'],
            'script' => $data['script'],
            'metatag' => $data['metatag'],
        ];

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
}
