<?php
namespace Ashtree\UI;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Widget {
    
    /**
     * 
     */
    private $tag;
    
    /**
     * 
     */
    protected $widget;
    
    protected $input;
    
    protected $label;
    
    protected $name;
    
    protected $type;
        
    protected $value;
    
    protected $addon;
    
    protected $help;
    
    protected $attrib;
    
    public function __construct($name, $params=null) {
        if ($this->type == null) {
            throw new FormException('Widget type is undefined in ' . get_class($this));
        }
        
        $this->widget = new \DOMDocument();
        
        $this->name   = $name;
        $this->attrib = $params;
        
        $this->setInput($this->getTag());

        if (isset($params['value'])) {
            $this->setValue($params['value']);
            unset($this->attrib['value']);
        }
        if (isset($params['class'])) {
            $this->addClass($params['class']);
            unset($this->attrib['class']);
        }
        if (isset($params['validate'])) {
            $this->setValidate($params['validate']);
            unset($this->attrib['validate']);
        }
        if (isset($params['label'])) {
            $this->setLabel($params['label']);
            unset($this->attrib['label']);
        }
        if (isset($params['addon'])) {
            $this->setAddon($params['addon']);
            unset($this->attrib['addon']);
        }
        if (isset($params['help'])) {
            $this->setHelp($params['help']);
            unset($this->attrib['help']);
        }
            
        foreach((array)$this->attrib as $name=>$value) {
            $this->setAttrib($name, $value);
        }
    }
    
    protected function addClass($class) {
        $class_list   = explode(' ', $this->input->getAttribute('class'));
        $class_list[] = $class;       
        $this->input->setAttribute('class', implode(' ', $class_list));
    }
    
    protected function removeClass($class) {
        $class_list   = explode(' ', $this->input->getAttribute('class'));
        if(($key = array_search($class, $class_list)) !== false) {
            unset($class_list[$key]);
        }
        $this->input->setAttribute('class', implode(' ', $class_list));
    }
    
    private function getTag() {
        switch($this->type) {
            case 'text':
            case 'radio':
            case 'checkbox': 
            case 'hidden': return $this->tag = 'input';
            case 'textarea': return $this->tag = 'textarea';
            case 'select': return $this->tag = 'select';
            case 'submit':
            case 'button': return $this->tag = 'button';
        }
    }
    
    protected function setInput($tag) {
        $this->input = $this->widget->createElement($tag);
        $this->input->setAttribute('name', $this->name);
        $this->input->setAttribute('id', $this->name);
        if (in_array($this->tag, ['input', 'button'])) {
            $this->setType($this->type);
        }
    }
    
    protected function setValidate($rules) {
        foreach((array)$rules as $rule) {
            switch($rule) {
                case 'required': $this->addClass('required'); break;
                default: $this->addClass($rule);
            }
        }
    }
    
    protected function setType($type) {
        
        $this->input->setAttribute('type', $type);
    }
    
    protected function setValue($value) {
        $this->input->setAttribute('value', $value);
    }
    
    protected function setLabel($label) {
        $this->label = $this->widget->createElement('label');
        $this->label->setAttribute('for', $this->input->getAttribute('id'));
        $this->label->nodeValue = $label;
    }
    
    protected function setHelp($text) {
        $this->help = $this->widget->createElement('span');
        $this->help->nodeValue = $text;
    }
    
    protected function setAddon($content) {
        $this->addon = $this->widget->createElement('span');
        $this->addon->nodeValue = $content;
    }
    
    public function setAttrib($name, $value) {
        $this->input->setAttribute($name, $value);
    }
    
    public function getWidget() {
        if (!is_null($this->label)) $this->widget->appendChild($this->label);
        if (!is_null($this->input)) $this->widget->appendChild($this->input);
        if (!is_null($this->addon)) $this->widget->appendChild($this->addon);
        if (!is_null($this->help))  $this->widget->appendChild($this->help);
        return $this->widget;
    }
    
    public function render() {
        print $this->widget->saveHTML($this->input);
    }
}

