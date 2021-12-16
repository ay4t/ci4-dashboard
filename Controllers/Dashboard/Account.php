<?php

namespace IDGdashboard\Controllers\Dashboard;

use IDGdashboard\Controllers\Dashboard;


/*
 * File: Account.php
 * Project: Dashboard
 * Created Date: Su Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Sun Dec 05 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

class Account extends Dashboard
{

    public $filename = 'user_account';

    public function index()
    {

        // $this->menuBuilder->addNew('asd', 'qweqwe', 'fas fa-home');

        return parent::index();
    }
}
