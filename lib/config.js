function save_config(){


var config_object = get_form_data();
localStorage.setItem('jsonobj',config_object);




}


function get_form_data()
{
    var o = {};
    var a = $('#form').serializeArray();
    a = a.concat(
            $('#form input[type=checkbox]:not(:checked)').map(
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

function get_config()
{  var obj = localStorage.getItem('jsonobj');
	return obj;
    }
