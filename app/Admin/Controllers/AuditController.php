<?php

namespace App\Admin\Controllers;

use App\Models\UserSchool;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AuditController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Audit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserSchool());

        $grid->column('id', __('Id'));
        $grid->column('user.name', 'Username');
        $grid->column('user.email', 'Email');
        $grid->column('school.name', 'School');


        $grid->column('type', __('审核'))->display(function ($type) {
            switch ($type) {
                case UserSchool::TYPE_DEFAULT:
                    return '未审核';
                case UserSchool::TYPE_SCHOOL_ADMIN:
                    return '学校管理员';
                case UserSchool::TYPE_SCHOOL_TEACHER:
                    return '教师';
                case UserSchool::TYPE_SCHOOL_STUDENT:
                    return '学生';
            }
        });


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
        $show = new Show(UserSchool::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user.name', __('Name'));
        $show->field('user.email', __('Email'));
        $show->field('school.name', __('School'));

        $show->field('type', __('审核'))->using(UserSchool::AUDIT_MAPPING);

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserSchool());


        $form->display('id', __('Id'));
        $form->display('user.name', __('Name'));
        $form->display('user.email', __('Email'));
        $form->display('school.name', __('School'));

        $form->select('type', '审核')->options([UserSchool::TYPE_SCHOOL_ADMIN => '学校管理员',]);

        return $form;
    }
}
