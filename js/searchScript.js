    var fixId, fixTop, navH, bodyId, fixH, topReached = 0;

    function setParameters() {
      fixId = document.getElementById("search-to-fix");
      fixTop = fixId.offsetTop;
      navId = document.getElementById("nav");
      navH = navId.clientHeight + navId.getBoundingClientRect().top;
      bodyId = document.getElementById("body");
      fixH = fixId.offsetHeight;
    }

    function fixBox() {
      if(window.pageYOffset >= (fixTop-navH)) {
        fixId.classList.add("fixed-search");
        fixId.style.top = navH + "px";
        bodyId.style.marginTop = fixH + "px";
        topReached=1;
      } else {
        fixId.classList.remove("fixed-search");
        if(topReached==1){
          fixId.style.top = 0 + "px";
          bodyId.style.marginTop = 0 + "px";
          topReached=0;
        }
      }
    }

    function convalidaRicerca(){
      var flag = 0;
      if($('#partenza').val() == "" || $('#destinazione').val() == "" || $('#data').val() == ""){
        alert("Inserisci tutti i campi per poter procedere con la ricerca");
      } else if($('#partenza').val() == $('#destinazione').val()){
        alert("La partenza e la destinazione coincidono. Puoi restare nello stesso posto anche senza pagare un biglietto.");
      } else {
        $.ajax({
          type: "POST",
          url: "order/checkRicerca.php",
          async: false,
          data: {
            tipoRicerca: 1, 
            partenza: $('#partenza').val(), 
            destinazione: $('#destinazione').val(), 
            data: $("#data").val() 
          },
          success: function(risposta) {
            if (risposta == 0){
              alert("La stazione di partenza da te inserita non risulta essere presente nel nostro database. Verifica di averla inserita correttamente.");
            }else if(risposta == 1) {
              alert("La stazione di destinazione da te inserita non risulta essere presente nel nostro database. Verifica di averla inserita correttamente.");
            }else if(risposta == 2) {
              alert("Non siamo ancora in grado di mandarti nel passato. Puoi al momento comprare biglietti per la giornata odierna e per i giorni a seguire.");
            } else if (risposta == 3){
              flag = 1;
            }
          }
        });         
      }
      if(flag==1)return true;
      else return false;  
    }

   
