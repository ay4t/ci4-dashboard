<?php

namespace IDGdashboard\Controllers;

/*
 * File: Dashboard.php
 * Project: Controllers
 * Created Date: Th Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Mon Dec 06 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 * 
 * IMPORTANT: 
 * THIS PACKAGE REQUIRE IONAUTH libraries by Ben Edmunds
 * 
 */

use IDGdashboard\Models\User;
use IonAuth\Libraries\IonAuth;
use App\Controllers\BaseController;
use IDGdashboard\Config\InitAssets;
use IDGdashboard\Config\DashboardConfig;
use IDGdashboard\Libraries\SidebarMenu\MenuBuilder;


class Dashboard extends BaseController
{

    protected $data;

    protected $user;

    protected $user_group;

    protected $config;

    protected $ionAuth;

    protected $menuBuilder;

    protected $initAsset;

    public $filename = 'default';
    public $addMenuData = [];

    public function __construct()
    {

        /** load Codeigniter helper */
        helper('html', 'url');

        /** init ionAuth libraries */
        $this->ionAuth      = new IonAuth;
        $this->config       = new DashboardConfig;
        $this->menuBuilder  = new MenuBuilder;
        $this->initAsset    = new InitAssets;


        /** loading User Model */
        $this->user         = new User();

        $this->user_group   = 2;

        /** init Meta pages */
        $this->data['title'] = 'Dashboard';
        $this->data['config'] = $this->config;

        $this->menuBuilder->addNew('/dashboard', 'Dashboard', 'fas fa-tachometer-alt');
    }

    /**
     * undocumented function summary
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     * @author Ayatulloh Ahad R - ayatulloh@indiega.net
     **/
    public function index()
    {

        /** 
         * validate user must be logged in
         * note: Dikarenakan fungsi ini tidak bisa di gunakan di constructor maka kita buatkan disini 
         **/
        if (!$this->ionAuth->loggedIn()) return redirect()->to('/auth/login');

        /**
         * buat data yang akan di kirim ke view
         */
        $this->data['userdata']     = $this->user->authData();
        $this->data['avatar']       = $this->user->avatar(
            $this->data['userdata']->picture,
            [
                'class' => 'img-responsive img-rounded',
            ]
        );

        $this->data['sidebarmenu']  = $this->menuBuilder->sidebar_menu();
        $this->data['js']           = $this->initAsset->renderJs();
        $this->data['css']          = $this->initAsset->renderCss();

        $baseTemplate = 'IDGdashboard\Views\Pages\\' . $this->filename;
        return view($baseTemplate, $this->data);
    }
}
