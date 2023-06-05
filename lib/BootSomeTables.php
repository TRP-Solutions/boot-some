<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once __DIR__.'/component.php';

class BootSomeTable extends HealPlugin {
	public static function table($parent){
		return new BootSomeTable($parent);
	}

	public function __construct($parent){
		$this->primary_element = $parent->el('table',['class'=>'table']);
	}

	public function thead(){
		return new BootSomeTableNode($this->primary_element,'thead');
	}

	public function tbody(){
		return new BootSomeTableNode($this->primary_element,'tbody');
	}

	public function tfoot(){
		return new BootSomeTableNode($this->primary_element,'tfoot');
	}
}

class BootSomeTableNode extends BootSomeComponent {
	public function __construct($parent, $type){
		$this->primary_element = $parent->el($type);
	}

	public function tr($color = null){
		return new BootSomeTableRow($this->primary_element, $color);
	}

	public function tr_template($arr){
		$node = new BootSomeTableNode($this->primary_element,'template');
		$node->at($arr);
	}
}

class BootSomeTableRow extends BootSomeComponent {
	public function __construct($parent, $color = null){
		$this->primary_element = $parent->el('tr');
		if($color) $element->el(['class'=>'table-'.$color]);
	}

	public function td($color = null){
		$element = $this->primary_element->el('td');
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}

	public function th($color = null){
		$element = $this->primary_element->el('th');
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}
}
