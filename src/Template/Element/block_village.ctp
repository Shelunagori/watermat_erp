<?php
$js="
$(document).ready(function(){

	$(document).on('change','#block-id',function(){
		var url = '".$this->Url->build(['controller'=>'Villages','action'=>'getVillage.json'])."';
		var block_id = $(this).val();
		if(block_id)
		{
			$.post(url,{block_id: block_id},function(result){
				$('#village-id').empty();
				$('#village-id').append($('<option/>', {value: '', text: '--Select--'}));
				$('#village-id').select2();
				$.each(result.villages, function(key,value) {
                    var o = $('<option/>', {value: key, text: value});
                    $('#village-id').append(o);
                });
			});
		}
	});

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>