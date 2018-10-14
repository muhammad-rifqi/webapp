<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Contact Form</title>
<script>
function _(id){ return document.getElementById(id); }
function submitForm(){
	_("mybtn").disabled = true;
	_("status").innerHTML = 'please wait ...';
	
	var formdata = new FormData();
	var file = _("file1").files[0];
	formdata.append( "n", _("n").value );
	formdata.append( "e", _("e").value );
	formdata.append( "m", _("m").value );
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
	
		if(this.readyState == 4 && this.status == 200) {
			if(this.responseText == "success"){
				_("my_form").innerHTML = this.responseText;
			} else {
				_("status").innerHTML = this.responseText;
				_("mybtn").disabled = false;
			}
		}
	}
	ajax.open( "POST", "parse.php" );
	ajax.send( formdata );
	
	
}
</script>
</head>
<body>
<form id="my_form" onsubmit="submitForm(); return false;" enctype="multipart/form-data">
  <p><input id="n" placeholder="Name" required></p>
  <p><input id="e" placeholder="Email Address" type="email" required></p>
  <p><textarea id="m" placeholder="write your message here" rows="10" required></textarea></p>
  <p><input id="file1" type="file" required></p>
  <p><input id="mybtn" type="submit" value="Submit Form"> <span id="status"></span></p>
</form>
</body>
</html>