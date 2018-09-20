<?php
trait BootSomeNoneForward {
	public function checkbox_call(...$param) {
		return parent::checkbox(...$param);
	}
	public function radio_call(...$param) {
		return parent::radio(...$param);
	}
}

trait BootSomeNodeParent {
	protected static function createElementHeal($name){
		return new BootSomeElement($name);
	}
	public function container($fluid=true) {
		$head = $this->el('div')->at(['class'=>$fluid?'container-fluid':'container']);
		return $head;
	}
	public function row() {
		return $this->el('div',['class'=>'row']);
	}
	public function form($action = '', $method = 'get', $type = BOOTSOME_FORM_NORMAL){
		if($type!=BOOTSOME_FORM_INLINE) {
			$element = new BootSomeFormsElement('form');
		}
		else {
			$element = new BootSomeFormsGroupWrapBoxes('form');;
		}
		$this->appendChild($element);
		$element->type = $type;
		
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
	public function navbar(){
		$element = new BootSomeNavbarElement('nav');
		$this->appendChild($element);
		$element->at(['class'=>'navbar navbar-expand-md']);
		return $element;
	}
	public function modal(){
		$dialog = $this->el('div',['class'=>'modal']);
		$dialog = $dialog->el('div',['class'=>'modal-dialog']);
		
		$element = new BootSomeModalElement('div');
		$dialog->appendChild($element);
		$element->at(['class'=>'modal-content']);
		
		$this->el('div',['class'=>'modal-backdrop']);
		return $element;
	}
	public function table(){
		$div = $this->el('div',['class'=>'table-responsive']);
		$element = new BootSomeTableElement('table');
		$div->appendChild($element);
		$element->at(['class'=>'table']);
		return $element;
	}
	public function button($text,$icon = null,$color = 'primary') {
		$button = $this->el('button',['class'=>'btn btn-'.$color]);
		if($icon) {
			$button->el('i',['class'=>'fas fa-'.$icon]);
		}
		$button->te($text);
		return $button;
	}
	public function icon($icon) {
		return $this->el('i',['class'=>'fas fa-'.$icon]);
	}
	/*public function col(...$class) {
		foreach ($class as &$value) $value = 'col-'.$value;
		$class = implode(' ',$class);
		return $this->el('div',['class'=>$class]);
	}*/
}

class BootSome extends HealHTML {
	use BootSomeNodeParent;
}

class BootSomeElement extends HealHTMLElement {
	use BootSomeNodeParent, BootSomeNoneForward;
}

require_once('../lib/BootSomeNavbar.php');
require_once('../lib/BootSomeForms.php');
require_once('../lib/BootSomeModal.php');
require_once('../lib/BootSomeTables.php');

?>