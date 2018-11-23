var BootSomeForms = (function(){
	function initialize(className){
		return function(input){
			if(typeof input.removeAttribute=='function'){
				input.removeAttribute('onclick');
			}
			if(typeof Popper=='function'){
				initClasses()
				if(classes[className]) new classes[className](input);
			}
		}
	}

	var classes = {};
	var monthLengths = {1:31,2:28,3:31,4:30,5:31,6:30,7:31,8:31,9:30,10:31,11:30,12:31};
	var initClasses = function(){
		class DateInput {
			constructor(input){
				this.popover = input.parentElement.querySelector('.popover[data-for="'+input.id+'"]');
				if(this.popover){
					if(typeof Intl == 'object' && typeof Intl.DateTimeFormat == 'function'){
						this.monthFormatter = new Intl.DateTimeFormat('en-US',{month:'long',year:'numeric'});
					} else {
						this.monthFormatter = {format:(date)=>date.getMonth()+'/'+date.getYear()};
					}

					this.input = input;
					input.onclick=()=>this.show();

					this.show();
				}
			}

			build(month, year){
				var template = this.popover.querySelector('template[data-name="calendar-row"]');
				var calendar = this.popover.querySelector('[data-calendar]');
				if(!template || !calendar) return;
				var rows = calendar.querySelectorAll('[data-calendar-row]');
				for(var i=0;i<rows.length;i++){
					rows[i].parentElement.removeChild(rows[i]);
				}
				var last_month = month-1;
				var last_month_year = year;
				var next_month = month+1;
				var next_month_year = year;
				if(month==1){
					last_month = 12;
					last_month_year = year-1;
				} else if(month==12){
					next_month = 1;
					next_month_year = year+1;
				}
				var month_end = this.monthLength(month,year);
				var last_month_end = this.monthLength(last_month,last_month_year);

				const build_row=(week_number, start_date)=>{
					var row = template.content.cloneNode(true);
					var cells = Array.from(row.firstChild.children);
					cells[0].textContent = week_number
					var date = start_date;
					for(var i=1;i<8;i++){
						var button_class = undefined;
						if(date <= 0){
							var real_date = date + last_month_end;
							var real_month = last_month;
							var real_year = last_month_year;
							button_class = 'btn-secondary';
						} else if(date > month_end){
							real_date = date - month_end;
							real_month = next_month;
							real_year = next_month_year;
							button_class = 'btn-secondary';
						} else {
							real_date = date;
							real_month = month;
							real_year = year;
						}
						if(real_year==this.value.year && real_month==this.value.month && real_date==this.value.date){
							button_class = 'btn-primary';
							cells[i].focus();
						} else if(real_year==this.today.year && real_month==this.today.month && real_date==this.today.date){
							button_class = 'btn-outline-info';
						}
						cells[i].textContent = real_date;
						cells[i].onclick=this.writeClick(real_date,real_month,real_year);
						if(button_class){
							cells[i].classList.remove('btn-light');
							cells[i].classList.add(button_class);
						}
						date++;
					}
					calendar.appendChild(row);
				}

				var first = new Date(year,month-1,1);
				// get week day of first of this month, shifted so 0-6 is monday-sunday
				var first_weekday = (first.getDay()+6)%7;
				// set date to monday of the first week of the month
				// values < 1 is a date of previous month; 0 = last day of previous month
				var date = 1-first_weekday;
				var week_number = first.getWeek();
				while(date <= month_end){
					build_row(week_number,date);
					week_number += 1;
					date += 7;
				}

				var title = this.popover.querySelector('[data-content=month_year]');
				var prev = this.popover.querySelector('[data-action=prev]');
				var next = this.popover.querySelector('[data-action=next]');

				title.textContent = this.monthFormatter.format(first);
				prev.onclick=()=>{this.build(last_month, last_month_year);this.popper.update()};
				next.onclick=()=>{this.build(next_month, next_month_year);this.popper.update()};
			}

			monthLength(month,year){
				if(month==2 && year%4==0&&year%100!=0||year%400==0) return 29;
				else return monthLengths[month];
			}

			writeClick(date,month,year){
				return ()=>this.write(date,month,year);
			}

			write(date,month,year){
				if(month<10) month='0'+month;
				if(date<10) date='0'+date;
				this.input.value = year+'-'+month+'-'+date;
				this.hide();
			}

			show(){
				console.log('show');
				if(this.input.type=='text') return;
				if(this.hide_timeout) clearTimeout(this.hide_timeout);
				this.input.type='text';
				var today = new Date();
				this.today = {date:today.getDate(),month:today.getMonth()+1,year:today.getFullYear()};
				if(this.input.value){
					var value = new Date(this.input.value);
					this.value = {date:value.getDate(),month:value.getMonth()+1,year:value.getFullYear()};
				} else {
					this.value = {date:undefined,month:undefined,year:undefined};
				}
				this.build(this.value.month||this.today.month,this.value.year||this.today.year);
				this.popper = new Popper(this.input,this.popover,{placement:'bottom-start'});
				this.popover.style.display='';
				this.popover.classList.add('show');
				this.windowEventListener = event=>this.clickHandler(event);
				window.addEventListener('click',this.windowEventListener);
			}

			hide(){
				this.input.type = 'date';
				this.popover.classList.remove('show');
				this.hide_timeout = setTimeout(()=>{
					this.popover.style.display='none';
					this.popper.destroy();
					delete this.popper;
					delete this.hide_timeout;
				},150);
				if(this.windowEventListener){
					window.removeEventListener('click',this.windowEventListener);
					delete this.windowEventListener
				}
			}

			clickHandler(event){
				var elem = event.target;
				while(elem){
					if(elem==this.popover||elem==this.input) return;
					elem = elem.parentElement;
				}
				this.hide();
			}
		}
		classes.DateInput=DateInput;
		initClasses=function(){};
	}

	return {
		date: initialize('DateInput')
	};
})();


// Copy pasting weeknumber.js
// ==========================

// This script is released to the public domain and may be used, modified and
// distributed without restrictions. Attribution not necessary but appreciated.
// Source: http://weeknumber.net/how-to/javascript 

// Returns the ISO week of the date.
Date.prototype.getWeek = function() {
  var date = new Date(this.getTime());
   date.setHours(0, 0, 0, 0);
  // Thursday in current week decides the year.
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  // January 4 is always in week 1.
  var week1 = new Date(date.getFullYear(), 0, 4);
  // Adjust to Thursday in week 1 and count number of weeks from date to week1.
  return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
                        - 3 + (week1.getDay() + 6) % 7) / 7);
}

// Returns the four-digit year corresponding to the ISO week of the date.
Date.prototype.getWeekYear = function() {
  var date = new Date(this.getTime());
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  return date.getFullYear();
}