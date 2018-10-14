<style>
div#overlay {
	display: none;
	z-index: 2;
	background: #000;
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0px;
	left: 0px;
	text-align: center;
}
div#specialBox {
	display: none;
	position: relative;
	z-index: 3;
	margin: 150px auto 0px auto;
	width: 500px; 
	height: 300px;
	background: #FFF;
	color: #000;
	margin-top:0px;
	text-align:right;
}
div#wrapper {
	position:absolute;
	top: 0px;
	left: 0px;
	padding-left:24px;
}
</style>


<script>
var ajax = new XMLHttpRequest();
ajax.open( "GET","data.php",true);
ajax.send();
ajax.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200){
		var data = JSON.parse(this.responseText);
			var html = '';
			for( a = 0; a < data.length; a++ )
			{
				 html +=  '<tr><td>' + data[a].id_user + '</td><td>' + data[a].username + '</td><td>'+ data[a].password + '</td><td>'+ data[a].access +'</td><td><button onmousedown=\"toggleOverlay('+data[a].id_user+')\" > Edit </button></td><td><button onclick=\"hapus('+data[a].id_user+')\">Hapus</button></td></tr>';
			}
			document.getElementById('data').innerHTML = html;
	}
}

function show(id){ 

var ajx = new XMLHttpRequest();
ajx.open( "GET","edit.php?id="+id,true);
ajx.send();
ajx.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200){
		var data = JSON.parse(this.responseText);
			
			document.getElementById('id_user').value = data.id_user;
			document.getElementById('username').value = data.username;
			document.getElementById('password').value = data.password;
			document.getElementById('access').value = data.access;
	}
}

}


function hapus(id){

	var ajx = new XMLHttpRequest();
	ajx.open( "GET","hapus.php?id="+id,true);
	ajx.send();
	ajx.onreadystatechange = function(){
		if(ajx.readyState == 4 && ajx.status == 200){
			
			if(ajx.responseText == "success"){
				alert('Deleted'); window.location='javascript:history.go()';
			} else {
				alert('Not Deleted ');
			}
			
		}
	}

}


function toggleOverlay(id){

	var overlay = document.getElementById('overlay');
	var overlay = document.getElementById('overlay');
	var specialBox = document.getElementById('specialBox');
	overlay.style.opacity = .8;
	if(overlay.style.display == "block"){
		overlay.style.display = "none";
		specialBox.style.display = "none";
	} else {
		overlay.style.display = "block";
		specialBox.style.display = "block";
	}
	
	
	var ajx = new XMLHttpRequest();
	ajx.open( "GET","edit.php?id="+id,true);
	ajx.send();
	ajx.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var data = JSON.parse(this.responseText);
				
				document.getElementById('id_user').value = data.id_user;
				document.getElementById('username').value = data.username;
				document.getElementById('password').value = data.password;
				document.getElementById('access').value = data.access;
		}
	}
}

</script>


<p align="center" onclick=""> <button> Add </button></p>

<table border=1 cellpadding="4" cellspacing="0" align="center">
	

	<tr>
		<td> Id </td>
		<td> Username </td>
		<td> Password </td>
		<td> Access </td>
		<td> Edit </td>
		<td> Hapus </td>
	</tr>
	
	<tbody id="data"> </tbody>
	
</table>

<div id="overlay"></div>
	<div id="specialBox">
	<button onmousedown="toggleOverlay()">X</button>
	<h2>Edit Data User</h2>
	<table width="100%">
		<tr>
				<td> <input type="text" id="id_user" style="width:100%;"> </td><td> <input type="text" id="access" style="width:100%;"> </td>
		</tr>
		
		<tr>
				<td> <input type="text" id="username" style="width:100%;"> </td> <td> <input type="text" id="password"style="width:100%;"> </td>
		</tr>
		
		<tr>
				<td>  <button> Save </button> </td> <td>   <button> Edit </button> </td>
		</tr>


 </div>