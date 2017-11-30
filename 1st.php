<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION["uname"]))
{
		 header("Location:projectN.php");
}
?>
<style>
body {
    background-image:url(background-pattern-design-90.jpg);
}
</style>
<style>
input:focus { 
    background-color:pink;
}
input[type=text], select {
    
   
    margin: 8px -1px;
	 padding: 3px 10px;
    display: inline-block;
    border: 1px solid deeppink;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    
    background-color:#7D0552;
    color: white;
    padding: 14px 20px;
    margin: 8px 110px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=message], select {
   
    padding: 6px 5px;
    margin: 18px 2px;
    display: inline-block;
    border: 1px solid deeppink;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit]:hover {
    background-color:steelblue;
}

div {
width:30%;
    border-radius: 5px;
    padding-left: 450px;
	padding-top: 50px;
}
fieldset{

border-radius: 5px;
 border-color: magenta;
 background-color: mistyrose;
}
legend{
border-radius: 5px;
border: 2px solid magenta;
background-color: mistyrose;
border-color: deeppink deeppink mistyrose deeppink;
}
body{
color:deeppink;}
</style>
<script type="text/javascript">

function movetoNext(current, nextFieldID) {

if (current.value.length >= current.maxLength) {

document.getElementById(nextFieldID).focus();

}

}


		function validate()
		{	
					var namepattern=/^[a-zA-Z ]*$/;
					var unamepattern=/^[a-zA-Z 0-9]*$/;
					var z=0;
					var x=0;
            		var msg="";
					var name=document.form1.firstname.value;
					
           			 if (name == "")
            		{
						msg=msg+"Please provide your firstname\n";
             			document.form1.firstname.focus();
						x++;
				
           			 }
					else
						{
							if(!namepattern.test(name))
							msg=msg+"Only characters and white spaces are allowed in firstname block\n";
					
						}
		
			
			
			
			
			var name1=document.form1.lastname.value;
           			 if (name1 == "")
            		{
						msg=msg+"Please provide your lastname\n";
             			document.form1.lastname.focus();
						x++;
           			 }
					else
					{
						if(!namepattern.test(name1))
						msg=msg+"Only characters and white spaces are allowed in lastname block\n";
					
					}
			
				
				var name2=document.form1.uname.value;
           			 if (name2 == "")
            		{
						msg=msg+"Please provide your USERNAME \n";
             			document.form1.uname.focus();
						x++;
           			 }
					else
					{
						if(!unamepattern.test(name2))
						msg=msg+"Only characters and numbers spaces are allowed in USERNAME block\n";
					
					}
		
			
			
			
			
			
			var p1=document.form1.password1.value;
			var p2=document.form1.password2.value;

           			 if (p1 == "")
            		{
				msg=msg+"Please provide your password\n";
             			document.form1.password1.focus();
				x++;
           			 }
				else{
					
					if (p2=="")
					{
					msg=msg+"Please provide your password\n";
             			document.form1.password2.focus();
				x++;
					}
					else{
					if(p1==p2)
					{
					
					}
					else{
					msg=msg+"Please provide same password in both blocks\n";
             			document.form1.password2.focus();
					}
					}
					}
					
			/*else
			{
				if(!namepattern.test(p1))
msg=msg+"Only characters and white spaces are allowed\n";
					
			}
			*/
			
			
			 
			 
			 
		var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var eml=document.form1.email.value;
			if (eml == "")
           			 {
				msg=msg+"Please provide your email\n";
             			document.form1.email.focus();
          			  }
			else
			{
				if(!emailpattern.test(eml))
					msg=msg+"Please provide a valid email\n";
			}
			
			
			
	/*var datepattern = /^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/;
			var date=document.form1.date.value;
			if (date=="")
         			   {
				msg=msg+"Please provide a date\n";
             			document.form1.date.focus();
				x++;
            		}
			else
			{
				if(!datepattern.test(date))
					msg=msg+"Please provide a valid date\n";
			}*/
			/*var perpattern = /^[0-9]*$/;
			var per=document.form1.person.value;
			if (per=="")
           			 {
			msg=msg+"Please provide a value for number of person.\n";
             		document.form1.person.focus();
          			  }
			else
			{
				if(!perpattern.test(per))
			msg=msg+"Please provide a value for number of person.\n";
			}		
			var ch=document.form1.bo;
			for (var i = 0, len = ch.length; i < len; i++) 
			{
                    		if (!ch[i].checked) 
					{
						z++;
                    				}
            		}
					
			
			if (z==3)
			{
				msg=msg+"Please select one of the check box.\n";
			}
			*/
			
			if(msg!="")
			{
				window.alert(msg);
				return false;	
			}
			else
			{
				var checkboxs=document.form1.tnc;
				if (!checkboxs[0].checked)
				{
					alert("Please agree to continue");
					return false;
				}
				else
				{
				return true;
				}
			} 	           	
          
}

</script>
<body>
<h1 align="center" style="color:#7D0552;">SignUp Page</h1>
<div>
<fieldset><legend>SIGN UP FORM</legend>
  <form action="loginsignup.php"  name="form1" onsubmit=" return validate()" method="POST">
  
  <label for="email">FirstName *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
  
  <input type="text" id="firstname" name="firstname" placeholder="FirstName" autofocus><br>
 <br>

 <label for="email">LastName *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
  
  <input type="text" id="lastname" name="lastname" placeholder="LastName"><br>
 <br>
 
  <label for="email">Email *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="email" name="email" placeholder="email_id@gmail.com"><br><br>
	
	<label for="name">UserName *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" id="name" name="uname" placeholder="Username"><br>
 
  <label for="email">Password *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
  
  <input type="password" id="password1" name="password1" placeholder="Password"><br>
 <br>
 
  <label for="email">ConfirmPassword *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
  
  <input type="password" id="password2" name="password2" placeholder="Password"><br>
 <br>
    <label for="Telephone">Phone Number*</label>
    <input type="text" id="phone" name="phone" size="3" placeholder="Phone_no." maxlength="3" onkeyup="movetoNext(this, 'Telephone2')" >-<input type="text" id="Telephone2" placeholder="Phone_no." name="Telephone2" size="3" maxlength="3" onkeyup="movetoNext(this, 'Telephone3')" >-<input type="text" id="Telephone3" placeholder="Phone_no." name="Telephone3" size="3" maxlength="4">

  <br><label for="Regarding">Gender&nbsp;&nbsp;&nbsp;</label>
  
  <select id="gender" name="gender"> 
     <option value="general">male</option>
      <option value="formal">female</option>
 </select><br>
 
 Terms and Conditions*
<br>
<input type="radio" name="tnc" checked>I Agree
<input type="radio" name="tnc" >I Disagree<br>
	 <input type="submit" value="Submit">
    
   
  </form>
  </fieldset>
</div>
<br><br><br>


</body>
</html>

