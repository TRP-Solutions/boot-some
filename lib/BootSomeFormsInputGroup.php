<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once __DIR__.'/BootSomeLayout.php';
class BootSomeFormsInputGroup extends HealWrapper {
	public function __construct($parent){
		$this->primary_element = $parent->el('div',['class'=>'input-group']);
	}

	public function text($text){
		$div = $this->primary_element->el('div',['class'=>'input-group-text']);
		if(!empty($text)){
			$div->te($text);
		}
		return $div;
	}

	public function button($js, $icon = null, $color = null){
		$class = 'btn';
		if(isset($color)) $class .= ' btn-'.$color;
		$button = $this->primary_element->el('button',['class'=>$class,'onclick'=>$js]);
		BootSomeLayout::icon($button,$icon);
		return $button;
	}

	public function icon($icon){
		$element = $this->primary_element->el('span',['class'=>'input-group-text']);
		BootSomeLayout::icon($element,$icon);
	}
}
