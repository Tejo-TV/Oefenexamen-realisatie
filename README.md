# NETFISH

De startup NETFISH is een streamingdienst op poten aan het zetten als NETFLIX & YOUTUBE met als. Ons is gevraagd om een web-based beheersysteem te maken voor het platform en een front-end om deze video’s af te spelen.

# Database Install

Om de website te gebruiken, moet u eerst de database instellen. Volg deze stappen en test de login om er zeker van te zijn dat alles correct werkt.

1. **Bestanden verifiëren** – Zorg ervoor dat alle benodigde bestanden zich in de map `htdocs` van XAMPP bevinden.
2. **XAMPP-services starten** – OOpen XAMPP en start zowel Apache als MySQL..
3. **Open phpMyAdmin** – Zodra MySQL is opgestart, klikt u op de knop **Admin** naast MySQL.
4. **Maak de database:**

* Klik in phpMyAdmin op **Nieuw** in het linkerpaneel.
* Geef de nieuwe database de naam **netfish** (let op de exacte spelling, anders kan de website geen verbinding maken!).
5. **De database importeren:**

* Klik op de zojuist aangemaakte database.
* Ga naar het tabblad **Importeren**.
* Klik op **Bestand kiezen** en selecteer `netfish.sql` uit de MySQL-map.
* Scroll naar beneden en klik op **Importeren**.

6. **Bevestiging** – Zodra de import is voltooid, is de database klaar.

🎉 Gefeliciteerd! Uw database is nu ingesteld en de website zou correct moeten functioneren.