<?php
$js="
$(document).ready(function(){

	$(document).on('change','#state-id',function(){
		$('#district-id').empty();
		$('#district-id').select2();
		$('#block-id').empty();
		$('#block-id').select2();
		$('#division-id').empty();
		$('#division-id').select2();
		$('#village-id').empty();
		$('#village-id').select2();
		var url = '".$this->Url->build(['controller'=>'Districts','action'=>'getDistrict.json'])."';
		var state_id = $(this).val();
		if(state_id)
		{
			$.post(url,{state_id: state_id},function(result){
				$('#district-id').append($('<option/>', {value: '', text: '--Select--'}));
				$('#district-id').select2();
				$.each(result.districts, function(key,value) {
                    var o = $('<option/>', {value: key, text: value});
                    $('#district-id').append(o);
                });
			});
		}
	});

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>