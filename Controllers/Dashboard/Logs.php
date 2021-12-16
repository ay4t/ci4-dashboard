<?php

namespace IDGdashboard\Controllers\Dashboard;
/*
 * File: Logs.php
 * Project: Dashboard
 * Created Date: Su Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Thu Dec 09 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

use IDGdashboard\Controllers\Dashboard;
use IDGdashboard\Libraries\CRUDBuilder;
use IDGdashboard\Models\User;

class Logs extends Dashboard
{
    public $filename        = 'user_logs';

    public function index()
    {
        $user = new User();

        // $crud = new CRUDBuilder();
        // $crud->setTable($this->tableName);
        // // $crud->setSubject('User Logs', 'User Logs Table');
        // $crud->columns([
        //     'key',
        //     'value',
        //     'ipaddress',
        //     'useragent',
        //     'created_at',
        //     'updated_at',
        // ]);
        // $crud->where('user_id', $user->authID());
        // $crud->displayAs('key', 'Session Name');

        // $output = $crud->renderHTML();


        // /**
        //  * adding JS file to view
        //  */
        // foreach ($output->js_files as $js) {
        //     $this->initAsset->addJs($js);
        // }

        // foreach ($output->css_files as $css) {
        //     $this->initAsset->addCss($css);
        // }

        // $this->data['crud_container'] = $output->output;
        // $this->data['crud_container'] = $crud->render();

        $crud = new CRUDBuilder();
        $crud->setModel('\IDGdashboard\Models\UserLogModel');
        $crud->setColumn([
            'username',
            'key',
            'value',
            'ipaddress',
            'useragent',
            'created_at',
            'updated_at',
        ]);
        $crud->where('user_id', $user->authID());
        $crud->displayAs([
            'key'       => 'Session Name',
            'username'   => 'Username',
        ]);
        $crud->setSubject('User Logs History');
        $crud->join('users', 'userlogs.user_id = users.id', 'inner');
        // $crud->setMode('all');
        $render = $crud->render();

        /**
         * adding JS file to view
         */
        foreach ($render->js_files as $js) {
            $this->initAsset->addJs($js);
        }

        foreach ($render->css_files as $css) {
            $this->initAsset->addCss($css);
        }
        // var_dump($render->html);

        $this->data['crud_container'] = $render->html;
        return parent::index();
    }
}
