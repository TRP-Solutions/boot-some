/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
function bodyload() {
	Ufo.callback_add('dialog','get','dialog_get');
	Ufo.callback_add('dialog','abort','dialog_abort');
	Ufo.callback_add('dialog','post','dialog_post');
	Ufo.callback_add('main','get','main_get');
}
function active() {
	group = event.target.parentElement.parentElement.querySelectorAll('item')
	group.forEach(a => {
	  var other = a.querySelectorAll('a')[0].classList.remove('active');
	});
	event.target.classList.add('active');
}
Ufo.callback_functions.dialog_get = function(){
	if(!window.dialogopen){
		document.getElementById('body').classList.add('modal-open');
		dialog.style.display = 'block';
	}
	window.dialogopen = true;
}
Ufo.callback_functions.dialog_abort = function(){
	if(window.dialogopen){
		var dialog = document.getElementById('dialog');
		dialog.style.display = 'none';
		dialog.innerHTML='';
		document.getElementById('body').classList.remove('modal-open');
	}
	window.dialogopen = false;
}
Ufo.callback_functions.alert = function(string){
	alert(string);
}
Ufo.callback_functions.focus = function(string){
	document.getElementById(string).focus();
}
Ufo.callback_functions.reload = function(url = false){
	if(url===false) {
		location.reload();
	}
	else {
		window.location.href = url;
	}
}
Ufo.callback_functions.dialog_post = function(form){
	if(form){
		for(var i = 0, element; element = form.elements[i++];) {
			if(element.type === "submit") {
				element.style.width = element.getBoundingClientRect()['width']+'px';
				element.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
				element.disabled = true;
			}
		}
	}
}
Ufo.callback_functions.main_get = function(){
	document.cookie = "lastpage="+Ufo.url('main');
}
