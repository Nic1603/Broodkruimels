<?php
// Verbind met de database
$mysqli = new mysqli("localhost", "gebruiker", "wachtwoord", "jouw_database");

// Controleer op fouten
if ($mysqli->connect_error) {
    die("Verbindingsfout: " . $mysqli->connect_error);
}

// Verkrijg gegevens uit het registratieformulier
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_BCRYPT);
$email = $_POST['email'];

// Voer SQL-invoegopdracht uit om de klant te registreren
$sql = "INSERT INTO klanten (gebruikersnaam, wachtwoord, email) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $gebruikersnaam, $wachtwoord, $email);

if ($stmt->execute()) {
    echo "Registratie voltooid.";
} else {
    echo "Registratiefout: " . $mysqli->error;
}

// Sluit de databaseverbinding
$mysqli->close();
?>



<?php
// Verbind met de database (zie stap 3)

// Verkrijg inloggegevens uit het formulier
$gebruikersnaam = $_POST['gebruikersnaam'];
$ingevoerd_wachtwoord = $_POST['wachtwoord'];

// Haal het opgeslagen wachtwoord op uit de database
$sql = "SELECT id, wachtwoord FROM klanten WHERE gebruikersnaam = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $gebruikersnaam);
$stmt->execute();
$stmt->bind_result($klant_id, $opgeslagen_wachtwoord);
$stmt->fetch();

// Controleer of het wachtwoord overeenkomt
if (password_verify($ingevoerd_wachtwoord, $opgeslagen_wachtwoord)) {
    echo "Inloggen gelukt. Welkom, klant #$klant_id!";
} else {
    echo "Onjuiste inloggegevens.";
}

// Sluit de databaseverbinding (zie stap 3)
?>
