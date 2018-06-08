<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config;
use Validator;

class ConfigController extends Controller
{
    public $configModel;

    public function __construct(Config $configModel)
    {
        $this->configModel = $configModel;
    }

    //
    public function index() {

        $params = $this->configModel->getConfigIndexParams();
        return view("manage.config.index", ['page_title' => 'Config', 'page_description' => '사이트 환경설정 페이지입니다.'])->with($params);

    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), Config::$rules, Config::$messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput(); //Basic POST
            // return Response::json(array('errors' => $validator->getMessageBag()->toArray())); //Ajax POST
        }

        $data = $request->all();
        $message = '';

        if($this->configModel->updateConfig($data)) {
            $message = '기본환경설정 변경이 완료되었습니다.';
        } else {
            $message = '기본환경설정 변경에 실패하였습니다.';
        }
        return redirect(route('manage.config'))->with('message', $message);
    }
}