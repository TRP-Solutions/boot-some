<?php
class BootSomeFormsGroup extends BootSomeElement {
	public function text($text){
		$this->el('small',['class'=>'form-text'])->te($text);
	}
}

class BootSomeFormsHorizontal extends BootSomeElement {
	public $col = 3;
	private $wrap = null;

	private function wrap(){
		if(!$this->wrap){
			$element = new BootSomeElement('div');
			$this->appendChild($element);
			$element->at(['class'=>'col-sm-'.(12-$this->col)]);
			$this->wrap = $element;
		}
	}

	public function label($text = null, $for = null){
		$label = parent::label($text,$for);
		$label->at(['class'=>'col-form-label col-sm-'.$this->col], HEAL_ATTR_APPEND);
		return $label;
	}

	public function input($name, $value = NULL){
		$this->wrap();
		return $this->wrap->input($name, $value);
	}

	public function password($name){
		$this->wrap();
		return $this->wrap->password($name);
	}

	public function file($name, $multiple = false){
		$this->wrap();
		return $this->wrap->file($name, $multiple);
	}

	public function select($name){
		$this->wrap();
		return $this->wrap->select($name);
	}

	public function textarea($name, $content = ''){
		$this->wrap();
		return $this->wrap->textarea($name, $content);
	}

	public function checkbox($name, $checked = false, $value = 'on', $text = null, $inline = false){
		$this->wrap();
		return $this->wrap->checkbox($name, $checked, $value, $text, $inline);
	}

	public function radio($name, $value, $checked = false, $text = null, $inline = false){
		$this->wrap();
		return $this->wrap->radio($name, $value, $checked, $text, $inline);
	}

	public function inputgroup(){
		$this->wrap();
		return $this->wrap->inputgroup();
	}

	public function text($text){
		$this->wrap->el('small',['class'=>'form-text'])->te($text);
	}
}

class BootSomeFormsInputGroup extends BootSomeElement {
	public function append(){
		$element = new BootSomeFormsInputGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'input-group-append']);
		return $element;
	}

	public function prepend(){
		$element = new BootSomeFormsInputGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'input-group-prepend']);
		return $element;
	}

	public function text($text){
		return $this->el('div',['class'=>'input-group-text'])->te($text);
	}
}
?>