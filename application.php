<?php

/**
 * @autor Devin Vögele
 * written by Devin Vögele /Mail: devin.voegele@microsun.ch
 * Marvel-Applikation
 * 13. November 2024
 * @Version 1.0
 */

// Arrays mit den verschiedenen Kategorien
$Charaktere = [
    'Grösse' => ['Hulk', 'Thanos', 'Ant-Man', 'Giant-Man', 'King Groot', 'Vision'],
    'Bösewicht' => ['Loki', 'Thanos', 'Green Goblin', 'Ultron', 'Red Skull', 'Magneto'],
    'Hero' => ['Iron Man', 'Spider-Man', 'Captain America', 'Thor', 'Black Panther', 'Black Widow'],
    'Kraft' => ['Scarlet Witch', 'Doctor Strange', 'Captain Marvel', 'Wolverine', 'Hulk', 'Thor'],
    'Teams' => ['Avengers', 'X-Men', 'Fantastic Four', 'Guardians of the Galaxy', 'Defenders', 'S.H.I.E.L.D.'],
    'Geschlecht' => ['Female: Black Widow', 'Female: Captain Marvel', 'Female: Storm', 'Male: Thor', 'Male: Iron Man', 'Male: Captain America']
];

// Intro
echo "\nWillkommen zur Marvel Character App!\n\n";
sleep(1);
echo "Hier kannst du viele Marvel-Charaktere anhand Kategorien aufrufen.\n";
sleep(1);
echo "Wenn du möchtest, kannst du auch einen Test durchführen, bei welchem der Charakter, der dir am meisten ähnelt, dir vorgeschlagen wird.\n";
sleep(1);
echo "Wähle eine Kategorie: Grösse, Bösewicht, Hero, Kraft, Teams, Geschlecht\n";

$Kategorie = ucfirst(strtolower(readline()));

if (!in_array($Kategorie, array_keys($Charaktere))) {
    echo "Ungültige Eingabe. Achte auf die Rechtschreibung!\n";
    exit;
}

echo "\nCharaktere in der Kategorie $Kategorie:\n" . implode("\n- ", $Charaktere[$Kategorie]) . "\n";

echo "\nWillst du rausfinden, welcher Charakter zu dir passt? (Ja | Nein): ";
if (strtolower(readline()) !== "ja") {
    echo "Okay, dennoch Viel Spass und galaktische Grüsse aus dem ZLI!\n";
    exit;
}

echo "Wie heisst du? ";
$name = readline();
$anfangsbuchstabe = strtoupper($name[0]);
// Durchlaufe jede Charakterliste
function findePassendenCharakter(array $Charaktere, string $anfangsbuchstabe): string
{
    foreach ($Charaktere as $charakterenliste) {
        foreach ($charakterenliste as $charakter) {
            if (strtoupper($charakter[0]) === $anfangsbuchstabe) {
                return $charakter;
            }
        }
    }
    return null;
}
// Eigene USD
$gleichercharakter =  findePassendenCharakter($Charaktere, $anfangsbuchstabe);
$message = $gleichercharakter ? "Der Charakter, der am besten zu dir passt, ist: $gleichercharakter" : "Kein Charakter mit dem gleichen Anfangsbuchstaben wie dein Name gefunden.";

echo "\n$message\n";
sleep(1);

// Ergebnis speichern
file_put_contents('ergebnis.txt', $message);
 echo "Das Ergebnis wurde in ergebnis.txt gespeichert.\n";

// Quellen:
// Mitschüler
// google
// php Manuals
// marvel.com (Für die Charakterenarrays mit ihren Kategorien)
// https://github.com/topics/php-functions
