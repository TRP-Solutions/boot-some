<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once __DIR__.'/BootSomeFormsInputGroup.php';
class BootSomeFormsFloating extends HealPlugin {
	public static function input($parent, $label, $value = null, $name = null, $id = null){
		$element = new Self($parent, $label, $value, $name, $id);
		return $element;
	}

	public static function password($parent, $label, $name = null, $id = null){
		$element = new Self($parent, $label, null, $name, $id);
		$element->at(['type'=>'password']);
		return $element;
	}

	public static function file($parent, $label, $name = null, $id = null, $icon = 'upload'){
		return new BootSomeFormsFloatingFile($parent, $label, $name, $id, $icon);
	}

	public static function select($parent, $label, $name = null, $id = null){
		return new BootSomeFormsFloatingSelect($parent, $label, $id);
	}

	public static function tokenselect($parent, $label, $name = null, $id = null, $include_select = true){
		$input_group = new BootSomeFormsInputGroup($parent);
		return new BootSomeFormsFloatingTokenSelect($input_group, $label, $name, $id, $include_select);
	}

	protected $id,$float_wrapper,$label,$input_group = null;
	public function __construct($parent, $label, $value = null, $name = null, $id = null){
		if(is_a($parent, '\BootSomeFormsInputGroup')){
			$this->input_group = $parent;
		}
		$this->id = $id ?? 'input_'.base64_encode(random_bytes(6));
		$this->float_wrapper = $parent->el('div',['class'=>'form-floating']);
		$this->primary_element = $this->float_wrapper->el('input',['class'=>'form-control','type'=>'text','placeholder'=>$label,'id'=>$this->id]);
		$this->label = $this->float_wrapper->el('label',['for'=>$this->id])->te($label);
		if(isset($name)){
			$this->primary_element->at(['name'=>$name]);
		}
		if(isset($value)){
			$this->primary_element->at(['value'=>$value]);
		}
	}

	public function datalist($datalist){
		$list_id = 'datalist_'.base64_encode(random_bytes(6));
		$this->input->at(['list'=>$list_id]);
		$list = $this->primary_element->el('datalist',['id'=>$list_id]);
		foreach($datalist as $option){
			$list->el('option',['value'=>$option]);
		}
	}

	public function get_wrapper(){
		return $this->float_wrapper;
	}

	public function get_input_group(){
		return $this->input_group;
	}
}

class BootSomeFormsFloatingFile extends HealWrapper {
	public function __construct($parent, $label, $name = null, $id = null, $icon = null){
		$this->input_group = new BootSomeFormsInputGroup($parent);
		$this->id = $id ?? 'input_'.base64_encode(random_bytes(6));
		$this->float_wrapper = $this->input_group->el('div',['class'=>'form-floating']);

		$onchange = "this.parentElement.querySelector('input[type=text]').value=this.files[0]?this.files[0].name:'';";
		$this->primary_element = $this->float_wrapper->el('input',['type'=>'file','id'=>$this->id,'class'=>'d-none','onchange'=>$onchange]);

		$js = "this.parentElement.parentElement.querySelector('input[type=file]').click();";
		$this->float_wrapper->el('input',['type'=>'text','readonly','class'=>'form-control','placeholder','onclick'=>$js]);
		$this->label = $this->float_wrapper->el('label',['for'=>$this->id])->te($label);

		$js = "this.parentElement.querySelector('input[type=file]').click();event.preventDefault();";
		$this->input_group->button($js, $icon, 'outline-secondary');

		if(isset($name)){
			$this->primary_element->at(['name'=>$name]);
		}
	}

	public function get_wrapper(){
		return $this->float_wrapper;
	}

	public function get_input_group(){
		return $this->input_group;
	}
}

class BootSomeFormsFloatingSelect extends HealWrapper {
	public function __construct($parent, $label, $name = null, $id = null){
		if(is_a($parent, '\BootSomeFormsInputGroup')){
			$this->input_group = $parent;
		}
		$this->id = $id ?? 'input_'.base64_encode(random_bytes(6));
		$this->float_wrapper = $parent->el('div',['class'=>'form-floating']);
		$this->primary_element = $this->float_wrapper->el('select',['class'=>'form-select','id'=>$this->id]);
		$this->label = $this->float_wrapper->el('label',['for'=>$this->id])->te($label);
		if(isset($name)){
			$this->primary_element->at(['name'=>$name]);
		}
	}

	public function get_wrapper(){
		return $this->float_wrapper;
	}

	public function get_input_group(){
		return $this->input_group;
	}

	public function option($text, $value = null, $selected = false){
		$option = $this->primary_element->el('option')->te($text);
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
}

class BootSomeFormsFloatingTokenSelect extends BootSomeFormsFloatingSelect {
	protected $container, $option_names = [], $option_elements = [], $token_elements = [], $name;
	public function __construct($parent, $label, $name = null, $id = null, $include_select = true){
		if(is_a($parent, '\BootSomeFormsInputGroup')){
			$this->input_group = $parent;
		}
		$this->id = $id ?? 'input_'.base64_encode(random_bytes(6));
		$this->float_wrapper = $parent->el('div',['class'=>'form-floating bootsome-token-field']);
		$this->primary_element = $this->float_wrapper->el('select',['class'=>'form-select bootsome-token-select','id'=>$this->id,'onchange'=>'BootSomeTokenSelect.set(this);']);
		$this->label = $this->float_wrapper->el('label',['for'=>$this->id])->te($label);
		if(isset($name)){
			$this->primary_element->at(['name'=>$name]);
		}
		$this->option('');
		$this->container = $this->float_wrapper->el('div',['class'=>'bootsome-token-container']);
		$template = $this->container->el('template',['data-tmpl-name'=>'bootsome-token-template']);
		$this->build_token($template, '', '');
	}

	public function token($value, $label = null){
		$token = $this->build_token($this->container, $value, $label ?? $this->get_option_label($value));
		$this->token_elements[$value] = $token;
		if(isset($this->option_elements[$value])){
			$this->option_elements[$value]->at(['disabled']);
		}
		return $token;
	}

	private function build_token($parent, $value, $label){
		$token = $parent->el('button',[
			'class'=>'btn btn-outline-secondary',
			'onclick'=>'BootSomeTokenSelect.remove(this,event);',
			'data-token-value'=>$value,
			'data-tmpl'=>'data-tokenValue:value'
		]);
		$token->el('span',['data-tmpl'=>'content:label'])->te($label);
		$token_input = $token->el('input',['type'=>'hidden','value'=>$value,'data-tmpl'=>'value:value']);
		if(!empty($this->name)){
			$token_input->at(['name'=>$this->name.'[]']);
		}
		return $token;
	}

	private function get_option_label($value){
		return $this->option_names[$value] ?? '';
	}

	public function tokens($iterable,$associative = false){
		if(is_a($iterable, 'mysqli_result')){
			foreach($iterable as $row){
				$this->token($row['id'],$row['name'] ?? null);
			}
		} else {
			foreach($iterable as $key => $value){
				if($associative){
					$this->token($key, $value);
				} else {
					$this->token($value);
				}
			}
		}
		return $this;
	}

	public function option($text, $value = null, $selected = false){
		$option = parent::option($text, $value, $selected);
		if(isset($value)){
			$this->option_names[$value] = $text;
			$this->option_elements[$value] = $option;
		}
		return $option;
	}
}

