<?php
namespace Bootstrap\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Button extends \Ashtree\UI\Widget\Button {
    /**
     *
     */
    protected $widget;
    
    public function __construct($name, $params=null){
        parent::__construct($name, $params);
        
        $style = (isset($params['style'])) ? str_replace('btn-', '', $params['style']) : 'default';
        $this->addClass("btn btn-{$style}");
    }
}

