<?php

namespace App\Http\Controllers\Api;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * MessageNotificationController 通知
 */
class MessageNotificationController extends Controller
{
    /**
     * @TODO 删除 index
     * @link http://127.0.0.1:8000/notification/index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $data = ['user_id' => 6];
        return view('notification', $data);
    }

    /**
     * send 给学生发送消息
     * @TODO 采用 heroku websocket 服务
     * @param Request $request
     * @param int $id 消息接收用户 id
     * @return void
     */
    public function send(Request $request)
    {
        $message = new Message();
        $message->setAttribute('msg_from', Auth::user()->id);
        $message->setAttribute('msg_to', $request->to);
        $message->setAttribute('message', $request->message);
        $message->save();

//         @TODO 权限校验
//        Log::debug('NotificationController: send');
        event(new NotificationEvent($message));
        return $this->success([]);
    }
}
