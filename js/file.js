function read_file() {
	    var file = file_input.files[0];
	    var filename = file["name"];
        alert("vibha is here")
	    // Fetch the file extension
            var fileExtension = filename.replace(/^.*\./,"");
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#code_div').html("<pre id='indented_code'></pre>");
                var obj = get_config();
                $('#indented_code').html(js_beautify(reader.result, obj));
                apply_new_theme(fileExtension);
            }
            reader.readAsText(file);
        }