<?php

namespace IDGdashboard\Libraries\SidebarMenu;
/*
 * File: MenuBuilder.php
 * Project: SidebarMenu
 * Created Date: Sa Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Wed Dec 08 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */

use Spatie\Url\Url;
use Spatie\Menu\Html;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;
use IDGdashboard\Config\MenuConfig;
use IDGdashboard\Models\SettingModel;

class MenuBuilder extends Menu
{
    protected $menu;

    protected $submenu;

    public $data;


    public function __construct()
    {
        $this->menu = Menu::new();
    }

    public function addHeading($label)
    {
        return $this->menu->add(
            Link::to(
                '#',
                $label
            )->addParentClass('nav-header')
        );
    }

    public function addNew($url, $label, $icon)
    {
        $badgeMenu = '<span class="right badge badge-danger">New</span>';

        return $this->menu->add(
            Link::to(
                $url,
                '<i class="nav-icon ' . $icon . '"></i>' .
                    '<p> ' . $label . ' </p>'
            )
                ->addClass('nav-link')
                ->addParentClass('nav-item')
        );
    }

    public function createSub($label, $icon)
    {
        $this->submenu = Menu::new();
        $this->submenu->addClass('nav nav-treeview')
            ->setActiveClass('active')
            ->setActive(uri_string())
            ->setActiveClassOnLink();


        $this->menu->submenu(
            Link::to(
                '#',
                '<i class="nav-icon ' . $icon . '"></i>' .
                    '<p> ' . $label . ' <i class="right fas fa-angle-left"></i></p>'
            )->addClass('nav-link'),
            $this->submenu
        )
            ->addItemParentClass('nav-item menu-open');
    }

    public function subItem($url, $label, $icon)
    {
        return $this->submenu->add(
            Link::to(
                $url,
                '<i class="nav-icon ' . $icon . '"></i>' .
                    '<p> ' . $label . '</p>'
            )
                ->addClass('nav-link')
        )
            ->addItemParentClass('nav-item');
    }

    public function addMultiMenu($menus = [])
    {
        foreach ($menus as $menu) {
            $this->addNew($menu['url'], $menu['label'], $menu['icon']);
        }
    }

    public function renderHTML()
    {

        $this->menu
            ->addClass('nav nav-pills nav-sidebar flex-column')
            ->setAttribute('data-widget', 'treeview')
            ->setAttribute('role', 'menu')
            ->setAttribute('data-accordion', 'false');

        $this->menu->wrap('nav', ['class' => 'mt-2'])
            ->setActiveClass('active')
            ->setActive(function (Link $link) {
                $activeStatus = ('/' . uri_string() == $link->url());
                return $activeStatus;
            })
            ->setActiveClassOnLink();

        return $this->menu->render();
    }

    /**
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function sidebar_menu()
    {

        /**
         * jika usergroup = 2 maka ambil data user_menu
         */
        // $database_menu = ( $this->user_group == 1 )? 'admin_menu': 'user_menu' ;
        // $SettingModel   = new SettingModel();
        // $menuData       = $SettingModel->where('name', 'user_menu')
        //     ->first();
        // if (empty($menuData->value)) return false;

        $menuConfig     = new MenuConfig;
        $menuData       = $menuConfig->menu;

        /**
         * foreach menu data from database settings
         */
        foreach (json_decode($menuData) as $menu) {

            if (!isset($menu->children)) {

                //jika url == #heading
                if ($menu->href == '#heading') {
                    $this->addHeading($menu->text);
                } else {
                    $this->addNew($menu->href, $menu->text, $menu->icon);
                }
            } else {

                $this->createSub($menu->text, $menu->icon);
                foreach ($menu->children as $child) {
                    $this->subItem($child->href, $child->text, $child->icon);
                }
            }
        }

        return $this->renderHTML();
    }
}
