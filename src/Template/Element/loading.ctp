<?php
$js="

$(document).ready(function(){
	var progressTimer; 
    $(document).ajaxStart(function () {
    	$('#loadMe').modal({
	      backdrop: 'static', //remove ability to close modal with click
	      keyboard: false, //remove option to close with keyboard
	      show: true //Display loader!
	    });
        clearTimeout(progressTimer);
    }).ajaxStop(function () {
        progressTimer = setTimeout(function () {
             $('#loadMe').modal('hide');
        }, 10)
    });
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>