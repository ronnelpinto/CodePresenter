function Reader() {
	fileBlocks = 'nothing';

	generateBlocks = function(text) {
		this.fileBlocks = text.split("<pp_br>")
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