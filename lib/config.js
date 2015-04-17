function save_c_config(){
var config_object = get_c_form_data();
localStorage.setItem('c_jsonobj',config_object);
}


function get_c_form_data()
{
    var o = {};
    var a = $('#c_form').serializeArray();
    a = a.concat(
            $('#c_form input[type=checkbox]:not(:checked)').map(
                    function() {
                        return {"name": this.name, "value": "off"}
                    }).get()
    );
    $.each(a, function() {
    		if(this.value == "tab")
        		o[this.name] = "\t";
        	else if(this.value == "new")
        		o[this.name] = "\n";
        	else if(this.value == "off")
        		o[this.name] = false;
        	else if(this.value == "on")
        		o[this.name] = true;
            else o[this.name] = this.value;
        
    });

    return (JSON.stringify(o));
};

function get_c_config()
{  var obj = localStorage.getItem('c_jsonobj');
	return obj;
    }

function save_java_config(){
var config_object = get_java_form_data();
localStorage.setItem('java_jsonobj',config_object);
}


function get_java_form_data()
{
    var o = {};
    var a = $('#java_form').serializeArray();
    a = a.concat(
            $('#java_form input[type=checkbox]:not(:checked)').map(
                    function() {
                        return {"name": this.name, "value": "off"}
                    }).get()
    );
    $.each(a, function() {
    		if(this.value == "tab")
        		o[this.name] = "\t";
        	else if(this.value == "new")
        		o[this.name] = "\n";
        	else if(this.value == "off")
        		o[this.name] = false;
        	else if(this.value == "on")
        		o[this.name] = true;
            else o[this.name] = this.value;
        
    });

    return (JSON.stringify(o));
};

function get_java_config()
{  var obj = localStorage.getItem('java_jsonobj');
	return obj;
    }


function save_python_config(){
var config_object = get_python_form_data();
localStorage.setItem('python_jsonobj',config_object);
}


function get_python_form_data()
{
    var o = {};
    var a = $('#python_form').serializeArray();
    a = a.concat(
            $('#python_form input[type=checkbox]:not(:checked)').map(
                    function() {
                        return {"name": this.name, "value": "off"}
                    }).get()
    );
    $.each(a, function() {
    		if(this.value == "tab")
        		o[this.name] = "\t";
        	else if(this.value == "new")
        		o[this.name] = "\n";
        	else if(this.value == "off")
        		o[this.name] = false;
        	else if(this.value == "on")
        		o[this.name] = true;
            else o[this.name] = this.value;
        
    });

    return (JSON.stringify(o));
};

function get_python_config()
{  var obj = localStorage.getItem('python_jsonobj');
	return obj;
    }
