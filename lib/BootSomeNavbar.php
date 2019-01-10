<?php
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

	public function brand(){
		$a = $this->el('a',['class'=>'navbar-brand']);
		return $a;
	}

	public function toggler($id = 'navbarMain'){
		$toggle = $this->el('button',[
			'class'=>'navbar-toggler',
			'data-toggle'=>'collapse',
			'data-target'=>'#'.$id
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
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}

	public function dropdown($text){
		$div = $this->el('div', ['class'=>'nav-item dropdown']);
		$div->el('a',['class'=>'nav-link dropdown-toggle','href'=>'#','data-toggle'=>'dropdown'])->te($text);

		$element = new BootSomeNavbarDropDown('div');
		$div->appendChild($element);
		$element->at(['class'=>'dropdown-menu dropdown-menu-right']);
		return $element;
	}
}

class BootSomeNavbarDropDown extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::a($href, $text);
		$a->at(['class'=>'dropdown-item']);
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}
}
?>