<?php

namespace IDGdashboard\Config;

/*
 * File: InitAssets.php
 * Project: Config
 * Created Date: We Dec 2021
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
 */


class InitAssets
{

    protected $defaultJs = [
        'dashboard-assets/plugins/jquery/jquery.min.js',
        'dashboard-assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'dashboard-assets/dist/js/adminlte.min.js',
    ];

    protected $defaultCss = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'dashboard-assets/plugins/fontawesome-free/css/all.min.css',
        'dashboard-assets/dist/css/adminlte.min.css',
    ];


    public function addJs($jsFile = null)
    {
        if (!empty($jsFile)) $this->defaultJs[] = $jsFile;
    }

    public function addCss($cssFile = null)
    {
        if (!empty($cssFile)) $this->defaultCss[] = $cssFile;
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function Js()
    {
        return $this->defaultJs;
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function Css()
    {
        return $this->defaultCss;
    }

    public function renderJs()
    {
        $outputJs     = '';
        foreach ($this->Js() as $js) {
            $outputJs .= script_tag($js) . "\n\t";
        }
        return $outputJs;
    }

    public function renderCss()
    {
        $outputCss     = '';
        foreach ($this->Css() as $css) {
            $outputCss .= link_tag($css) . "\n\t";
        }
        return $outputCss;
    }
}
