<?php
trait BootSomeNavbarNodeParent {
	public function nav(){
		$element = new BootSomeNavbarNavElement('div');
		$this->appendChild($element);
		
		$element->at(['class'=>'navbar-nav']);
		return $element;
	}
	public function form($action = '', $method = 'get', $type = BOOTSOME_FORM_NORMAL){
		$element = new BootSomeFormsGroupWrapBoxes('form');
		$this->appendChild($element);
		$element->type = BOOTSOME_FORM_INLINE;
		
		$attr = []; // Copy from HealHTML - TODO: Use native code
		if(!empty($action)){
			$attr['action'] = $action;
			$attr['method'] = $method;
		} else {
			$attr['onsubmit'] = 'return false;';
		}
		$element->at($attr);
		if($element->type==BOOTSOME_FORM_INLINE) $element->at(['class'=>'form-inline'], HEAL_ATTR_APPEND);
		return $element;
	}
}

class BootSomeNavbarElement extends BootSomeElement {
	use BootSomeNavbarNodeParent;
	
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
		$element = new BootSomeNavbarCollapseElement('div');
		$this->appendChild($element);
		$element->at(['id'=>$id,'class'=>'collapse navbar-collapse']);
		return $element;
	}
}

class BootSomeNavbarCollapseElement extends BootSomeElement {
	use BootSomeNavbarNodeParent;
}

class BootSomeNavbarNavElement extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::a($href, $text);
		$a->at(['class'=>'nav-item nav-link']);
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}
	
	public function dropdown($text){
		$div = $this->el('div', ['class'=>'nav-item dropdown']);
		$div->el('a',['class'=>'nav-link dropdown-toggle','href'=>'#','data-toggle'=>'dropdown'])->te($text);
		
		$element = new BootSomeNavbarDropDownElement('div');
		$div->appendChild($element);
		$element->at(['class'=>'dropdown-menu dropdown-menu-right']);
		return $element;
	}
}

class BootSomeNavbarDropDownElement extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::a($href, $text);
		$a->at(['class'=>'dropdown-item']);
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}
}
?>