Tremedous Tees
===================
Applicatie voor de tremendous tees opdracht. https://workshops.studiokrijst.com/vodafone-ziggo/downloads/vfzg-case-masterclass.pdf

## De applicatie
De applicatie gaat er vanuit dat de gebruiker al een account heeft. De applicatie start zodra de betaling ontvangen is.

**Betaling ontvangen**
Hierbij wordt data ontvangen, klantnummer en order gegevens

* Order wordt aangemaakt in de database.
* OrderStrategy wordt aangeroepen, deze bepaald welke acties er ondernomen moeten worden
* Product voorraad wordt gecontroleerd
* Zodra alles op voorraad is wordt de order verstuurd naar de klant.

### Order strategy
* OPEN Order
    * Roept de Observer aan
    * Factuur wordt aangepast naar PENDING
* PENDING Order
    * Magazijn wordt gecontroleerd op voorraad. _Functionaliteit werkt helaas nog niet, bedoeling is dat voorraad gecontroleerd wordt, als het op voorraad is wordt de order_product database aangepast van OPEN naar READY, zo niet dan wordt het aangepast naar WAITING_
    * Er vind controle plaats 
    * Zodra alle producten op voorraad zijn wordt de status aangepast naar COMPLETE
* COMPLETE Order
    * Verzending wordt uitgevoerd
    * Magazijn wordt geupdated
    * Verzendbevestiging wordt naar de klant verstuurd
    * Status wordt aangepast naar DONE
    
### Observer
De observer zorgt voor het eerste gedeelte van het process.
* Orderbevestiging naar klant mailen (stap 5)
* Factuur genereren (PDF) en versturen naar de klant (stap 6)
* Credit nota en betalingsrecord worden aangemaakt voor de ontwerper (stap 7)
* Transport wordt besteld (stap 8)

### Singleton
De database is gemaakt met het singleton design pattern

### Factory
Factory wordt op een paar plekken gebruikt.
* Opslaan van gegevens in de database
* Order status controleren en aanpassen
* Bestelling bij leverancier

### Decorator
De decorator pattern wordt gebruikt om de voorraad te controleren. Benodigde data wordt toegevoegd en daarmee wordt dan gekeken of het product op voorraad is. Zo niet wordt dit naar de ontwerper verstuurd (stap 9, stap 10)

### Adapter
De adapter wordt gebruikt bij het aanleveren van data (bij stap 10)

### Overig
Verder heb ik zoveel mogelijk extra's geimplementeerd wat we geleerd hebben
* Gebruik maken van een interface
* Gebruik maken van een Abstract class
* Gebruik maken van een trait

## Installeren
De volgende instructies zijn er om de Tremendous Tees applicatie in gebruik te gaan nemen.

### Composer
```
composer init
```

### Database
De Database staat in de Resources map. Er is ook sample data aanwezig.

![Alt text](resources/erd.jpg?raw=true "Title")