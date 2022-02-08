<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
class BootSomeDropDown extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::el('li')->a($href, $text);
		$a->at(['class'=>'dropdown-item']);
		if($active) $a->at(['class'=>'active'], true);
		return $a;
	}
}
