<?php 
namespace IDGdashboard\Config;

/*
 * File: DashboardConfig.php
 * Project: Config
 * Created Date: Th Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Fri Dec 03 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

class DashboardConfig
{

    /**
     * nama folder yang akan dijadikan path template
     * folder ini berada pada bagian path <vendor>/Templates/ ini
     */
    public $template     = 'default';
    
    /**
     * nama file yang akan digunakan untuk main template
     * berisi global body template
     */
    public $main_template_file = 'layout';
    
    /**
     * company name desc
     */
    public $company_name    = 'INDIEGA NETWORK';

}