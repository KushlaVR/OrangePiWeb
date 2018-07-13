function onStartup(){
	addHandlers();
	readAll();
}

function addHandlers() {
    $('.btn-on, .btn-off').on('click', (function (e) {
          var url = "/cmd_processor.php";
          var data = {cmd:$(this).data('cmd'), ["p" + $(this).data('id')] : String($(this).data('state'))};
          
          var param = { ui: false, cmd: JSON.stringify(data) };
          $.ajax({
              type: "POST",
              url: url,
              data: param
          }).done(function (data) {
              turnOn(JSON.parse(data));
          }).fail(function (data) {
              
          });
     }));
	
	$('.btn-read').on('click', (function (e) {
          var url = "/cmd_processor.php";
          var data = {cmd:$(this).data('cmd')};
          
          var param = { ui: false, cmd: JSON.stringify(data) };
          $.ajax({
              type: "POST",
              url: url,
              data: param
          }).done(function (data) {
              turnOn(JSON.parse(data));
          }).fail(function (data) {
              
          });
     }));
	 
	 autorefresh();
}

function autorefresh(){
	setTimeout(function(){readAll(); autorefresh();}, 10000);
}

function readAll(){
	var url = "/cmd_processor.php";
	var data = {cmd:"get"};
	
	var param = { ui: false, cmd: JSON.stringify(data) };
	$.ajax({
		type: "POST",
		url: url,
		data: param
		}).done(function (data) {
			turnOn(JSON.parse(data));
		}).fail(function (data) {
		
		});
}

function turnOn(data){
	jQuery.each(data, function(pin, value){
		var el = $('#' + pin);
		if (value=="0") {
			el.removeClass('bg-warning');
		} else {
			el.addClass('bg-warning');
		}
	})
}