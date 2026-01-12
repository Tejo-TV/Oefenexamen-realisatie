<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : logout.inc.php
// Omschrijving      : Logt de gebruiker uit en vernietigt de sessie
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//

session_start();

// Vernietig alle sessiegegevens
session_unset();
session_destroy();

// Stuur de gebruiker terug naar de loginpagina met een uitlog-melding
echo "<script>window.location.href = '../login.php?error=uitgelogd';</script>";
exit();
?>