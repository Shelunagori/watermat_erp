<?php
$js="
$(document).ready(function(){

	$(document).on('change','#district-id',function(){
		$('#division-id').empty();
		$('#division-id').select2();
		$('#block-id').empty();
		$('#block-id').select2();
		$('#village-id').empty();
		$('#village-id').select2();
		var url = '".$this->Url->build(['controller'=>'Divisions','action'=>'getDivision.json'])."';
		var district_id = $(this).val();
		if(district_id)
		{
			$.post(url,{district_id: district_id},function(result){
				$('#division-id').append($('<option/>', {value: '', text: '--Select--'}));
				$('#division-id').select2();
				$.each(result.divisions, function(key,value) {
                    var o = $('<option/>', {value: key, text: value});
                    $('#division-id').append(o);
                });
			});
		}
	});

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>