#SETTARE INIZIALMENTE I SEGUENTI DATI
#giorniInMese indica il numero di giorni nel mese in cui è contenuta la settimana
giorniInMese = 30
#giorno della settimana da calcolare. Deve essere una domenica
giornoViaggio = 25
#mese della settimana. Deve essere compreso fra 1 e 12.
meseViaggio = 11
annoViaggio = 2018





import random
filein = open("stazioni.txt", "r", encoding="UTF-8")
filein2 = open("stazioni2.txt", "r", encoding="UTF-8")
filein3 = open("orari.txt", "r", encoding="UTF-8")
listacoll = "VALUES"
oraArrivo = 00
minutoArrivo = 00
secondoArrivo = 00
durata = 179
prezzo = 19
giornoDopo = 0
for riga1 in filein:
    for riga2 in filein2:
        for riga3 in filein3:
            for giorno in range(1,8):
                for s1 in riga1.split(","):
                    for s2 in riga2.split(","):
                        for o3 in riga3.split(","):
                            if s1.strip("\n") != s2.strip("\n"):
                                if (s1 == "RM0027" and s2 == "MI1943") or (s1=="MI1943" and s2=="RM0027"):
                                    orario = o3.split(":")
                                    oraArrivo = int(orario[0])+2
                                    minutoArrivo = int(orario[1])+59
                                    randomChoise = random.randint(1,2)
                                    if randomChoise == 1:
                                        oraArrivo = int(orario[0])+2
                                        minutoArrivo = int(orario[1])+59
                                        durata = 179
                                        if random.randint(0,2) == 0 :
                                            prezzo = 25
                                        else:
                                            prezzo = 39
                                    else :
                                        oraArrivo = int(orario[0])+3
                                        minutoArrivo = int(orario[1])+20
                                        durata = 200
                                        if random.randint(0,2) == 0 :
                                            prezzo = 19 
                                        else:
                                            prezzo = 29
                                    if minutoArrivo > 59:
                                        oraArrivo += 1
                                        minutoArrivo -= 60
                                    if oraArrivo >= 24:
                                        oraArrivo -= 24
                                        giornoDopo = 1
                                elif (s1 == "RM0027" and s2 == "TO2273") or (s2 == "RM0027" and s1 == "TO2273"):
                                    orario = o3.split(":")
                                    oraArrivo = int(orario[0])+4
                                    minutoArrivo = int(orario[1])+25
                                    randomChoise = random.randint(1,2)
                                    if randomChoise==1:
                                        oraArrivo = int(orario[0])+2
                                        minutoArrivo = int(orario[1])+59
                                        durata = 265
                                        if random.randint(0,2) == 0 :
                                            prezzo = 35
                                        else:
                                            prezzo = 49
                                    else :
                                        oraArrivo = int(orario[0])+4
                                        minutoArrivo = int(orario[1])+50
                                        durata = 290
                                        if random.randint(0,2) == 0 :
                                            prezzo = 29 
                                        else:
                                            prezzo = 39
                                    if minutoArrivo > 59:
                                        oraArrivo += 1
                                        minutoArrivo -= 60
                                    if oraArrivo >= 24:
                                        oraArrivo -= 24
                                        giornoDopo = 1
                                elif (s1 == "MI1943" and s2 == "TO2273") or (s2 == "MI1943" and s1 == "TO2273"):
                                    orario = o3.split(":")
                                    oraArrivo = int(orario[0])+0
                                    minutoArrivo = int(orario[1])+58
                                    randomChoise = random.randint(1,2)
                                    if randomChoise==1:
                                        oraArrivo = int(orario[0])+2
                                        minutoArrivo = int(orario[1])+59
                                        durata = 58
                                        if random.randint(0,2) == 0 :
                                            prezzo = 19
                                        else:
                                            prezzo = 35
                                    else :
                                        oraArrivo = int(orario[0])+1
                                        minutoArrivo = int(orario[1])+15
                                        durata = 75
                                        if random.randint(0,2) == 0 :
                                            prezzo = 12
                                        else:
                                            prezzo = 27
                                    if minutoArrivo > 59:
                                        oraArrivo += 1
                                        minutoArrivo -= 60
                                    if oraArrivo >= 24:
                                        oraArrivo -= 24
                                        giornoDopo = 1
                                if(minutoArrivo < 10):
                                    minutoArrivo = "0" + str(minutoArrivo)
                                else: minutoArrivo = str(minutoArrivo)
                                if(oraArrivo < 10):
                                    oraArrivo = "0" + str(oraArrivo)
                                else: oraArrivo = str(oraArrivo)
                                listacoll = listacoll + '("' + str(random.randint(1000000,9999999)) +'","'+ s1.strip("\n") + '","' + s2.strip("\n") + '","' + o3.strip("\n") + '","'+ str(oraArrivo) +':'+  minutoArrivo  +':00","'+ str(giornoDopo) + '","' + str(durata)+'","'+str(prezzo)+'","Nessun cambio","'+str(giorno)+'"),\n'
                                oraArrivo = 00
                                minutoArrivo = 00
                                giornoDopo = 0
print(listacoll)

def postiOccupatiStandard() :
        return str(random.randint(0,400))


listatreni = ""
listaviaggi = ""
codTreno = "FR0000"
operatore = "Trenitalia"
tipoTreno = "Frecciarossa 1000"
dettagliTreno = "WiFi gratuito && servizio di ristoro"
postiTotStandard = 0
separeted = listacoll.split(",\n")
giornoSettimanaAttuale = 1
for s in separeted:
    if( s != ""):
        cleared = s.strip('("').strip('")').split('","')
        if(cleared[9] != giornoSettimanaAttuale):
                    giornoSettimanaAttuale = cleared[9]
                    giornoViaggio += 1
                    if(giornoViaggio > giorniInMese):
                        meseViaggio += 1
                        giornoViaggio = 1
                    if(meseViaggio >12):
                        annoViaggio += 1
                        meseViaggio = 1
        if(giornoViaggio<10):
            giornoViaggioString = "0" + str(giornoViaggio)
        else:
            giornoViaggioString = str(giornoViaggio)
        if(meseViaggio<10):
            meseViaggioString = "0"+ str(meseViaggio)
        else:
            meseViaggioString = str(meseViaggio)
        dataViaggio = str(annoViaggio) + "-" + meseViaggioString + "-" + giornoViaggioString
        if(cleared[1] == "RM0027" and cleared[2] == "MI1943") or (cleared[2] == "RM0027" and cleared[1] == "MI1943") :
            if(cleared[6] == 179): 
                codTreno = "FRM" + str(random.randint(1000,9999))
                operatore = "Trenitalia"
                tipoTreno = "Frecciarossa 1000"
                postiTotStandard = str(457)
                dettagliTreno = "WiFi gratuito&&servizio di ristoro&&contenuti multimediali a bordo"
                listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                
                listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' +  cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
            else:
                if(random.randint(1,3) == 1):
                    codTreno = "AGV" + str(random.randint(1000,9999))
                    operatore = "Italo"
                    tipoTreno = "Italo AGV"
                    postiTotStandard = str(420)
                    dettagliTreno = "WiFi gratuito&&carrozza cinema"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' +  cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
                else:
                    codTreno = "FR" + str(random.randint(10000,99999))
                    operatore = "Trenitalia"
                    tipoTreno = "Frecciarossa"
                    postiTotStandard = str(435)
                    dettagliTreno = "WiFi gratuito&&servizio di ristoro&&contenuti multimediali a bordo"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' +  cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
        elif (cleared[1] == "RM0027" and cleared[2] == "TO2273") or (cleared[2] == "RM0027" and cleared[1] == "TO2273"):
            if(cleared[6] == 265): 
                if(random.randint(1,5) == 1):
                    codTreno = "ETR" + str(random.randint(1000,9999))
                    operatore = "Italo"
                    tipoTreno = "Italo EVO"
                    postiTotStandard = str(479)
                    dettagliTreno = "WiFi gratuito&&carrozza cinema"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' + cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
                else:
                    codTreno = "FRM" + str(random.randint(1000,9999))
                    operatore = "Trenitalia"
                    tipoTreno = "Frecciarossa 1000"
                    postiTotStandard = str(457)
                    dettagliTreno = "WiFi gratuito&&servizio di ristoro&&contenuti multimediali a bordo"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' +  cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
            else:
                if(random.randint(1,3) == 1):
                    codTreno = "AGV" + str(random.randint(1000,9999))
                    operatore = "Italo"
                    tipoTreno = "Italo AGV"
                    postiTotStandard = str(420)
                    dettagliTreno = "WiFi gratuito&&carrozza cinema"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' + cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
                else:
                    codTreno = "FA" + str(random.randint(10000,99999))
                    operatore = "Trenitalia"
                    tipoTreno = "Frecciargento"
                    postiTotStandard = str(435)
                    dettagliTreno = "WiFi gratuito&&contenuti multimediali a bordo"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' + cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
        elif (cleared[1] == "MI1943" and cleared[2] == "TO2273") or (cleared[2] == "MI1943" and cleared[1] == "TO2273"):
            if(cleared[6] == 58): 
                if(random.randint(1,4) == 1):
                    codTreno = "ETR" + str(random.randint(1000,9999))
                    operatore = "Italo"
                    tipoTreno = "Italo EVO"
                    postiTotStandard = str(479)
                    dettagliTreno = "WiFi gratuito&&carrozza cinema"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' + cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
                else:
                    codTreno = "FRM" + str(random.randint(1000,9999))
                    operatore = "Trenitalia"
                    tipoTreno = "Frecciarossa 1000"
                    postiTotStandard = str(457)
                    dettagliTreno = "WiFi gratuito&&servizio di ristoro&&contenuti multimediali a bordo"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' +  cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
            else:
                if(random.randint(1,2) == 1):
                    codTreno = "AGV" + str(random.randint(1000,9999))
                    operatore = "Italo"
                    tipoTreno = "Italo AGV"
                    postiTotStandard = str(420)
                    dettagliTreno = "WiFi gratuito&&carrozza cinema"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' + cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'
                else:
                    codTreno = "FA" + str(random.randint(10000,99999))
                    operatore = "Trenitalia"
                    tipoTreno = "Frecciargento"
                    postiTotStandard = str(435)
                    dettagliTreno = "WiFi gratuito&&contenuti multimediali a bordo"
                    listatreni += '("' + codTreno + '","' + operatore + '","' + tipoTreno + '","' + dettagliTreno + '","' + postiTotStandard + '"),\n'
                    listaviaggi += '("' + str(random.randint(100000,999999)) + '","' + codTreno + '","' + cleared[0] + '","' + postiOccupatiStandard() + '","' + dataViaggio + '"),\n'

print("\n\n\n")
print(listatreni)
print("\n\n\n")
print(listaviaggi)
