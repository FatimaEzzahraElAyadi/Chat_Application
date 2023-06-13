function upload_profile_image(files){
	var change_image_button = ("change_image_button");
	change_image_button.disabled =true;
	change_image_button.innerHTML = "Uploading Image ...";
	
	var myform = new FormData();
	var xml = new XMLHttpRequest();
	xml.onload = function(){
		if(xml.readyState == 4 || xml.status == 200){
			//get_data({},"field image");
			//get_settings(true);
			alert(xml.responseText);
			change_image_button.disabled = false;
			change_image_button.innerHTML = "Change Image";
		}
	}
	myform.append('file',files[0]);
	myform.append('data_type',"change_profile_image");
	
	xml.open("POST","uploader.php",true);
	xml.send(myform);
}