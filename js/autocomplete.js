
function autocomplete() {

      $("#partenza").keyup(function () {

          var query = $("#partenza").val();

          if (query.length > 1) {
              $.post("../order/ricercaDriver.php", { search: 1, q: query }, function(risposta) {
                $("#response").html(risposta);
                $("#response").show();
                var widthInput = $("#partenza").css("width");
                document.getElementById("response").style.width = widthInput;
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
            $("#response").fadeOut(1000);
            $("#response").html="";
          } 

          
          
      });

      $("#destinazione").keyup(function () {
          
          var query = $("#destinazione").val();

          if (query.length > 1) {
              $.post("../order/ricercaDriver.php", { search: 1, q: query }, function(risposta) {
                $("#responseDest").html(risposta);
                $("#responseDest").show();
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
            $("#responseDest").fadeOut(1000);
            $("#responseDest").html="";
          } 

          
          
      });

      $(document).on('click', 'li', function () {
          alert($(this).text());
          var idParentLi = $(this).parent().parent().attr("id")
          if(idParentLi == "response") {
            var nomeStazione = $(this).text();
            $("#partenza").val(nomeStazione);
            $("#response").fadeOut(800);
            $("#response").html="";
          } else if(idParentLi == "responseDest") {
            var nomeStazione = $(this).text();
            $("#destinazione").val(nomeStazione);
            $("#responseDest").fadeOut(800);
            $("#responseDest").html="";
          }
          
      });
  };
