<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
trait BootSomeFormNode {
	private $inlinewrap = null; // https://github.com/twbs/bootstrap/issues/27987

	public function form_row(){
		//Legacy Support
		$element = $this->el('div',['class'=>'row']);
		return $element;
	}

	public function form_group($col = null,$left = false){
		$element = new BootSomeFormsGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'mb-2']);
		if($left) $element->at(['class'=>'text-end'],HEAL_ATTR_APPEND);
		if($col) {
			$element->at(['class'=>'col-md-'.(int) $col], HEAL_ATTR_APPEND);
		}
		return $element;
	}

	public function form_horizontal($col = null){
		$element = new BootSomeFormsHorizontal('div');
		$this->appendChild($element);
		$element->at(['class'=>'row']);
		if($col) $element->col = (int) $col;
		return $element;
	}

	public function form_inline(){
		$element = new BootSomeFormsInline('div');
		$this->appendChild($element);
		$element->at(['class'=>'row row-cols-sm-auto gx-2 form-inline']);
		return $element;
	}

	public function label($text = null, $for = null){
		$label = parent::label($text, $for);
		$label->at(['class'=>'form-label'], HEAL_ATTR_APPEND);
		return $label;
	}

	public function input($name, $value = null){
		$input = parent::input($name, $value);
		$input->at(['class'=>'form-control']);
		return $input;
	}

	public function select($name){
		$select = parent::select($name);
		$select->at(['class'=>'form-select']);
		return $select;
	}

	public function password($name){
		$input = parent::password($name);
		$input->at(['class'=>'form-control']);
		return $input;
	}

	public function file($name, $multiple = false){
		$input = $this->el('input',['class'=>'form-control','type'=>'file','id'=>$name]);
		if($multiple) $input->at(['multiple'])->at(['name'=>$name.'[]']);
		else $input->at(['name'=>$name]);
		return $input;
	}

	public function textarea($name, $content = ''){
		$textarea = parent::textarea($name, $content);
		$textarea->at(['class'=>'form-control']);
		return $textarea;
	}

	public function checkbox($name, $checked = false, $value = 'on', $text = null, $inline = false){
		if(!$inline) {
			$div = new HealHTMLElement('div');
			$this->appendChild($div);
			$div->at(['class'=>'form-check']);
			$this->inlinewrap = null;
		}
		else {
			if(!$this->inlinewrap) {
				$this->inlinewrap = new HealHTMLElement('div');
				$this->appendChild($this->inlinewrap);
			}
			$div = new HealHTMLElement('div');
			$this->inlinewrap->appendChild($div);
			$div->at(['class'=>'form-check form-check-inline']);
		}

		$checkbox = $div->checkbox($name, $checked, $value);
		if(empty($text)) {
			$checkbox->at(['class'=>'form-check-input position-static']);
		}
		else {
			if(substr($name, -2)=='[]'){
				$id = substr($name, 0, -2).'_'.mt_rand(10000,99999);
				$checkbox->at(['id'=>$id]);
			} else {
				$id = $name;
			}
			$checkbox->at(['class'=>'form-check-input']);
			$div->label($text,$id)->at(['class'=>'form-check-label']);
		}
		return $checkbox;
	}

	public function radio($name, $value, $checked = false, $text = null, $inline = false){
		if(!$inline) {
			$div = new HealHTMLElement('div');
			$this->appendChild($div);
			$div->at(['class'=>'form-check']);
			$this->inlinewrap = null;
		}
		else {
			if(!$this->inlinewrap) {
				$this->inlinewrap = new HealHTMLElement('div');
				$this->appendChild($this->inlinewrap);
			}
			$div = new HealHTMLElement('div');
			$this->inlinewrap->appendChild($div);
			$div->at(['class'=>'form-check form-check-inline']);
		}

		$radio = $div->radio($name, $value, $checked);
		if(empty($text)) {
			$radio->at(['class'=>'form-check-input position-static']);
		}
		else {
			if(substr($name, -2)=='[]'){
				$id = substr($name, 0, -2).'_'.mt_rand(10000,99999);
				$checkbox->at(['id'=>$id.':'.$value]);
			} else {
				$id = $name;
			}
			$radio->at(['class'=>'form-check-input']);
			$div->label($text,$id.':'.$value)->at(['class'=>'form-check-label']);
		}
		return $radio;
	}

	public function date($name, $value = null){
		$onclick = "if(typeof BootSomeForms!='undefined'&&typeof BootSomeForms.date=='function')BootSomeForms.date(this);";
		$input = $this->el('input',['type'=>'date','name'=>$name,'id'=>$name,'class'=>'form-control','onclick'=>$onclick]);
		if(isset($value)) $input->at(['value'=>$value]);
		return $input;
	}

	public function inputgroup(){
		$element = new BootSomeFormsInputGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'input-group']);
		return $element;
	}

	public function button($text, $icon = null, $color = 'primary', $link = null){
		$button = $this->el($link ? 'a' : 'button',['class'=>'btn btn-'.$color]);
		if($link) $button->at(['href'=>$link]);
		else $button->at(['type'=>'button']);
		if($icon) $button->el('i',['class'=>'fas fa-'.$icon]);
		if($text) $button->el('span')->te($text);
		return $button;
	}
}

trait BootSomeNodeParent {
	use BootSomeFormNode;

	protected static function createElementHeal($name){
		return new BootSomeElement($name);
	}

	public function container($fluid = false, $element = 'div'){
		$head = $this->el($element)->at(['class'=>$fluid?'container-fluid':'container']);
		return $head;
	}

	public function row(){
		$element = new BootSomeRow('div');
		$this->appendChild($element);
		$element->at(['class'=>'row']);
		return $element;
	}

	public function navbar($fluid = true, $nav_classes = ''){
		$nav = $this->el('nav',['class'=>'navbar navbar-expand-md'.(!empty($nav_classes)?' '.$nav_classes:'')]);

		$element = new BootSomeNavbar('div');
		$nav->appendChild($element);
		$element->at(['class'=>$fluid?'container-fluid':'container']);
		return $element;
	}

	public function navs($type = null){
		$element = new BootSomeNavs('ul');
		$this->appendChild($element);
		$element->at(['class'=>'nav']);
		if($type) $element->at(['class'=>'nav-'.$type],HEAL_ATTR_APPEND);
		return $element;
	}

	public function modal(){
		$dialog = $this->el('div',['class'=>'modal']);
		$dialog = $dialog->el('div',['class'=>'modal-dialog']);

		$element = new BootSomeModal('div');
		$dialog->appendChild($element);
		$element->at(['class'=>'modal-content']);

		$this->el('div',['class'=>'modal-backdrop']);
		return $element;
	}

	public function carousel($id = 'slide'){
		$element = new BootSomeCarousel('div',$id);
		$this->appendChild($element);
		$element->at(['id'=>$id,'class'=>'carousel slide carousel-fade','data-bs-ride'=>'carousel']);
		return $element;
	}

	public function card(){
		$element = new BootSomeCard('div');
		$this->appendChild($element);
		$element->at(['class'=>'card']);
		return $element;
	}

	public function pagination($total, $limit, $page, $url){
		if($total<=$limit) return; 

		$pages = (ceil($total/$limit));
		$nav = $this->el('nav')->el('ul',['class'=>'pagination']);

		$li = $nav->el('li',['class'=>'page-item']);
		$button = $li->el('button',['class'=>'page-link'])->te('«');
		if($page==1) {
			$li->at(['class'=>'disabled'],HEAL_ATTR_APPEND);
		}
		else {
			$button->at($url($page-1));
			$button->at(['accesskey'=>'p']);
		}

		if($page>4 && $pages>7) {
			$li = $nav->el('li',['class'=>'page-item']);
			$button = $li->el('button',['class'=>'page-link'])->te('1');
			$button->at($url(1));

			$li = $nav->el('li',['class'=>'page-item']);
			$button = $li->el('button',['class'=>'page-link'])->te('…');
			$li->at(['class'=>'disabled'],HEAL_ATTR_APPEND);

			if($page<($pages-4)) {
				$start = $page - 1;
			}
			else {
				$start = ($page<($pages-3)) ? $page - 1 : $pages-4;
			}
		}
		else {
			$start = 1;
		}

		if($pages>7) {
			if($page<5) {
				$end = 5;
			}
			else {
				$end = ($page<($pages-3)) ? $page + 1 : $pages;
			}
		}
		else {
			$end = $pages;
		}

		for($i=$start;$i<=$end;$i++) {
			$li = $nav->el('li',['class'=>'page-item']);
			$button = $li->el('button',['class'=>'page-link'])->te($i);
			if($page==$i) {
				$li->at(['class'=>'active'],HEAL_ATTR_APPEND);
			}
			else {
				$button->at($url($i));
			}
		}

		if($page<($pages-3) && $pages>7) {
			$li = $nav->el('li',['class'=>'page-item']);
			$button = $li->el('button',['class'=>'page-link'])->te('…');
			$li->at(['class'=>'disabled'],HEAL_ATTR_APPEND);

			$li = $nav->el('li',['class'=>'page-item']);
			$button = $li->el('button',['class'=>'page-link'])->te($pages);
			$button->at($url($pages));
		}

		$li = $nav->el('li',['class'=>'page-item']);
		$button = $li->el('button',['class'=>'page-link'])->te('»');
		if($page==ceil($total/$limit)) {
			$li->at(['class'=>'disabled'],HEAL_ATTR_APPEND);
		}
		else {
			$button->at($url($page+1));
			$button->at(['accesskey'=>'n']);
		}
	}

	public function alert($color = null,$center = false){
		if($color===null) $color = 'primary';
		$alert = $this->el('div',['class'=>'alert alert-'.$color]);
		if($center) $alert->at(['class'=>'text-center'],HEAL_ATTR_APPEND);
		return $alert;
	}

	public function badge($color = 'primary'){
		return $this->at(['class'=>'badge bg-'.$color],HEAL_ATTR_APPEND);
	}

	public function spinner(){
		return $this->el('i',['class'=>'fas fa-2x fa-spinner fa-spin'],HEAL_ATTR_APPEND);
	}

	public function breadcrumb($input = [],$prefix = '') {
		$ol = $this->el('nav')->el('ol',['class'=>'breadcrumb']);

		foreach($input as $item) {
			if(isset($item['link'])) {
				$a = $ol->el('li',['class'=>'breadcrumb-item'])->a($prefix.$item['link'])->te($item['name']);
			}
			else {
				$a = $ol->el('li',['class'=>'breadcrumb-item active'])->te($item['name']);
			}
		}
	}

	public function dropdown($text,$color = 'primary'){
		$div = $this->el('div', ['class'=>'dropdown']);
		$div->el('button',['class'=>'btn btn-'.$color.' dropdown-toggle','data-bs-toggle'=>'dropdown'])->te($text);

		$element = new BootSomeDropDown('ul');
		$div->appendChild($element);
		$element->at(['class'=>'dropdown-menu']);
		return $element;
	}

	public function ratio($aspect = '16x9'){
		return $this->el('div',['class'=>'ratio ratio-'.$aspect]);
	}

	public function jumbotron(){
		//Legacy Support
		return $this->el('div',['class'=>'px-4 py-5 mb-4 bg-light rounded-3']);
	}

	public function table(){
		$div = $this->el('div',['class'=>'table-responsive']);
		$element = new BootSomeTable('table');
		$div->appendChild($element);
		$element->at(['class'=>'table']);
		return $element;
	}

	public function icon($icon,$fullclass = false){
		$this->el('i',['class'=>$fullclass ? $icon : 'fas fa-'.$icon]);
		return $this;
	}

	public function display(...$class){
		if(!$class) return;
		$class = 'd-'.implode(' d-',$class);
		return $this->at(['class'=>$class],HEAL_ATTR_APPEND);
	}
}

class BootSome extends HealHTML {
	use BootSomeNodeParent;
}

class BootSomeElement extends HealHTMLElement {
	use BootSomeNodeParent;
}

class BootSomeRow extends BootSomeElement {
	public function col(...$class) {
		$class = implode(' ',$class);
		return $this->el('div',['class'=>$class]);
	}
}

require_once(__DIR__.'/BootSomeCarousel.php');
require_once(__DIR__.'/BootSomeCard.php');
require_once(__DIR__.'/BootSomeDropdown.php');
require_once(__DIR__.'/BootSomeNavbar.php');
require_once(__DIR__.'/BootSomeNavs.php');
require_once(__DIR__.'/BootSomeForms.php');
require_once(__DIR__.'/BootSomeModal.php');
require_once(__DIR__.'/BootSomeTables.php');
