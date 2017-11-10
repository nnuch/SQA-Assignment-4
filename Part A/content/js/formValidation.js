//Phone number validation format 123-123-1234 or (123)-123-1234
var Checkphonenumber = /^(\([0-9]{3}\)\s*|[0-9]{3}\-)[0-9]{3}-[0-9]{4}$/;

function validate(form){

	var phone = form.txtphone.value;
	//email validation
	var x = form.txtemail.value;
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			alert("Invalid e-mail address!");
			return false;
		}
		
	//phone number validation
	if(!Checkphonenumber.test(phone)) {
       alert("Invalid Phone Number, Please input the acceptable formats, 123-123-1234, or (123)123-1234");  
       return false;
    }
    else {
    }  
}	

  
//Vehicle model's Year validation
var min = 1900,
    max = 2017,
    select = document.getElementById('selectElementId');

for (var i = min; i<=max; i++){
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
}

select.value = new Date().getFullYear();
