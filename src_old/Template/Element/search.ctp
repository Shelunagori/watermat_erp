<?php
$js="
$(document).ready(function(){
	var rows = $('#".$table_id." tbody tr');
    $('#search_box').on('keyup',function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        var v = $(this).val();
        if(v){ 
            rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
    
                return !~text.indexOf(val);
            }).hide();
        }else{
            rows.show();
        }
    });
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>