$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    $('#pick_one_toggle, #pick_two_toggle, #pick_three_toggle, #pick_wildcard_toggle').change();
    console.log(window.location.pathname);
    if(window.location.pathname == 'hockey-calls.com/public/scores'){

    }
});

$('#pick_one_toggle, #pick_two_toggle, #pick_three_toggle, #pick_wildcard_toggle').change(function() {

	var data = $(this).prop('checked');
	var element_id = $(this).attr('id').slice(0, -7);
    var wildcard = 0;

    if(element_id == 'pick_wildcard') {
        wildcard = 1;
    }

	$.ajax({
        type:"POST",
        url:'players/get',
        data: { 
        	_token:$(this).data('token'),
        	data : data,
            wildcard : wildcard },
        dataType: 'json',
        success: function(data){
            console.log(data);
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
            console.log(data);
        	$('.chosen_' + element_id).empty();
			var player_one = '<div><img class="img-responsive" src="' + data.response.image_path + '"></img><h5>' + data.response.name +'</h5></div>';

			$(player_one).appendTo('.chosen_' + element_id);

        }
    });
});

//Stack menu when collapsed
$('#bs-example-navbar-collapse-1').on('show.bs.collapse', function() {
    $('.nav-pills').addClass('nav-stacked');
});

//Unstack menu when not collapsed
$('#bs-example-navbar-collapse-1').on('hide.bs.collapse', function() {
    $('.nav-pills').removeClass('nav-stacked');
});

$('.scorer').click(function(){
    data = this.id;
    swal({
      title: "Are you sure?",
      text: "You better not be screwing up again...",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes",
      closeOnConfirm: false
    },
    function(){
      console.log('confirmed')
      $.ajax({
          type:"POST",
          url:'scores/edit',
          data: { 
            data : data 
          },
          dataType: 'json',
          success: function(data){
              console.log(data.response);
              swal({
                type: 'success',
                title: "Goal Removed!",
                text: data.response,
                timer: 2000,
                showConfirmButton: false
              },location.reload());
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
          }
      });
    });
});





