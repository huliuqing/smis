<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\UserSchool;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('status', __('Status'))->display(function ($status) {
            return $status ? '正常' : '关闭';
        });
        $grid->column('type', __('Type'))->display(function ($type) {
            switch ($type) {
                case User::TYPE_UNKNOWN:
                    return '未知';
                case User::TYPE_TEACHER:
                    return '教师';
                case User::TYPE_STUDENT:
                    return '学生';
            }
        });
        $grid->column('remember_token', __('Remember token'));
        $grid->column('schools')->display(function ($schools) {
            $schools = array_map(function ($role) {
                return "<span class='label label-success'>{$role['name']}</span>";
            }, $schools);

            return join('&nbsp;', $schools);
        });

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    private function displayStatus($status)
    {
        return $status ? '正常' : '关闭';
    }

    private function displayType($type)
    {
        switch ($type) {
            case User::TYPE_UNKNOWN:
                return '未知';
            case User::TYPE_TEACHER:
                return '教师';
            case User::TYPE_STUDENT:
                return '学生';
        }
    }


    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('password', __('Password'));
        $show->field('status', __('Status'))->display(function ($status) {
            return $status ? '正常' : '关闭';
        });

        $show->field('type', __('Type'))->display(function ($type) {
            switch ($type) {
                case User::TYPE_UNKNOWN:
                    return '未知';
                case User::TYPE_TEACHER:
                    return '教师';
                case User::TYPE_STUDENT:
                    return '学生';
            }
        });

        $show->field('remember_token', __('Remember token'));
        $show->field('sns_line_id', __('Line ID'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->switch('status', 'Status');

        $type = [
            User::TYPE_UNKNOWN => '未知',
            User::TYPE_TEACHER => '教师',
            User::TYPE_STUDENT => '学生',
        ];
        $form->select('type', '角色')->options($type);

//        $form->password('password', __('Password'));
//        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
