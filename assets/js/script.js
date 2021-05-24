function dropDown(){
	fetch('../../assets/stateslocalgovts.json')
	  .then(response => response.json())
	  .then(data => {
	  	let mydata = data;
	  	let states = mydata["states"];
  		let selectState = document.getElementById('state');
  		let selectLocal = document.getElementById('local');
  		
  		for(let state in states){
  			selectState.options[selectState.options.length] = new Option(states[state].state, states[state].state);

  			selectState.onchange = function() {
	  			selectLocal.length = 1;
	  			let index = states.findIndex(item=>item.state==this.value);
	  			for(let localgovt in states[index].local) {
	  				selectLocal.options[selectLocal.options.length] = new Option(states[index].local[localgovt], states[index].local[localgovt]);
	  			}
  			}
  		}
  		
	  });
}
let checkStatus = document.getElementById('status');
let updateStatus = document.getElementById('updatestatus');
let formId = document.getElementById('formid');

checkStatus.onclick = function(){
	if (checkStatus.checked) {
		checkStatus.value = "Admitted";
	}
	else{
		checkStatus.value = "Undecided";
	}
	updateStatus.innerText = checkStatus.value;
}

checkStatus.onchange = function(e){
	e.preventDefault;
	formId.form.submit();
}
