<?php
class BootSomeCarousel extends BootSomeElement {
	private $id;
	private $inner = null;
	private $items = 0;

	function __construct($element,$id = 'slide'){
		$this->id = $id;
		parent::__construct($element);
	}

	public function item($url,$alt){
		$this->inner();
		$item = new BootSomeCarouselItem('div');
		$this->inner->appendChild($item);
		$item->at(['class'=>'carousel-item']);
		if($this->items++==0) $item->at(['class'=>'active'],HEAL_ATTR_APPEND);
		$item->img($url,$alt)->at(['class'=>'d-block w-100']);
		return $item;
	}

	private function inner(){
		if(!$this->inner){
			$element = new BootSomeElement('div');
			$this->appendChild($element);
			$element->at(['class'=>'carousel-inner']);
			$this->inner = $element;
		}
	}

	public function indicators(){
		$indicators = $this->el('ol',['class'=>'carousel-indicators']);
		for($i=0;$i<$this->items;$i++) {
			$li = $indicators->el('li',['data-target'=>'#'.$this->id,'data-slide-to'=>$i]);
			if($i==0) $li->at(['class'=>'active'],HEAL_ATTR_APPEND);
		}
	}

	public function control(){
		$a = $this->a('#'.$this->id)->at(['class'=>'carousel-control-prev','role'=>'button','data-slide'=>'prev']);
		$a->el('span',['class'=>'carousel-control-prev-icon']);
	
		$a = $this->a('#'.$this->id)->at(['class'=>'carousel-control-next','role'=>'button','data-slide'=>'next']);
		$a->el('span',['class'=>'carousel-control-next-icon']);
	}
}

class BootSomeCarouselItem extends BootSomeElement {
	public function caption($text = null){
		$caption = $this->el('div',['class'=>'carousel-caption']);
		if($text) $caption->p($text);
		return $caption;
	}
}
?>
