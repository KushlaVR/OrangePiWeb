function onStartup(){
    addHandlers();
}

function addHandlers() {
    $('.btn-on, .btn-off').on('click', (function (e) {
          var url = "/";
          var cmd = {};
          cmd["p" + $(this).data('id')] = $(this).data('state')
          var param = { ui: false, cmd: cmd };
          $.ajax({
              type: "POST",
              url: url,
              data: param
          }).done(function (data) {
              
          }).fail(function (data) {
              
          });
     }));
}
