<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<span href="#" class="button" id="toggle-login"><img src="images/login-logo.png" alt="" /></span>

<div id="login">
  <div id="triangle"></div>
  <h1>Login</h1>	
	<form method="post" action="<?php echo base_url('/login')?>" onSubmit="return validateLogin()">
		<input type="email" name="email" id="email" placeholder="Email id" />
		<input type="password" name="password" id="password" placeholder="Password" />
		<select name="role" class="form-control">
			<option value="superadmin">Super Administrator</option>
			<option value="admin">Administrator</option>
		</select>
		<input type="submit" value="Login" />
		<a href="##" class="signup-link" onClick='$("#login").hide();$("#sp").show();'>Sign UP</a>
		<a href="#" class="frgtpswd-link" onClick='$("#login").hide();$("#fp").show();'>Forgot Password ?</a>
		<?php echo $this->session->flashdata('error44');?>
	</form>
</div>
<div id="fp" style="display:none">
  <div id="triangle"></div>
  <h1>Forgot Password</h1>	
	<form method="post" action="" onSubmit="return validateFP()">
		<input type="email" name="femail" id="femail" placeholder="Email" />
		<input type="submit" value="Submit" />
		<a href="#" class="frgtpswd-link backto-link" onClick='$("#login").show();$("#fp").hide();'>Back to Login</a>
		<img id='floader' style="padding-left:45%;display:none" src="<?echo base_url('images/715.GIF');?>">
		<p id='msg_p'></p>
	</form>
</div>

<div id="sp" style="display:none">
  <div id="triangle"></div>
  <h1>SIGN UP</h1>	
	<form method="post" action="" onSubmit="return validateFP()">
		<input type="email" name="femail" id="femail" placeholder="Email" />
		<input type="submit" value="Submit" />
		<a href="#" class="frgtpswd-link backto-link" onClick='$("#login").show();$("#sp").hide();'>Back to Login</a>
		<img id='floader' style="padding-left:45%;display:none" src="<?echo base_url('images/715.GIF');?>">
		<p id='msg_p'></p>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
function validateFP()
{
	var eMailPattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if($("#femail").val()=='' || !eMailPattern.test($("#femail").val()))
	{
		$("#femail").css("border","1px solid red");
		return false;
	}
	else
		$("#femail").css("border","1px solid #ccc");
	$.ajax({
		url : "<?echo base_url('admin/forgotPassword')?>",
		data:{
			femail: $("#femail").val()
		},
		type:"post",
		beforeSend:function(){
			$("#floader").show()
		},
		complete:function(){
			$("#floader").hide()
		},
		success:function(data){
			if(data==0)
				$("#msg_p").html("<p style='color:red'>No accounts registered with given mail address</p>")		
			else
				$("#msg_p").html("<p style='color:green'>Your new password has been mailed to your mail address.</p>")
		}
	})
	return false;
}
function validateLogin()
{
	if($("#email").val()=='')
	{
		$("#email").css("border","1px solid red");
		return false;
	}
	else
		$("#email").css("border","1px solid #ccc");
	
	if($("#password").val()=='')
	{
		$("#password").css("border","1px solid red");
		return false;
	}
	else
		$("#password").css("border","1px solid #ccc");
}
$('#toggle-login').click(function(){
  $('#login').toggle();
});
</script>
<style>
.error_msg{
	color:red;
}
.frgtpswd-link {
	color:#697fed;
	font-size:12px;
	text-decoration:none;
	margin-top:10px;
	text-align:right;
	display:block;
}
.frgtpswd-link:hover {
	color:#333;
	text-decoration:underline;
}
.backto-link {
	color:#333;
}
.backto-link:hover {
	color:#333;
	text-decoration:underline;
}

@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

*{margin:0;padding:0;}

body{
  background:#567;
  font-family:'Open Sans',sans-serif;
}

.button {
  width:70px;
  height:70px;
  background:#f0f0f0;
  border:4px solid #3399cc;
  display:block;
  border-radius:100px;
  margin:0 auto;
  margin-top:1%;
  padding:10px;
  text-align:center;
  text-decoration:none;
  color:#f0f0f0;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
}
.button img {
	text-align:center;
	vertical-align:middle;	
	margin-top:-3px;
}


.button:hover{
  background:#fff;
}

#login, 
#fp {
  width:400px;
  margin:0 auto;
  margin-top:8px;
  margin-bottom:2%;
  transition:opacity 1s;
  -webkit-transition:opacity 1s;
}
#sp {
  width:400px;
  margin:0 auto;
  margin-top:8px;
  margin-bottom:2%;
  transition:opacity 1s;
  -webkit-transition:opacity 1s;
}

#triangle{
  width:0;
  border-top:12x solid transparent;
  border-right:12px solid transparent;
  border-bottom:12px solid #3399cc;
  border-left:12px solid transparent;
  margin:0 auto;
}

#login h1,
#fp h1{
  margin:0px;
  background:#3399cc;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:#fff;
  border-radius:4px 4px 0px 0px;
}
#sp h1{
  margin:0px;
  background:#3399cc;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:#fff;
  border-radius:4px 4px 0px 0px;
}
form{
  background:#f0f0f0;
  padding:6% 4%;
  border-radius:0px 0px 4px 4px;
}

input[type="email"],input[type="password"]{
  width:100%;
  margin-bottom:3%;
  padding:4%;
  background:#fff;
  border:1px solid #ccc;
  font-family:'Open Sans',sans-serif;
  font-size:95%;
  color:#555;
  border-radius:4px;
}
input[type="email"]:hover,input[type="email"]:focus {
  border:1px solid #3399cc;
}

input[type="password"]:hover,input[type="password"]:focus{
  border:1px solid #3399cc;
}

select {
  width:100%;
  margin-bottom:3%;
  padding:3% 3%;
  background:#fff;
  border:1px solid #ccc;
  font-family:'Open Sans',sans-serif;
  font-size:95%;
  color:#555;
  border-radius:4px;
}
select option {
  padding:1% 3%;
  background:#fff;
}


input[type="submit"]{
  width:100%;
  margin-top:4%;
  padding:4%;
  background:#3399cc;
  border:0;
  font-family:'Open Sans',sans-serif;
  font-size:100%;
  color:#fff;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;
  border-radius:4px;
}

input[type="submit"]:hover{
  background:#2288bb;
}

@media only screen and (min-width: 50px) and (max-width: 439px) {

#login, #fp {
  width:80%;
  margin:0 auto;
}

	
}
</style>