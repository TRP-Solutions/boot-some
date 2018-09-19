<?php
define('BOOTSOME_FORM_NORMAL',1); // used in BootSomeFormsElement
define('BOOTSOME_FORM_HORIZONTAL',2); // used in BootSomeFormsElement
define('BOOTSOME_FORM_INLINE',3); // used in BootSomeFormsElement

trait BootSomeFormsGroup {
	public function group($col = null){
		if($this->type!=BOOTSOME_FORM_HORIZONTAL) {
			$element = new BootSomeFormsGroupElement('div');
		}
		else {
			$element = new BootSomeFormsGroupWrapElement('div');
		}
		
		$this->appendChild($element);
		$element->type = $this->type;
		
		$element->at(['class'=>'form-group']);
		if($element->type==BOOTSOME_FORM_HORIZONTAL) {
			$element->at(['class'=>'row'], HEAL_ATTR_APPEND);
			if($col) $element->col = (int) $col;
		}
		else {
			if($col && get_class($this)=='BootSomeFormsRowElement') {
				$element->at(['class'=>'col-md-'.(int) $col], HEAL_ATTR_APPEND);
			}
		}
		
		return $element;
	}
}

trait BootSomeFormsType {
	public $type = 1;
}

trait BootSomeFormsBoxes {
	public function input($name, $value = null) {
		$input = parent::input($name, $value);
		$input->at(['class'=>'form-control']);
	}

	public function select($name) {
		$select = parent::select($name);
		$select->at(['class'=>'custom-select']);
		return $select;
	}

	public function textarea($name, $content = '') {
		$textarea = parent::textarea($name, $content);
		$textarea->at(['class'=>'form-control']);
		return $textarea;
	}
	public function checkbox($name, $checked = false, $value = 'on', $text = null, $inline = false) {
		$div = $this->el('div',['class'=>'form-check']);
		if($inline) $div->at(['class'=>'form-check-inline'], HEAL_ATTR_APPEND);
		$checkbox = $div->checkbox_call($name, $checked, $value);
		if(empty($text)) {
			$checkbox->at(['class'=>'form-check-input position-static']);
		}
		else {
			$checkbox->at(['class'=>'form-check-input']);
			$div->label($text,$checkbox->gat('id'))->at(['class'=>'form-check-label']);
		}
		return $checkbox;
	}
	
	public function radio($name, $value, $checked = false, $text = null, $inline = false) {
		$div = $this->el('div',['class'=>'form-check']);
		if($inline) $div->at(['class'=>'form-check-inline'], HEAL_ATTR_APPEND);
		$radio = $div->radio_call($name, $value, $checked);
		if(empty($text)) {
			$radio->at(['class'=>'form-check-input position-static']);
		}
		else {
			$radio->at(['class'=>'form-check-input']);
			$div->label($text,$radio->gat('id'))->at(['class'=>'form-check-label']);
		}
		return $radio;
	}
	
	public function text($text) {
		$this->el('small',['class'=>'form-text'])->te($text);
	}
	
	public function inputgroup() {
		$element = new BootSomeFormsInputGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'input-group']);
		return $element;
	}
}

class BootSomeFormsElement extends BootSomeElement {
	use BootSomeFormsGroup, BootSomeFormsType;
	
	public function row() {
		$element = new BootSomeFormsRowElement('div');
		$this->appendChild($element);
		$this->type = $this->type;
		$element->at(['class'=>'form-row']);
		return $element;
	}
}

class BootSomeFormsGroupWrapElement extends BootSomeElement {
	use BootSomeFormsType;
	public $col = 3;
	private $wrap = null;
	
	public function label($text = null, $for = null) {
		$label = parent::label($text,$for);
		$label->at(['class'=>'col-form-label col-sm-'.$this->col], HEAL_ATTR_APPEND);
	}

	public function input($name, $value = NULL) {
		$element = new BootSomeFormsGroupWrapBoxes('div');
		$this->appendChild($element);
		$element->at(['class'=>'col-sm-'.(12-$this->col)]);
		return $element->input($name, $value);
	}

	public function select($name) {
		$element = new BootSomeFormsGroupWrapBoxes('div');
		$this->appendChild($element);
		$element->at(['class'=>'col-sm-'.(12-$this->col)]);
		return $element->select($name);
	}

	public function textarea($name, $content = '') {
		$element = new BootSomeFormsGroupWrapBoxes('div');
		$this->appendChild($element);
		$element->at(['class'=>'col-sm-'.(12-$this->col)]);
		return $element->textarea($name, $content);
	}
	
	public function checkbox($name, $checked = false, $value = 'on', $text = null, $inline = false) {
		if(!$this->wrap) {
			$element = new BootSomeFormsGroupWrapBoxes('div');
			$this->appendChild($element);
			$element->at(['class'=>'col-sm-'.(12-$this->col)]);
			$this->wrap = $element;
			return $element->checkbox($name, $checked, $value, $text, $inline);
		}
		return $this->wrap->checkbox($name, $checked, $value, $text, $inline);
	}
	
	public function radio($name, $value, $checked = false, $text = null, $inline = false) {
		if(!$this->wrap) {
			$element = new BootSomeFormsGroupWrapBoxes('div');
			$this->appendChild($element);
			$element->at(['class'=>'col-sm-'.(12-$this->col)]);
			$this->wrap = $element;
			return $element->radio($name, $value, $checked, $text, $inline);
		}
		return $this->wrap->radio($name, $value, $checked, $text, $inline);
	}
	public function inputgroup() {
		$element = new BootSomeFormsGroupWrapBoxes('div');
		$this->appendChild($element);
		$element->at(['class'=>'col-sm-'.(12-$this->col)]);
		return $element->inputgroup();
	}
}

class BootSomeFormsGroupWrapBoxes extends BootSomeElement {
	use BootSomeFormsBoxes;
}

class BootSomeFormsRowElement extends BootSomeElement {
	use BootSomeFormsGroup, BootSomeFormsType;
}

class BootSomeFormsGroupElement extends BootSomeElement {
	use BootSomeFormsType, BootSomeFormsBoxes;
}

class BootSomeFormsInputGroup extends BootSomeElement {
	use BootSomeFormsBoxes;
	
	public function append() {
		$element = new BootSomeFormsInputGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'input-group-append']);
		return $element;
	}
	public function prepend() {
		$element = new BootSomeFormsInputGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'input-group-prepend']);
		return $element;
	}
	public function text($text) {
		return $this->el('div',['class'=>'input-group-text'])->te($text);
	}
}
?>