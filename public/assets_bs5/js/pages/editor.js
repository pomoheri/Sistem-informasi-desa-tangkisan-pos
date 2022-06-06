$(function () {
	"use strict";

    $('.summernote').summernote({
        height: 150
    });

    var editor = new Quill('#editor', {
        theme: 'snow'
    });    

})();