$(document).on("ready", main);

function main(){
	$("select").change(function(){
		var selected = $(this).val(); 
		$.ajax({
			url:"<?php echo base_url('cliente/mostrar'); ?>",
			type: "POST",
			data: {cantidad:selected},
			success:function(){
				window.location.href = "<?php echo base_url('cliente/mostrar'); ?>";
			}
		});
	});
}