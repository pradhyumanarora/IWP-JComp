function verify_pass() {
  var pw = document.getElementById("password").value;
  var cpw = document.getElementById("cpassword").value;
//   document.getElementById("message").innerHTML = "Passwords do not match";

  if (pw != cpw) {
    document.getElementById("message").innerHTML = "Passwords do not match";
    document.getElementById("message").style.color = 'red';
  }
  else{
    document.getElementById("message").innerHTML = "Matched";
    document.getElementById("message").style.color = 'green';

  }
}
