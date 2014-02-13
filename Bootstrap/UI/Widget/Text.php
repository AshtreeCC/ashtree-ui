<?php
namespace Ashtree\Bootstrap\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Text extends \Ashtree\UI\Widget\Text {
    
    /**
     * 
     */
    private $addon_meta = 'after';
    /**
     *
     */
    protected $widget;
    
    protected $input;
    
    protected $label;
    
    protected $addon;
    
    protected $help;
    
    public function __construct($name, $params=null){
        parent::__construct($name, $params);
        
        $this->addClass('form-control');
    }
    
    protected function setAddon($content) {
        if (is_array($content))  {
            if (isset($content['position'])) $this->addon_meta = $content['position'];
            return $this->setAddon($content['value']);
        }
        
        if (is_object($content)) {
            return $this->setAddonButton($content);
        }
        $this->addon = $this->widget->createElement('div');
        $this->addon->setAttribute('class', 'input-group');
        
        $addon_item = $this->widget->createElement('span');
        $addon_item->setAttribute('class', 'input-group-addon');
        $addon_item->nodeValue = $content;
        
        if ($this->addon_meta != 'after') {
             $this->addon->appendChild($addon_item);
             $this->addon->appendChild($this->input);
         } else {
             $this->addon->appendChild($this->input);
             $this->addon->appendChild($addon_item);
         }
    }
    
    protected function setAddonButton($element) {
        $content = $this->widget->importNode($element->getWidget()->childNodes->item(0), true);
        
        $this->addon = $this->widget->createElement('div');
        $this->addon->setAttribute('class', 'input-group');
       
        $addon_item = $this->widget->createElement('span');
        $addon_item->setAttribute('class', 'input-group-btn');
        $addon_item->appendChild($content);
        
         if ($this->addon_meta != 'after') {
             $this->addon->appendChild($addon_item);
             $this->addon->appendChild($this->input);
         } else {
             $this->addon->appendChild($this->input);
             $this->addon->appendChild($addon_item);
         }
        
        
    }
    
    protected function setHelp($text) {
        $this->help = $this->widget->createElement('span');
        $this->help->setAttribute('class', 'help-block');
        $this->help->nodeValue = $text;
    }
    
    public function getWidget() {
        $form_group = $this->widget->createElement('div');
        $form_group->setAttribute('class', 'form-group');
        if (!is_null($this->label))      $form_group->appendChild($this->label);
        if (!is_null($this->addon))      $form_group->appendChild($this->addon);
        else if (!is_null($this->input)) $form_group->appendChild($this->input);
        if (!is_null($this->help))       $form_group->appendChild($this->help);
        $this->widget->appendChild($form_group);
        
        return $this->widget;
    }
}

