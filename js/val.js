function validate(input, id) {
  const regex = /[^\w\s]/g;

  for (let i = 0; i < input.length; i++) {
    if (/^[a-zA-Z]+$/.test(input)) {
      document.getElementById(id).innerHTML = "	\u2714";
      document.getElementById(id).style.color = "green";
      return true;
    } else {
      document.getElementById(id).innerHTML = "\u274C";
      document.getElementById(id).style.color = "red";
      return false;
    }
  }
  if (input) {
    console.log("you clicked!");
  } else {
    document.getElementById(id).innerHTML = "";
    return false;
  }
}
function validateeng() {
  let input = document.getElementById("wordeng").value;
  return validate(input, "ineng");
}
function validateshug() {
  let input = document.getElementById("wordshug").value;
  return validate(input, "inshug");
}

function validatesearch() {
  const button_s = document.getElementById("search_button");
  let input = document.getElementById("word").value;
  if (validate(input, "search")) {
    console.log("you are here");
    button_s.disabled = false;
  } else {
    button_s.disabled = true;
  }
}

function validatedef() {
  let input = document.getElementById("example").value;

  if (input.length > 100) {
    document.getElementById("def").innerHTML = "Maximum 100 words!";
    document.getElementById("def").style.color = "red";
    return false;
  } else {
    document.getElementById("def").innerHTML = "";
    return true;
  }
}

function button_cl() {
  const button_sub = document.getElementById("submit_button");
  if (validateeng() && validateshug() && validatedef()) {
    button_sub.disabled = false;
  } else {
    button_sub.disabled = true;
  }
}
