<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once __DIR__.'/BootSomeFormsInputGroup.php';
class BootSomeFormsFloating extends HealPlugin {
	public static function input($parent, $label, $type = 'text', $value = null, $name = null, $id = null){
		$element = new Self($parent, $id);
		$element->build_input($type);
		$element->set_name_and_value($name, $value);
		$element->build_label($label);
		return $element;
	}

	public static function file($parent, $label, $name = null, $id = null, $icon = 'upload'){
		$input_group = new BootSomeFormsInputGroup($parent);
		$element = new Self($input_group, $id);

		$onchange = "this.parentElement.querySelector('input[type=text]').value=this.files[0]?this.files[0].name:'';";
		$element->input = $element->el('input',['type'=>'file','id'=>$element->id,'class'=>'d-none','onchange'=>$onchange]);
		$element->set_name_and_value($name);

		$js = "this.parentElement.parentElement.querySelector('input[type=file]').click();";
		$element->el('input',['type'=>'text','readonly','class'=>'form-control','placeholder','onclick'=>$js]);

		$element->build_label($label);

		$js = "this.parentElement.querySelector('input[type=file]').click();event.preventDefault();";
		$input_group->button($js, $icon, 'outline-secondary');

		return $element;
	}

	public static function select($parent, $label, $name = null, $id = null){
		$element = new Self($parent, $id);
		$element->build_select();
		$element->set_name_and_value($name);
		$element->build_label($label);
		return $element;
	}

	private $id,$input,$label,$input_group = null;
	public function __construct($parent, $id = null){
		if(is_a($parent, '\BootSomeFormsInputGroup')){
			$this->input_group = $parent;
		}
		$this->id = $id ?? 'input_'.base64_encode(random_bytes(6));
		$this->primary_element = $parent->el('div',['class'=>'form-floating']);
	}

	public function option($text, $value = null, $selected = false){
		$option = $this->input->el('option')->te($text);
		if($selected) $option->at(['selected']);
		if(isset($value)) $option->at(['value'=>$value]);
		return $option;
	}

	public function options($iterable, $selected = null, $strict_compare = false){
		if(is_a($iterable, 'mysqli_result')){
			foreach($iterable as $row){
				$is_selected = isset($selected) && ($strict_compare ? $selected === $row['id'] : $selected == $row['id']);
				$this->option($row['name'],$row['id'],$is_selected);
			}
		} else {
			foreach($iterable as $value => $text){
				$is_selected = isset($selected) && ($strict_compare ? $selected === $value : $selected == $value);
				$this->option($text, $value, $is_selected);
			}
		}
		return $this;
	}

	private function build_input($type){
		$this->input = $this->primary_element->el('input',['class'=>'form-control','placeholder','id'=>$this->id,'type'=>$type]);
	}

	private function build_select(){
		$this->input = $this->primary_element->el('select',['class'=>'form-select','id'=>$this->id]);
	}

	private function set_name_and_value($name = null, $value = null){
		if(isset($name)){
			$this->input->at(['name'=>$name]);
		}
		if(isset($value)){
			$this->input->at(['value'=>$value]);
		}
	}

	private function build_label($label){
		$this->label = $this->primary_element->el('label',['for'=>$this->id])->te($label);
	}

	public function datalist($datalist){
		$list_id = 'datalist_'.base64_encode(random_bytes(6));
		$this->input->at(['list'=>$list_id]);
		$list = $this->primary_element->el('datalist',['id'=>$list_id]);
		foreach($datalist as $option){
			$list->el('option',['value'=>$option]);
		}
	}

	public function get_input(){
		return $this->input;
	}

	public function get_input_group(){
		return $this->input_group;
	}
}

