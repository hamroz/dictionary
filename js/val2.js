var divs = new Array();
divs[0] = "errSelect";
divs[1] = "errEmail";
divs[2] = "errTel";
divs[3] = "errComment";

function validate(e) {
  var inputs = new Array();
  inputs[0] = document.getElementById("typeinquery").value;
  inputs[1] = document.getElementById("email").value;
  inputs[2] = document.getElementById("tel").value;
  inputs[3] = document.getElementById("comment").value;

  var errors = new Array();
  errors[0] =
    "<span style='color:red'> Please select the type of inquery! </span>";
  errors[1] = "<span style='color:red'> Please enter your email! </span>";
  errors[2] =
    "<span style='color:red'> Please enter your phone number! </span>";
  errors[3] = "<span style='color:red'>  </span>";

  for (i in inputs) {
    var errMessage = errors[i];
    var div = divs[i];
    if (inputs[i] == "") {
      document.getElementById(div).innerHTML = errMessage;
    } else if (i == 1) {
      var atpos = inputs[i].indexOf("@");
      var dotpos = inputs[i].lastIndexOf(".");
      if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= inputs[i].length) {
        document.getElementById("errEmail").innerHTML =
          "<span style='color:red'>Enter a valid email address!</span>";
      } else {
        document.getElementById(div).innerHTML = "";
      }
    } else {
      document.getElementById(div).innerHTML = "";
    }
  }
}
function finalValidate(event) {
  var count = 0;
  for (i = 0; i < 4; i++) {
    var div = divs[i];
    if (document.getElementById(div).innerHTML == "") {
      count = count + 1;
    }
  }
  if (count == 4) {
    document.getElementById("errFinal").innerHTML = "";
  } else {
    event.preventDefault();
  }
}
