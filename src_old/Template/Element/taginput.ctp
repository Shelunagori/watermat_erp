<?= $this->Html->css('/assets/global/plugins/jquery-tags-input/jquery.tagsinput.css',['block'=>true]) ?>
<?= $this->Html->script('/assets/global/plugins/jquery-tags-input/jquery.tagsinput.js',['block'=>true]) ?>

<?php
$js="
$(document).ready(function(){
	$(function() {
		$('.tagsinput').tagsInput({
			width: 'auto',
			height: 'auto',
			defaultText: 'add serial no.',
			onChange: function(elem, elem_tags)
			{
				var languages = ['php','ruby','javascript'];
				$('.tag', elem_tags).each(function()
				{
					if($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
					$(this).css('background-color', 'yellow');
				});
			}
		});
		// Uncomment this line to see the callback functions in action
		//			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

		// Uncomment this line to see an input with no interface for adding new tags.
		//			$('input.tags').tagsInput({interactive:false});
	});
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>

	

