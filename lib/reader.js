function Reader() {
	fileBlocks = 'nothing';

	generateBlocks = function(text) {
		var blocks = [];
		var temp = text.split("<pp_code>")
		for (var i = 0; i <= temp.length - 1; i++) {
			 blocks = blocks.concat(temp[i].split("</pp_code>"));
		};
		this.fileBlocks = blocks
	}

	this.getBlocks = function() {
		var retValue = fileBlocks;
		if (fileBlocks != 'nothing') {
			fileBlocks = 'nothing'
		};
		return retValue;
	}

	this.readBook = function(file) {
	 generateBlocks(file)
	}	
}