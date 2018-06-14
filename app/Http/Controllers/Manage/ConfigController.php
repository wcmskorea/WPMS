<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
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
        //
        return redirect(route('manage.config.show', '1'));
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), Config::${"rules".$request->input('id')}, Config::${"messages".$request->input('id')});
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput(); //Basic POST
            // return Response::json(array('errors' => $validator->getMessageBag()->toArray())); //Ajax POST
        }

        $data = $request->all();
        // dd($data);
        $message = '';
        switch($request->input('id')) {
            case "1" : default : $name = "website"; break;
            case "2" : $name = "policy"; break;
            case "3" : $name = "user"; break;
            case "4" : $name = "mail"; break;
            case "5" : $name = "theme"; break;
            case "6" : $name = "api"; break;
        }

        if($this->configModel->updateConfig($data, $name)) {
            $message = '환경설정 변경이 정상 처리되었습니다.';
        } else {
            $message = '환경설정 변경 실패입니다.';
        }

        return redirect(route('manage.config.show', $request->input('id')))->with('message', $message);
    }

    public function show($id) {
     
        $params = $this->configModel->getConfigIndexParams();
        return view("manage.config.tab" . $id, [
            'page_title' => 'Config', 
            'page_description' => '사이트 환경설정 페이지입니다.'
        ])->with($params);

    }
}
