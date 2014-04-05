<html>
  <head>
    <title>HTML LOGIN FORM WITH VALIDATION</title>
    <script language="Javascript">

      function validateForm(objForm){
        //alert("In validate Form");

        if(objForm.username.value.length==0){

         // alert("Please enter the username!");
          objForm.username.focus();
          return false;

        }

         if(objForm.password.value.length==0){

        //  alert("Please enter the password!");
          objForm.password.focus();
          return false;

        }


        return true;
      }

    </script>
  </head>
  <body>

    <form name="loginform" action="validateuser.jsp" method="post" onsubmit="return validateForm(this)">
      Username: <input type="text" name="username"> <br>
      Password: <input type="password" name="password"><br>
      <input type="submit" value="Login">
    </form>

  </body>

</html>