function formvalid() {	
		var fname = document.getElementById('fname').value;
		var lname = document.getElementById('lname').value;
		var u_name = document.getElementById('uname').value;
		var mail = document.getElementById('mail').value;
		var pass = document.getElementById('pass').value;
		if (fname==""||fname==null) {
			var err_msg = document.getElementById('err_msg').innerHTML="Please fill in your first name";
			return false;
		}
		else if(!isNaN(fname)) {
			var err_msg = document.getElementById('err_msg').innerHTML="Numbers are not allowed in first name";
			return false;	
		}
		else if((fname.length <= 2) || (fname.length >=25)) {
			var err_msg = document.getElementById('err_msg').innerHTML="First name should be of atleast 3 letters and max 25 letters";
			return false;	
		}
		else if (lname==""||lname==null) {
			var err_msg = document.getElementById('err_msg').innerHTML="Please fill in your last name";
			return false;
		}
		else if(!isNaN(lname)) {
			var err_msg = document.getElementById('err_msg').innerHTML="Numbers are not allowed in last name";
			return false;	
		}
		else if((lname.length <= 2) || (lname.length >=25)) {
			var err_msg = document.getElementById('err_msg').innerHTML="last name should be of atleast 3 letters and max 25 letters";
			return false;	
		}
		else if (u_name==""||u_name==null) {
			var err_msg = document.getElementById('err_msg').innerHTML="Please fill in your Username";
			return false;
		}
		else if((u_name.length <= 2) || (u_name.length >=25)) {
			var err_msg = document.getElementById('err_msg').innerHTML="Username should be of atleast 3 letters and max 25 letters";
			return false;	
		}
		else if (mail.indexOf('@') <= 0) {
			document.getElementById("err_msg").innerHTML="Invalid E-mail Address";
			return false;
		}
		else if ((mail.charAt(mail.length-4)!='.') && (mail.charAt(mail.length-3)!='.')) {
			document.getElementById("err_msg").innerHTML="Invalid Positon of .(Dot) in E-mail";
			return false;
		}
		else if (pass==""||pass==null) {
			var err_msg = document.getElementById('err_msg').innerHTML="Please Enter a password";
			return false;
		}
		else if ((pass.length <=3)) {
			var err_msg = document.getElementById('err_msg').innerHTML="This password is not long enough";
			return false;
		}
		else if (pass.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)) {
			var pstrength=document.getElementById("strength").innerHTML="poor";
		 }
		else if (pass.match(/[`<>?]+/)) {
			var pstrength=document.getElementById("strength").innerHTML="Medium";			

		 }	
  		 else if (pass.match(/[!@$^&*()]+/)) {
			var pstrength=document.getElementById("strength").innerHTML="High";
	     }
	     else {
	     	return "index.php";
	     }
	} 
	function hide() {
			var err_msg = document.getElementById('err_msg').innerHTML="";
		}
	