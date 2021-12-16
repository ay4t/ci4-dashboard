<?php

namespace IDGdashboard\Config;
/*
 * File: MenuConfig.php
 * Project: Config
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

class MenuConfig
{

    public $menu = '[
        {
            "text":"User Navigation",
            "href":"#heading",
            "icon":"fas fa-bell",
            "target":"_self",
            "title":""
        },
        {
            "text":"Account",
            "href":"#",
            "icon":"fas fa-user-circle",
            "target":"_top",
            "title":"My Home",
            "children":[
                {
                    "text":"My Account",
                    "href":"/dashboard/account",
                    "icon":"fas fa-user",
                    "target":"_self",
                    "title":""
                },
                {
                    "text":"Security",
                    "href":"/dashboard/security",
                    "icon":"fas fa-eye",
                    "target":"_self",
                    "title":""
                },
                {
                    "text":"User Logs",
                    "href":"/dashboard/logs",
                    "icon":"fas fa-history",
                    "target":"_self",
                    "title":""
                }
            ]
        },
        {
            "text":"Sign Out",
            "href":"/auth/logout",
            "icon":"fas fa-sign-out-alt",
            "target":"_self",
            "title":""
        }
    ]';
}
