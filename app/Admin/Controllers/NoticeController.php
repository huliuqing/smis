<?php

namespace App\Admin\Controllers;

use App\Events\NotificationEvent;
use App\Models\Message;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class NoticeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Message';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Message());

        $grid->column('id', __('Id'));
        $grid->column('msg_from', __('Msg from'));
        $grid->column('msg_to', __('Msg to'));
        $grid->column('message', __('Message'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Message::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('msg_from', __('Msg from'));
        $show->field('msg_to', __('Msg to'));
        $show->field('message', __('Message'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Message());
        $userId = Auth::user()->id;

        $form->hidden('msg_from', __('Sender'))->default($userId);
        $form->hidden('msg_to', __('Msg to'))->default($userId);

        $form->textarea('message', __('Message'));

        $form->radioCard('type', __('通知类型'))->options(['1' => '站内通知', '2' => 'Line公众号通知'])->default(1);
        $form->ignore('type');

        $form->saved(function (Form $form) use ($userId) {
            if (request()->type == Message::MOCK_TYPE_LINE_NOTICE) {
                try {
                    $httpClient = new CurlHTTPClient(env("LINE_BOT_CHANNEL_ACCESS_TOKEN"));
                    $bot = new LINEBot($httpClient, ['channelSecret' => env("LINE_BOT_CHANNEL_SECRET")]);
                    $textMessageBuilder = new TextMessageBuilder($form->message);
                    $response = $bot->broadcast($textMessageBuilder);//群发消息
                    Log::info("Line 广播:", [$response->getHTTPStatus(), $response->getRawBody()]);
                } catch (\Exception $e) {

                }
            } else {
                event(new NotificationEvent($form->model()));
            }
        });

        return $form;
    }
}
