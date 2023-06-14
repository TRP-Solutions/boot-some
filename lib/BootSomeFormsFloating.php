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

	public static function tokenselect($parent, $label, $name = null, $id = null, $include_select = true){
		$input_group = new BootSomeFormsInputGroup($parent);
		return new BootSomeFormsFloatingTokenSelect($input_group, $label, $name, $id, $include_select);
	}

	protected $id,$input,$label,$input_group = null;
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

	protected function build_input($type){
		$this->input = $this->primary_element->el('input',['class'=>'form-control','placeholder','id'=>$this->id,'type'=>$type]);
	}

	protected function build_select(){
		$this->input = $this->primary_element->el('select',['class'=>'form-select','id'=>$this->id]);
	}

	protected function set_name_and_value($name = null, $value = null){
		if(isset($name)){
			$this->input->at(['name'=>$name]);
		}
		if(isset($value)){
			$this->input->at(['value'=>$value]);
		}
	}

	protected function build_label($label){
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

class BootSomeFormsFloatingTokenSelect extends BootSomeFormsFloating {
	protected $container, $option_names = [], $option_elements = [], $token_elements = [], $name;
	public function __construct($parent, $label, $name = null, $id = null, $include_select = true){
		parent::__construct($parent,$id);
		$this->primary_element->at(['class'=>'bootsome-token-field'],true);
		$this->name = $name;
		if($include_select){
			$this->build_select();
			$this->option('');
			$this->input->at(['onchange'=>'BootSomeTokenSelect.set(this);','class'=>'bootsome-token-select'],true);
		}
		$this->build_label($label);
		$this->container = $this->primary_element->el('div',['class'=>'bootsome-token-container']);
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
		$option = $this->input->el('option')->te($text);
		if($selected) $option->at(['selected']);
		if(isset($value)){
			$option->at(['value'=>$value]);
			$this->option_names[$value] = $text;
			$this->option_elements[$value] = $option;
		}
		return $option;
	}
}

