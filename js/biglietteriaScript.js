        andataSelezionata = -1;
		ritornoSelezionato = -1;
		andataConfermata = -1;
		partenza = "";
		destinazione = "";
		giornoAndata = "";
		orarioAndata = "";
		giornoRitorno = "";
		orarioRitorno = "";
		prezzoAndata = -1;
		prezzoRitorno = -1;
		operatoreAndata = "";
		id = "";
		id2 = "";
		function cq(){
			var d = new Date();
			var month = d.getMonth() + 1;
			var day = d.getDate();
			var year = d.getFullYear();
			var today = year + "-" + month + "-" + (day<10?'0':'') + day;
			if (today > $("#giornoPartenza").val()){
				 alert("hai immesso una data precedente a quella odierna. Ti consigliamo di cambiarla ");
				
			 }
				 
		}
		function selezione(num) {
			var d = new Date();
			var month = d.getMonth() + 1;
			var day = d.getDate();
			var year = d.getFullYear();
			var today = year + "-" + month + "-" + (day<10?'0':'') + day;
			var option1 = $('<option></option>').attr("value", "7/11").text("Mattina (7-11)");
			var option2 = $('<option></option>').attr("value", "12/15").text("Pranzo (12-15)");
			var option3= $('<option></option>').attr("value", "16/18").text("Pomeriggio (16-18)");
			var option4 = $('<option></option>').attr("value", "19/22").text("Sera (19-22)");
			if(num == 1){
				if(today < $("#dataPartenza").val()){
					$("#fasciaOrariaPartenza").empty().append(option1);
					$("#fasciaOrariaPartenza").append(option2);
					$("#fasciaOrariaPartenza").append(option3);
					$("#fasciaOrariaPartenza").append(option4);
					$("#fasciaOrariaPartenza").prop('disabled', false);
				}else if(today == $("#dataPartenza").val()){
					var ora = d.getHours();
					var minuto = d.getMinutes();
					var timetoday = ora*100 + minuto;
					if(timetoday > 2200){
						alert("Tutti i treni della data odierna sono già partiti");
						$("#fasciaOrariaPartenza").prop('disabled', true);
						$("#fasciaOrariaPartenza").empty();
					}else if(timetoday >= 1800 &&  timetoday <= 2200){
						$("#fasciaOrariaPartenza").empty().append(option4);
						$("#fasciaOrariaPartenza").prop('disabled', false);

					}else if(timetoday >= 1600 &&  timetoday <= 2200){
						$("#fasciaOrariaPartenza").empty().append(option3);
						$("#fasciaOrariaPartenza").append(option4);
						$("#fasciaOrariaPartenza").prop('disabled', false);
					} else if(timetoday >= 1200 &&  timetoday <= 2200){
						$("#fasciaOrariaPartenza").empty().append(option2);
						$("#fasciaOrariaPartenza").append(option3);
						$("#fasciaOrariaPartenza").append(option4);
						$("#fasciaOrariaPartenza").prop('disabled', false);

					} else {
                        $("#fasciaOrariaPartenza").empty().append(option1);
					    $("#fasciaOrariaPartenza").append(option2);
					    $("#fasciaOrariaPartenza").append(option3);
					    $("#fasciaOrariaPartenza").append(option4);
						$("#fasciaOrariaPartenza").prop('disabled', false);
					}
				} else if (today > $("#dataPartenza").val()){
						$("#fasciaOrariaPartenza").empty();
						$("#fasciaOrariaPartenza").prop('disabled', true);

				}
			} else if (num == 2){
				if(today < $("#dataRitorno").val()){
					$("#fasciaOrariaRitorno").empty().append(option1);
					$("#fasciaOrariaRitorno").append(option2);
					$("#fasciaOrariaRitorno").append(option3);
					$("#fasciaOrariaRitorno").append(option4);
					$("#fasciaOrariaRitorno").prop('disabled', false);
				}else if(today == $("#dataRitorno").val()){
					var ora = d.getHours();
					var minuto = d.getMinutes();
					var timetoday = ora*100 + minuto;
					if(timetoday > 2200){
						alert("Tutti i treni della data odierna sono già partiti");
						$("#fasciaOrariaRitorno").prop('disabled', true);
						$("#fasciaOrariaRitorno").empty();
					}else if(timetoday >= 1800 &&  timetoday <= 2200){
						$("#fasciaOrariaRitorno").empty().append(option4);
						$("#fasciaOrariaRitorno").prop('disabled', false);

					}else if(timetoday >= 1600 &&  timetoday <= 2200){
						$("#fasciaOrariaRitorno").empty().append(option3);
						$("#fasciaOrariaRitorno").append(option4);
						$("#fasciaOrariaRitorno").prop('disabled', false);
					} else if(timetoday >= 1200 &&  timetoday <= 2200){
						$("#fasciaOrariaRitorno").empty().append(option2);
						$("#fasciaOrariaRitorno").append(option3);
						$("#fasciaOrariaRitorno").append(option4);
						$("#fasciaOrariaRitorno").prop('disabled', false);

					} else {
						$("#fasciaOrariaPartenza").empty().append(option1);
					    $("#fasciaOrariaPartenza").append(option2);
					    $("#fasciaOrariaPartenza").append(option3);
					    $("#fasciaOrariaPartenza").append(option4);
						$("#fasciaOrariaPartenza").prop('disabled', false);
					}
				} else if (today > $("#dataRitorno").val()){
						$("#fasciaOrariaRitorno").empty();
						$("#fasciaOrariaRitorno").prop('disabled', true);

				}



				if(today < $("#dataRitorno").val()){
					$("#fasciaOrariaRitorno").prop('disabled', false);
				}else if(today == $("#dataRitorno").val()){
					var option1 = $('<option></option>').attr("value", "7/11").text("Mattina (7-11)");
					var option2 = $('<option></option>').attr("value", "12/15").text("Pranzo (12-15)");
					var option3= $('<option></option>').attr("value", "16/18").text("Pomeriggio (16-18)");
					var option4 = $('<option></option>').attr("value", "19/22").text("Sera (19-22)");
					var ora = d.getHours();
					var minuto = d.getMinutes();
					var timetoday = ora + "" + minuto;
					if(timetoday > 2200){
						alert("Tutti i treni della data odierna sono già partiti");
						
					}else if(timetoday >= 1800 &&  timetoday <= 2200){
						$("#fasciaOrariaRitorno").empty().append(option4);
						$("#fasciaOrariaRitorno").prop('disabled', false);

					}else if(timetoday >= 1600 &&  timetoday <= 2200){
						$("#fasciaOrariaRitorno").empty().append(option3);
						$("#fasciaOrariaRitorno").empty().append(option4);
						$("#fasciaOrariaRitorno").prop('disabled', false);
					} else if(timetoday >= 1200 &&  timetoday <= 2200){
						$("#fasciaOrariaRitorno").empty().append(option2);
						$("#fasciaOrariaRitorno").empty().append(option3);
						$("#fasciaOrariaRitorno").empty().append(option4);
						$("#fasciaOrariaRitorno").prop('disabled', false);

					} else {
						$("#fasciaOrariaRitorno").prop('disabled', false);
					}
				}
			}
			
		}

		//valori fadeOut "slow", FadeIn 1500, fadeIn 2000, fadeIn 1500

		$("#biglietto").click(function(){
			$("#selezioneProdotto").fadeOut("slow", function() {$("#form").fadeIn(1500, function() {$("#istruzioni").fadeIn(2000, function() {$("#step1").fadeIn(1500);} );});});
			
		});
		$("#goToStep2").click(function(){
			if($('#partenza').val() == "" || $('#destinazione').val() == ""){
                alert("Inserisci tutti i campi per poter procedere con la ricerca");
            } else if ($('#partenza').val() == $('#destinazione').val()){
                alert("La partenza e la destinazione coincidono. Puoi restare nello stesso posto anche senza pagare un biglietti :)");
			} else {
				$.post("checkRicerca.php", { tipoRicerca: 2, partenza: $('#partenza').val(), destinazione: $('#destinazione').val() }, function(risposta) {
					if (risposta == 3 ) {
						partenza = $('#partenza').val();
						destinazione = $('#destinazione').val();
						$("#form").slideUp(1500);
						$("#form2").slideDown(1500);
						if(document.ricerca.ar.checked) $("#goToStep3").show();
						else $("#risultatiPartenza").show();
					}else if (risposta == 0){
						alert("La stazione di partenza da te inserita non risulta essere presente nel nostro database. Verifica di averla inserita correttamente.");
					}else if(risposta == 1) {
						alert("La stazione di destinazione da te inserita non risulta essere presente nel nostro database. Verifica di averla inserita correttamente.");
					}
				});
			}
		});

		$("#goToRisultatiPart").click(function(){
			if($("#dataPartenza").val() == ""){
				alert("Devi prima selezionare un giorno per la partenza.");
			} else if($("#fasciaOrariaPartenza").val() == null){
				alert("Seleziona una data accettabile ed una fascia oraria");
			} else {
				$.post("biglietteria-ricerca.php", { 
				tipoRicerca: 1, 
				partenza: $('#partenza').val(), 
				destinazione: $('#destinazione').val(),
				dataPartenza: $('#dataPartenza').val(), 
				fasciaOrariaPart: $('#fasciaOrariaPartenza').val()
				}, 
				function(risposta) {
					$('#boxRisultatiAndata').html(risposta);
					giornoAndata = $('#dataPartenza').val();

				});

				$("#form2").slideUp(1500);
				$("#risultatiAndata").slideDown(1500);
				if(document.ricerca.ar.checked) $("#goToForm3").show();
				else $("#goToCheckOut").show();
			}
			
		});

		$("#goToCheckOut").click(function(){
			if(andataSelezionata == -1) {
				alert("Seleziona un risultato prima di poter proseguire con il checkout");
			} else {
				// alert("prezzoAndata: " + prezzoAndata + " -- codViaggio: " + andataSelezionata + " -- partenza: " + partenza + "-- destinazione: " + destinazione + " -- giornoAndata: " + giornoAndata + " -- orarioAndata: " + orarioAndata);
				$.post("admissionOrder.php", {  
					prezzoAndataA: prezzoAndata,
					codViaggioA: andataSelezionata,
					partenzaA: partenza,
					destinazioneA: destinazione,
					giornoAndataA: giornoAndata,
					orarioAndataA: orarioAndata,
					operatoreAndataA: operatoreAndata
				}, 
				function(risposta) {
					window.location="shoppingcart.php";
				});
			}
		});


		$("#goToForm3").click(function(){
			if(andataSelezionata == -1) {
				alert("Seleziona un risultato prima di poter proseguire con il checkout");
			} else {
				andataConfermata = 1;
				$("#risultatiAndata").slideUp(1500);
				$("#form3").slideDown(1500);
			}
		});

		$("#goToRisultatiDest").click(function(){
			if($("#dataRitorno").val() == ""){
				alert("Devi prima selezionare un giorno per la partenza.");
			} else if($("#fasciaOrariaRitorno").val() == null){
				alert("Seleziona una data accettabile ed una fascia oraria");
			} else {
				$.post("biglietteria-ricerca.php", { 
					tipoRicerca: 1, 
					partenza: $('#destinazione').val(), 
					destinazione: $('#partenza').val(),
					dataPartenza: $('#dataRitorno').val(), 
					fasciaOrariaPart: $('#fasciaOrariaRitorno').val()
					}, 
					function(risposta) {
						$('#boxRisultatiRitorno').html(risposta);
						giornoRitorno = $('#dataRitorno').val();
				});
				$("#form3").slideUp(1500);
				$("#risultatiRitorno").slideDown(1500);
			}
		});

		$("#goToCheckOut2").click(function() {
			if(ritornoSelezionato == -1) {
				alert("Seleziona un risultato prima di poter proseguire con il checkout");
			} else {
				$.post("admissionOrder.php", {  
					prezzoAndataA: prezzoAndata,
					codViaggioA: andataSelezionata,
					partenzaA: partenza,
					destinazioneA: destinazione,
					giornoAndataA: giornoAndata,
					orarioAndataA: orarioAndata,
					operatoreAndataA: operatoreAndata,
					prezzoRitornoR: prezzoRitorno,
					codViaggioR: ritornoSelezionato,
					giornoRitornoR: giornoRitorno,
					orarioRitornoR: orarioRitorno,
					operatoreRitornoR: operatoreRitorno
				}, 
				function(risposta) {
					window.location="shoppingcart.php";
				});
			}
		});


		function selected_button(btn){
			if(andataConfermata == -1){
				if(andataSelezionata != -1){
					
					var cardid = "#card"+andataSelezionata;
					$(cardid).addClass("bg-light");
					$("#collapseResult"+andataSelezionata).css('background-color', '');
					$("#cardCollapse"+id).css('background-color', '');
					$("#"+andataSelezionata).html("Seleziona treno");
					$("#"+andataSelezionata).prop("disabled",false);
					$("#"+andataSelezionata).removeClass("btn-success");
					$("#"+andataSelezionata).addClass("btn-primary");

				}
				id = btn.id;
				var cardid = "#card"+id;
				$(cardid).removeClass("bg-light");
				$(cardid).css('background-color', '#cce0ff');
				$("#cardCollapse"+id).css('background-color', '#e6f0ff');
				$("#"+id).html("Selezionato");
				$("#"+id).prop("disabled",true);
				$("#"+id).removeClass("btn-primary");
				$("#"+id).addClass("btn-success");
				andataSelezionata = id;
				orarioAndata = $("#orarioPart"+id).text();
				prezzoAndata = $("#prezzo"+id).text();
				operatoreAndata = $("#operatore"+id).text();

			} else if(andataConfermata == 1){
				if(ritornoSelezionato != -1){
					
					var cardid = "#card"+ritornoSelezionato;
					$(cardid).addClass("bg-light");
					$("#collapseResult"+ritornoSelezionato).css('background-color', '');
					$("#cardCollapse"+id).css('background-color', '');
					$("#"+ritornoSelezionato).html("Seleziona treno");
					$("#"+ritornoSelezionato).prop("disabled",false);
					$("#"+ritornoSelezionato).removeClass("btn-success");
					$("#"+ritornoSelezionato).addClass("btn-primary");

				}
				id = btn.id;
				var cardid = "#card"+id;
				$(cardid).removeClass("bg-light");
				$(cardid).css('background-color', '#cce0ff');
				$("#cardCollapse"+id).css('background-color', '#e6f0ff');
				$("#"+id).html("Selezionato");
				$("#"+id).prop("disabled",true);
				$("#"+id).removeClass("btn-primary");
				$("#"+id).addClass("btn-success");
				ritornoSelezionato = id;
				orarioRitorno = $("#orarioPart"+id).text();
				prezzoRitorno = $("#prezzo"+id).text();
				operatoreRitorno = $("#operatore"+id).text();
			}
			
		}
		$("#goBackB1").click(function(){
			$("#form").fadeOut("fast",function(){
				$("#selezioneProdotto").fadeIn(1500);
			});
		});
		$("#goBackB2").click(function(){
			$("#form2").fadeOut("fast",function(){
				$("#form").fadeIn(100, function() {
					$("#istruzioni").fadeIn(100, function(){
					$("#step1").fadeIn(100);
					});
				});
			});
		});
		$("#goBackB3").click(function(){
			$("#risultatiAndata").fadeOut("fast",function(){
				$("#form2").fadeIn(100);
			});
		});
		
		$("#goBackB4").click(function(){
			$("#form3").fadeOut("fast",function(){
				$("#risultatiAndata").fadeIn(100);
			});
		});
		
		$("#goBackB5").click(function(){
			$("#risultatiRitorno").fadeOut("fast",function(){
				$("#form3").fadeIn(100);
			});
		});
				
		$("#abbonamento").click(function(){
			$("#selezioneProdotto").fadeOut("fast",function() { 
				$("#formAbb").fadeIn(100,function() {
					$("#istruzioniAbb").fadeIn(100,function() {
						$("#passo1").fadeIn(100);
					});
				});
			});
		});
		
		$("#goToPasso2").click(function(){
			if($("#stazione1").val() != $("#stazione2").val()){
				$("#formAbb").slideUp(100);
				$("#formAbb2").slideDown(100);
			}else{
				alert("Hai inserito la stessa stazione nei campi 'Stazione 1' e  'Stazione 2' ");
			}
		});
		
		$("#goBackA1").click(function(){
			$("#formAbb").fadeOut("fast",function(){
				$("#selezioneProdotto").fadeIn(100);
			});
		});
		
		$("#goBackA2").click(function(){
			$("#formAbb2").fadeOut("fast",function(){
				$("#formAbb").fadeIn(100);
			});
		});
		

		function confronta_data(data1){
			data = data1.substr(6)+data1.substr(3,2)+data1.substr(0,2);
			if(data-getDate()<0) alert("Test");
		}
		
		function setDest( part, dest){
				$("#partenza").val(part);
				$("#destinazione").val(dest);
		}
