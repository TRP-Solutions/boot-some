<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
class BootSomeBasic extends HealPlugin {
	public static function img($parent, $src, $alt){
		return $parent->el('img',['src'=>$src,'alt'=>$alt]);
	}

	public static function p($parent, $text, $break_on_newline = true){
		return $parent->el('p')->te($text, $break_on_newline);
	}

	public static function a($parent, $href, $text = ''){
		$a = $parent->el('a', ['href'=>$href]);
		if(!empty($text)) $a->te($text);
		return $a;
	}

	public static function form($parent, $action = '', $method = 'get'){
		$attr = [];
		if(!empty($action)){
			$attr['action'] = $action;
			$attr['method'] = $method;
		} else {
			$attr['onsubmit'] = 'return false;';
		}
		return $parent->el('form', $attr);
	}
}
