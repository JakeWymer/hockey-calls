$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    $('#pick_one_toggle, #pick_two_toggle, #pick_three_toggle, #pick_wildcard_toggle').change();
});

$('#pick_one_toggle, #pick_two_toggle, #pick_three_toggle, #pick_wildcard_toggle').change(function() {

	var data = $(this).prop('checked');
	var element_id = $(this).attr('id').slice(0, -7);

	$.ajax({
        type:"POST",
        url:'players/get',
        data: { 
        	_token:$(this).data('token'),
        	data : data },
        dataType: 'json',
        success: function(data){

        	$('#' + element_id).empty();

            $.each(data.response, function(i, obj) {
            	var player = "<option value=" + obj.id + ">" + obj.name + "</option>";
            	$(player).appendTo('#' + element_id);

            });

            var default_select = "<option selected></option>";
            	$(default_select).appendTo('#' + element_id);
        }
    });

})

$('#pick_one, #pick_two, #pick_three, #pick_wildcard').change(function() {
	data = $(this).val();

	element_id = $(this).attr('id');

	$.ajax({
        type:"POST",
        url:'players/updateChoice',
        data: { 
        	_token:$(this).data('token'),
        	data : data },
        dataType: 'json',
        success: function(data){
        	console.log(data.response);
        	$('.chosen_' + element_id).empty();
			var player_one = '<div><img class="img-responsive" src="' + data.response.image_path + '"></img><h5>' + data.response.name +'</h5></div>';

			$(player_one).appendTo('.chosen_' + element_id);

        }
    });
});