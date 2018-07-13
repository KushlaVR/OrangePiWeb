function onStartup(){
    addHandlers();
}

function addHandlers() {
    $('.btn-on, .btn-off').on('click', (function (e) {
          var url = "/cmd_processor.php";
          var data = {["p" + $(this).data('id')] : $(this).data('state')};
          //data["p" + $(this).data('id')] = $(this).data('state')
          var param = { ui: false, cmd: data };
          $.ajax({
              type: "POST",
              url: url,
              data: param
          }).done(function (data) {
              
          }).fail(function (data) {
              
          });
     }));
}
