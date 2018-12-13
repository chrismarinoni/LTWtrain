
function autocomplete(page) {

      $("#partenza").keyup(function () {

          var query = $("#partenza").val();

          if (query.length > 1) {
              $.post("../order/ricercaDriver.php", { search: 1, q: query }, function(risposta) {
                $("#response").html(risposta);
                // $("#responseAbb").html(risposta);
                if(page == 1){
                  $("#response").slideDown();
                  // $("#responseAbb").slideDown();
                } else {
                  $("#response").show();
                  // $("#responseAbb").show();
                }
                var widthInput = $("#partenza").css("width");
                document.getElementById("response").style.width = widthInput;
                // document.getElementById("responseAbb").style.width=widthInput;
                // $("#response").slideDown(1000);
              });
              // $.ajax(
              //     {
              //         url: 'index.php',
              //         method: 'POST',
              //         data: {
              //             search: 1,
              //             q: query
              //         },
              //         success: function (data) {
              //             console.log(data);
              //             $("#response").html(data);
              //         },
              //         dataType: 'text'
              //     }
              // );
          }
          
          if(query=="") {
            if(page == 1){
              $("#response").slideUp();
            } else {
              $("#response").fadeOut(1000);
            }
            $("#response").html="";
          } 

          
          
      });

      $("#destinazione").keyup(function () {
          
          var query = $("#destinazione").val();

          if (query.length > 1) {
              $.post("../order/ricercaDriver.php", { search: 1, q: query }, function(risposta) {
                $("#responseDest").html(risposta);
                if(page == 1){
                  $("#responseDest").slideDown();
                } else {
                  $("#responseDest").show();
                }
                var widthInput = $("#destinazione").css("width");
                document.getElementById("responseDest").style.width = widthInput;
                // $("#response").slideDown(1000);
              });
              // $.ajax(
              //     {
              //         url: 'index.php',
              //         method: 'POST',
              //         data: {
              //             search: 1,
              //             q: query
              //         },
              //         success: function (data) {
              //             console.log(data);
              //             $("#response").html(data);
              //         },
              //         dataType: 'text'
              //     }
              // );
          }
          
          if(query=="") {
            if(page == 1){
              $("#responseDest").slideUp();
            } else {
              $("#responseDest").fadeOut(1000);
            }            
            $("#responseDest").html="";
          } 

          
          
      });

      $(document).on('click', 'li', function () {
          var idParentLi = $(this).parent().parent().attr("id");
          if(idParentLi != null)  {
            if(idParentLi == "response") {
              var nomeStazione = $(this).text();
              $("#partenza").val(nomeStazione);
              if(page == 1){
                $("#response").slideUp();
              } else {
                $("#response").fadeOut(800);
              }
              $("#response").html="";
            } else if(idParentLi == "responseDest") {
              var nomeStazione = $(this).text();
              $("#destinazione").val(nomeStazione);
              if(page == 1){
                $("#responseDest").slideUp();
              } else {
                $("#responseDest").fadeOut(800);
              }
              $("#responseDest").html="";
            }
          } else if($(this).parent().attr("id") != null){
            idParentLi = $(this).parent().attr("id");
            if(idParentLi == "response") {
              var nomeStazione = $(this).text();
              $("#partenza").val(nomeStazione);
              if(page == 1){
                $("#response").slideUp();
              } else {
                $("#response").fadeOut(800);
              }              
              $("#response").html="";
            } else if(idParentLi == "responseDest") {
              var nomeStazione = $(this).text();
              $("#destinazione").val(nomeStazione);
              if(page == 1){
                $("#responseDest").slideUp();
              } else {
                $("#responseDest").fadeOut(800);
              }
              $("#responseDest").html="";
            }
          }
          
      });
  };
