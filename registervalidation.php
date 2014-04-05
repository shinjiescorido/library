<html>
<head>
</head>

<script type="text/javascript">

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Full Name cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /[a-zA-Z]/;
    if(!re.test(form.fullname.value)) {
      alert("Error: Firstname must contain small and big letters!");
      form.fullname.focus();
      return false;
    }
    re= /[12-60]/;
     if(!re.test(form.age.value)) {
      alert("Error: Age must be numbers only!");
      form.age.focus();
      return false;

      re= /^[2-9]\d{2}-\d{3}-\d{4}$/;
     if(!re.test(form.phonenumber.value)) {
      alert("Error: Age must be numbers only!");
      form.phonenumber.focus();
      $(this).after('<span class="error error-keyup-4">Format xxx-xxx-xxxx</span>')	
      return false;


    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }

    //alert("You entered a valid password: " + form.pwd1.value);
    return true;
  }

</script>





<body>
	<form class="form-signin" action="/models/loginvalidate.php" method="post" onsubmit='return true;' accept-charset="utf-8">
			<input type="hidden" name="forreg" value="1" />	
			
			Full Name: <input name="name" id="name" value="" class="form-control" placeholder="Full Name" onsubmit="return checkForm(this);" autofocus required /><br />
			Age: <input name="age" id="age" value="" class="form-control" placeholder="Age" onsubmit="return checkForm(this);" required /><br />
			Address: <input name="address" id="address" value="" class="form-control" placeholder="Address" onsubmit="return checkForm(this);" required /><br />
			Phone Number: <input name="phone_number" id="phone_number" value="" class="form-control" placeholder="Phone Number" onsubmit="return checkForm(this);" required /><br />
			Email Address: <input name="email" id="email" value="" class="form-control" placeholder="Email Address" onsubmit="return checkForm(this);" required /><br />
			Type: <input name="type" id="type" value="" class="form-control" placeholder="Type" onsubmit="return checkForm(this);" required /><br />
			Id Number: <input name="id_number" id="type" value="" class="form-control" placeholder="Id Number" onsubmit="return checkForm(this);" required /><br />
			Password: <input name="epword" id="epword" type="password" value="" class="form-control" placeholder="Password" onsubmit="return checkForm(this);" required /><br />
				 <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
		</form>
</body>
</html>