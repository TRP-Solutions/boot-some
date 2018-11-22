<?php
trait BootSomeFormNode {
	public function form_row(){
		$element = $this->el('div',['class'=>'form-row']);
		return $element;
	}

	public function form_group($col = null){
		$element = new BootSomeFormsGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'form-group']);
		if($col) {
			$element->at(['class'=>'col-md-'.(int) $col], HEAL_ATTR_APPEND);
		}
		return $element;
	}

	public function form_horizontal($col = null){
		$element = new BootSomeFormsHorizontal('div');
		$this->appendChild($element);
		$element->at(['class'=>'form-group form-row']);
		if($col) $element->col = (int) $col;
		return $element;
	}

	public function form_inline(){
		$this->at(['class'=>'form-inline'], HEAL_ATTR_APPEND);
		return $this;
	}

	public function input($name, $value = null){
		$input = parent::input($name, $value);
		$input->at(['class'=>'form-control']);
		return $input;
	}

	public function select($name){
		$select = parent::select($name);
		$select->at(['class'=>'custom-select']);
		return $select;
	}

	public function password($name){
		$input = parent::password($name);
		$input->at(['class'=>'form-control']);
		return $input;
	}

	public function file($name, $multiple = false){
		$div = $this->el('div',['class'=>'custom-file']);

		$input = $div->el('input',['type'=>'file','id'=>$name]);
		if($multiple) $input->at(['multiple'=>null])->at(['name'=>$name.'[]']);
		else $input->at(['name'=>$name]);

		$js = "this.value.substring(this.value.lastIndexOf('\\\\')+1,this.value.length)";
		$js = "(this.value.lastIndexOf('\\\\'))?$js:this.value";
		$js = "document.getElementById('filelabel_$name').innerHTML=$js;";
		$input->at(['onchange'=>$js]);

		$input->at(['class'=>'custom-file-input']);
		$div->el('label',['class'=>'custom-file-label','for'=>$name,'id'=>'filelabel_'.$name])->te('Choose file');
		return $input;
	}

	public function textarea($name, $content = ''){
		$textarea = parent::textarea($name, $content);
		$textarea->at(['class'=>'form-control']);
		return $textarea;
	}

	public function checkbox($name, $checked = false, $value = 'on', $text = null, $inline = false){
		$div = new HealHTMLElement('div');
		$this->appendChild($div);
		$div->at(['class'=>'form-check']);

		if($inline) $div->at(['class'=>'form-check-inline'], HEAL_ATTR_APPEND);
		$checkbox = $div->checkbox($name, $checked, $value);
		if(empty($text)) {
			$checkbox->at(['class'=>'form-check-input position-static']);
		}
		else {
			$checkbox->at(['class'=>'form-check-input']);
			$div->label($text,$name)->at(['class'=>'form-check-label']);
		}
		return $checkbox;
	}

	public function radio($name, $value, $checked = false, $text = null, $inline = false){
		$div = new HealHTMLElement('div');
		$this->appendChild($div);
		$div->at(['class'=>'form-check']);

		if($inline) $div->at(['class'=>'form-check-inline'], HEAL_ATTR_APPEND);
		$radio = $div->radio($name, $value, $checked);
		if(empty($text)) {
			$radio->at(['class'=>'form-check-input position-static']);
		}
		else {
			$radio->at(['class'=>'form-check-input']);
			$div->label($text,$name.':'.$value)->at(['class'=>'form-check-label']);
		}
		return $radio;
	}

	public function date($name, $value = null, $include_popover = true){
		$onclick = "if(typeof BootSomeForms!='undefined'&&typeof BootSomeForms.date=='function')BootSomeForms.date(this);";
		$input = $this->el('input',['type'=>'date','name'=>$name,'id'=>$name,'class'=>'form-control','onclick'=>$onclick]);
		if(isset($value)) $input->at(['value'=>$value]);
		if($include_popover){
			$popover = $this->el('div',['data-for'=>$name,'class'=>'popover fade','style'=>'display:none;width:276px;']);
			//$popover->el('div',['class'=>'arrow']);
			$header = $popover->el('div',['class'=>'btn-group d-flex']);
			$header->el('button',['class'=>'btn btn-primary','style'=>'border-bottom-left-radius:0;','data-action'=>'prev'])->el('span',['class'=>'fas fa-chevron-left']);
			$header->el('span',['class'=>'input-group-text flex-grow-1 d-flex justify-content-center rounded-0','style'=>'z-index:2;','data-content'=>'month_year'])->te('month / year');
			$header->el('button',['class'=>'btn btn-primary','style'=>'border-bottom-right-radius:0;','data-action'=>'next'])->el('span',['class'=>'fas fa-chevron-right']);
			$body = $popover->el('div',['class'=>'popover-body','data-calendar'=>null]);
			$row = $body->row()->at(['class'=>'no-gutters'],HEAL_ATTR_APPEND);
			$row->col('col',"d-flex justify-content-center");
			$row->col('col',"d-flex justify-content-center")->te('M');
			$row->col('col',"d-flex justify-content-center")->te('T');
			$row->col('col',"d-flex justify-content-center")->te('W');
			$row->col('col',"d-flex justify-content-center")->te('T');
			$row->col('col',"d-flex justify-content-center")->te('F');
			$row->col('col',"d-flex justify-content-center")->te('S');
			$row->col('col',"d-flex justify-content-center")->te('S');
			$template = $body->el('template',['data-name'=>'calendar-row']);
			$row = $template->row()->at(['class'=>'no-gutters'],HEAL_ATTR_APPEND);
			$row->at(['data-calendar-row'=>null]);
			$row->el('div',['class'=>'col d-flex justify-content-center align-items-center']);
			$row->el('button',['class'=>'col btn btn-light rounded-0']);
			$row->el('button',['class'=>'col btn btn-light rounded-0']);
			$row->el('button',['class'=>'col btn btn-light rounded-0']);
			$row->el('button',['class'=>'col btn btn-light rounded-0']);
			$row->el('button',['class'=>'col btn btn-light rounded-0']);
			$row->el('button',['class'=>'col btn btn-light rounded-0']);
			$row->el('button',['class'=>'col btn btn-light rounded-0']);
		}
		return $input;
	}

	public function inputgroup(){
		$element = new BootSomeFormsInputGroup('div');
		$this->appendChild($element);
		$element->at(['class'=>'input-group']);
		return $element;
	}

	public function button($text, $icon = null, $color = 'primary'){
		$button = $this->el('button',['class'=>'btn btn-'.$color]);
		if($icon) {
			$button->el('i',['class'=>'fas fa-'.$icon]);
		}
		$button->te($text);
		return $button;
	}
}

trait BootSomeNodeParent {
	use BootSomeFormNode;

	protected static function createElementHeal($name){
		return new BootSomeElement($name);
	}

	public function container($fluid = true){
		$head = $this->el('div')->at(['class'=>$fluid?'container-fluid':'container']);
		return $head;
	}

	public function row(){
		$element = new BootSomeRow('div');
		$this->appendChild($element);
		$element->at(['class'=>'row']);
		return $element;
	}

	public function navbar(){
		$element = new BootSomeNavbar('nav');
		$this->appendChild($element);
		$element->at(['class'=>'navbar navbar-expand-md']);
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

	public function pagination($total, $limit, $page, $url){
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

	public function alert($color = 'primary'){
		return $this->el('div',['class'=>'alert alert-'.$color]);
	}

	public function table(){
		$div = $this->el('div',['class'=>'table-responsive']);
		$element = new BootSomeTable('table');
		$div->appendChild($element);
		$element->at(['class'=>'table']);
		return $element;
	}

	public function icon($icon){
		return $this->el('i',['class'=>'fas fa-'.$icon]);
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

require_once(__DIR__.'/BootSomeNavbar.php');
require_once(__DIR__.'/BootSomeForms.php');
require_once(__DIR__.'/BootSomeModal.php');
require_once(__DIR__.'/BootSomeTables.php');

?>