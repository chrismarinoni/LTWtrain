# LTWtrain
Progetto di Christian Marinoni (@chrismarinoni) e Yuri Munno (@ZephyrYM) realizzato per il corso "Linguaggi e Tecnologie per il Web" tenuto dal professor Riccardo Rosati presso l'Università di Roma "Sapienza".

## Struttura
LTWtrain è un sito web che consente l'acquisto di biglietti del treno e di voucher per l'abbonamento. Le funzionalità di ricerca dei collegamenti sono disponibili sia nella homepage, attraverso lo strumento di "ricerca rapida", che nell'apposita sezione "Biglietteria". In quest'ultima è possibile procedere all'acquisto, previa registrazione e completamento del profilo personale, anche di biglietti andata e ritorno. Una volta acquistati, i biglietti sono visualizzati nella "Dashboard" e sono scaricabili in formato PDF. È inoltre disponibile una pagina con il tabellone delle partenze e l'area di modifica delle informazioni del proprio profilo.

## Linguaggi e librerie
Per realizzare il sito sono stati utilizzati i seguenti linguaggi e librerie: HTML, CSS, PHP, Javascript, jQuery, Bootstrap, MySQL. Altre librerie sono state utilizzate per la generazione dei pdf e dei barcode per i biglietti.

## Il database
Le informazioni utilizzate per mostrare il funzionamento del sito al professore sono state prodotte con un semplice script Python (incluso nella repository) che genera tutte i dati necessari per i collegamenti fra Roma Termini <-> Milano Centrale <-> Torino Porta Nuova <-> Roma Termini.
La struttura del database è la seguente:
- Utente(*idUtente*, nome, cognome, email, password, accountFilled, numBigliettiAcquisti, abbonamento, indirizzoResidenza, cittaResidenza, provinciaResidenza, paeseResidenza, dataNascita, codiceFiscale, sesso, stazionePartPreferita, stazioneArrPreferita)
  - ove "accountFilled" vale 0 se l'utente non ha completato il suo account, 1 altrimenti
- Treno (*codTreno*, operatore, tipoTreno, dettagliTreno, postiTotStandard)
- Stazione (*codStazione*, nome, citta, provincia, regione, latitudine, longitudine)
- Collegamento (*codCollegamento*, *codStPart*, *codStArr*, orarioPart, orarioArr, giornoDopo, durata, fasciaOrariaPart, prezzo, dettagli, giornoSettimana)
- Viaggio (*codViaggio*, *codTreno*, *codCollegamento*, postiOccupatiStandard, dataViaggio)
- Biglietto (*codBiglietto*, *idUtente*, *codViaggio*, classeServizio, prezzo, nomeStazionePart, nomeStazioneArr)

## Sito online
Il sito funzionante è disponibile all'indirizzo web [ltwtrain.altervista.org](http://www.ltwtrain.altervista.org). In fase di ricerca potrebbero non essere mostrati risultati, essendo stati generati collegamenti solo per coprire un periodo limitato di tempo.

### Created in Italian
Most of the variables used in this project have Italian names, so reading the code can be difficult for non-Italians :(
