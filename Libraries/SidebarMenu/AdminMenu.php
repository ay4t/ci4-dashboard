<?php 
namespace IDGdashboard\Libraries\SidebarMenu;

use IDGdashboard\Models\SettingModel;

class AdminMenu extends MenuBuilder
{
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getMenuData()
    {
        //get data
        $SettingModel   = new SettingModel();
        $menuData       = $SettingModel->find()
            ->where('name', 'admin_menu')
            ->first();

        var_dump( $menuData );
        
    }
}
