<?php
namespace IDGdashboard\Database\Seeds;
/*
 * File: SettingsSeeder.php
 * Project: Seeds
 * Created Date: Sa Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Sat Dec 04 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 * 
 * USAGE COMMAND: php spark db:seed IDGdashboard\Database\Seeds\SettingsSeeder
 * 
 */
use CodeIgniter\Database\Seeder;
use IDGdashboard\Models\SettingModel;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $model = new SettingModel();
        $model->insert([
            'name'      => 'admin_menu',
            'value'     => '[{"text":"Dashboard","href":"/dashboard","icon":"fas fa-home","target":"_top","title":"My Home"},{"text":"Opcion2","href":"","icon":"fas fa-chart-bar","target":"_self","title":""},{"text":"Opcion3","href":"","icon":"fas fa-bell","target":"_self","title":""},{"text":"Opcion4","href":"","icon":"fas fa-crop","target":"_self","title":""},{"text":"Opcion5","href":"","icon":"fas fa-flask","target":"_self","title":""},{"text":"Opcion6","href":"","icon":"fas fa-map-marker","target":"_self","title":""}]',
            'show_form' => '1'
        ]);
    }
}
