<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
trait BootSomeNavbarCommon {
	public function nav(){
		$element = new BootSomeNavbarNav('div');
		$this->appendChild($element);

		$element->at(['class'=>'navbar-nav']);
		return $element;
	}
}

class BootSomeNavbar extends BootSomeElement {
	use BootSomeNavbarCommon;

	public function brand($link = null){
		$a = $this->el($link ? 'a' : 'div',['class'=>'navbar-brand']);
		if($link) $a->at(['href'=>$link]);
		return $a;
	}

	public function toggler($id = 'navbarMain'){
		$toggle = $this->el('button',[
			'class'=>'navbar-toggler',
			'data-bs-toggle'=>'collapse',
			'data-bs-target'=>'#'.$id
		]);
		$toggle->el('span',['class'=>'navbar-toggler-icon']);
	}

	public function collapse($id = 'navbarMain'){
		$element = new BootSomeNavbarCollapse('div');
		$this->appendChild($element);
		$element->at([
			'id'=>$id,
			'class'=>'collapse navbar-collapse',
			'data-toggle'=>"collapse",
			'data-target'=>'#'.$id.'.show'
		]);
		return $element;
	}
}

class BootSomeNavbarCollapse extends BootSomeElement {
	use BootSomeNavbarCommon;
}

class BootSomeNavbarNav extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::a($href, $text);
		$a->at(['class'=>'nav-item nav-link']);
		$a->at(['data-bs-toggle'=>'collapse','data-bs-target'=>'.navbar-collapse.show']);
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}

	public function dropdown($text, $active = false){
		$div = $this->el('div',['class'=>'nav-item dropdown']);
		if($active) $div->at(['class'=>'active'], HEAL_ATTR_APPEND);
		$div->el('a',['class'=>'nav-link dropdown-toggle','href'=>'#','data-bs-toggle'=>'dropdown'])->te($text);

		$element = new BootSomeNavbarDropDown('div');
		$div->appendChild($element);
		$element->at(['class'=>'dropdown-menu dropdown-menu-end']);
		return $element;
	}
}

class BootSomeNavbarDropDown extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::a($href, $text);
		$a->at(['class'=>'dropdown-item']);
		$a->at(['data-bs-toggle'=>'collapse','data-bs-target'=>'.navbar-collapse.show']);
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}
	public function divider(){
		$this->el('div',['class'=>'dropdown-divider']);
	}
}
