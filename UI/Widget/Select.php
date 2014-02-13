<?php
namespace Ashtree\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Select extends \Ashtree\UI\Widget {
    /**
     *
     */
    protected $widget;
    
    protected $input;
    
    protected $attrib;
    
    protected $type = 'select';
    
    public function __construct($name, $params=null){
        
        $attribs = $params;
        if (isset($params['usekey']))  unset($attribs['usekey']);
        if (isset($params['options'])) unset($attribs['options']);
        if (isset($params['empty']))   unset($attribs['empty']);

        parent::__construct($name, $attribs);
        
        if (isset($params['empty'])) {
            if (!is_array($params['empty'])) $params['empty'] = [''=>$params['empty']];
            $this->setOptions($params['empty'], true);
        }
        if (isset($params['options'])) $this->setOptions($params['options'], @$params['usekey'], @$params['value']);
    }
    
    protected function setOptions($options, $usekey=false, $value=null){
        foreach($options as $option=>$text) {
            $key = ($usekey) ? $option : $text;
            $option = $this->widget->createElement('option');
            $option->setAttribute('value', $key);
            $option->nodeValue = $text;
            if ($value == $key) $option->setAttribute('selected', 'selected');
            $this->input->appendChild($option);
        }
    }
}

