function login() {
  if(($("#username").val() == 'nymbldesigner') && ($("#password").val()=='iforgot123')) {
    document.cookie = "name: nymbldesigner" +",password: iforgot123";
    window.location.href= './dashboard';
  } else {
    alert("Wrong Username or Password!");
  }
}

var body = document.body, 
    html = document.documentElement;
var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

document.getElementById("login_panel").style.marginTop =(height - document.getElementById("login_panel").offsetHeight) /2-100;