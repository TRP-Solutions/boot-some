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

	public function container($fluid = true) {
		$head = $this->el('div')->at(['class'=>$fluid?'container-fluid':'container']);
		return $head;
	}

	public function row() {
		$element = new BootSomeRow('div');
		$this->appendChild($element);
		$element->at(['class'=>'row']);
		return $element;
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

	public function pagination($total, $limit, $page, $url) {
		$nav = $this->el('nav',['class'=>'pagination']);

		$span = $nav->el('span',['class'=>'page-item']);
		$button = $span->el('button',['class'=>'page-link'])->te('«');
		if($page==1) {
			$span->at(['class'=>'disabled'],HEAL_ATTR_APPEND);
		}
		else {
			$button->at($url($page-1));
		}

		for($i=1;($i*$limit)<=(ceil($total/$limit)*$limit);$i++) {
			$span = $nav->el('span',['class'=>'page-item']);
			$button = $span->el('button',['class'=>'page-link'])->te($i);
			if($page==$i) {
				$span->at(['class'=>'active'],HEAL_ATTR_APPEND);
			}
			else {
				$button->at($url($i));
			}
		}

		$span = $nav->el('span',['class'=>'page-item']);
		$button = $span->el('button',['class'=>'page-link'])->te('»');
		if($page==ceil($total/$limit)) {
			$span->at(['class'=>'disabled'],HEAL_ATTR_APPEND);
		}
		else {
			$button->at($url($page+1));
		}
	}

	public function alert($color = 'primary') {
		return $this->el('div',['class'=>'alert alert-'.$color]);
	}

	public function table(){
		$div = $this->el('div',['class'=>'table-responsive']);
		$element = new BootSomeTableElement('table');
		$div->appendChild($element);
		$element->at(['class'=>'table']);
		return $element;
	}
	public function button($text, $icon = null, $color = 'primary') {
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
}

class BootSome extends HealHTML {
	use BootSomeNodeParent;
}

class BootSomeElement extends HealHTMLElement {
	use BootSomeNodeParent, BootSomeNoneForward;
}

class BootSomeRow extends BootSomeElement {
	public function col(...$class) {
		$class = implode(' ',$class);
		return $this->el('div',['class'=>$class]);
	}
}

require_once(__DIR__.'/BootSomeNavbar.php');
require_once(__DIR__.'/BootSomeForms.php');
require_once(__DIR__.'/BootSomeModal.php');
require_once(__DIR__.'/BootSomeTables.php');

?>