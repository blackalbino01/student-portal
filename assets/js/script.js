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


//check if status is already checked
if(checkStatus.checked){
	updateStatus.innerText = "Admitted";
}

checkStatus.onclick = function(e){
	e.preventDefault;
	if (checkStatus.checked) {
		checkStatus.value = "Admitted";
	}
	else{
		checkStatus.value = "Undecided";
	}
	updateStatus.innerText = checkStatus.value;
	submitForm();
}

function submitForm(){
	let form = document.getElementById('formid');
	form.submit();
}



function validate(){
	let notify = document.getElementById('alert');
	let uploadImg = document.forms['Form']['uploadimg'].value;
	let fName = document.forms['Form']['fname'].value;
	let mName = document.forms['Form']['mname'].value;
	let lName = document.forms['Form']['lname'].value;
	let email = document.forms['Form']['email'].value;
	let birthday = document.forms['Form']['birthday'].value;
	let gender = document.forms['Form']['gender'].value;
	let phone = document.forms['Form']['phone'].value;
	let address = document.forms['Form']['address'].value;
	let state = document.forms['Form']['state'].value;
	let localGovt = document.forms['Form']['localgovt'].value;
	let nextOfKin = document.forms['Form']['nextofkin'].value;
	let jambScore = document.forms['Form']['jambscore'].value;

	console.log(fName);

	if(uploadImg.length == 0 || uploadImg == " " ,fName.length == 0 || fName == " ",lName.length == 0 || lName == " ",email.length == 0 || email == " ",birthday.length == 0 || birthday == " ",gender.length == 0 || gender == " ",phone.length == 0 || phone == " ",address.length == 0 || address == " ",state.length == 0 || state == " ",localGovt.length == 0 || localGovt == " ",nextOfKin.length == 0 || nextOfKin == " ",jambScore.length == 0 || jambScore == " "){

		alert("Please FIll All Required Field");
	}

	else{
		notify.style.display = 'block';

		setTimeout(function(){
		notify.style.display='none';},1000);
	}
}