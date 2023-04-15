function validateForm() {
  var trekname = document.forms["trekform"]["trekname"].value;
  var trekdate = document.forms["trekform"]["trekdate"].value;
  var trektime = document.forms["trekform"]["trektime"].value;
  var treklocation = document.forms["trekform"]["treklocation"].value;
  var trekdescription = document.forms["trekform"]["trekdescription"].value;
  var trekdifficulty = document.forms["trekform"]["trekdifficulty"].value;
  var trekduration = document.forms["trekform"]["trekduration"].value;
  var trekprice = document.forms["trekform"]["trekprice"].value;
  var trekspots = document.forms["trekform"]["trekspots"].value;
  var trekimage = document.forms["trekform"]["trekimage"].value;
  var trekorganizer = document.forms["trekform"]["trekorganizer"].value;

  if (trekname == "") {
    alert("Trek Name must be filled out");
    return false;
  }
  if (trekdate == "") {
    alert("Trek Date must be filled out");
    return false;
  }
  if (trektime == "") {
    alert("Trek Time must be filled out");
    return false;
  }
  if (treklocation == "") {
    alert("Trek Location must be filled out");
    return false;
  }
  if (trekdescription == "") {
    alert("Trek Description must be filled out");
    return false;
  }
  if (trekdifficulty == "") {
    alert("Trek Difficulty must be selected");
    return false;
  }
  if (trekduration == "") {
    alert("Trek Duration must be filled out");
    return false;
  }
  if (trekprice == "") {
    alert("Trek Price must be filled out");
    return false;
  }
  if (trekspots == "") {
    alert("Number of Spots must be filled out");
    return false;
  }
  // if (trekimage == "") {
  //   alert("Trek Image must be uploaded");
  //   return false;
  // }
  if (trekorganizer == "") {
    alert("Trek Organizer must be filled out");
    return false;
  }
  return true;
}
