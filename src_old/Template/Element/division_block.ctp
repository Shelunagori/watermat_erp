<?php
$js="
$(document).ready(function(){

	$(document).on('change','#division-id',function(){
		$('#block-id').empty();
		$('#block-id').select2();
		$('#village-id').empty();
		$('#village-id').select2();
		var url = '".$this->Url->build(['controller'=>'Blocks','action'=>'getBlock.json'])."';
		var division_id = $(this).val();
		if(division_id)
		{
			$.post(url,{division_id: division_id},function(result){
				$('#block-id').append($('<option/>', {value: '', text: '--Select--'}));
				$('#block-id').select2();
				$.each(result.blocks, function(key,value) {
                    var o = $('<option/>', {value: key, text: value});
                    $('#block-id').append(o);
                });
			});
		}
	});

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>