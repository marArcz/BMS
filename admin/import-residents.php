<?php
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!

use PhpOffice\PhpSpreadsheet\RichText\Run;

include '../conn/conn.php';
session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// save file
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$dbchar = "utf8";

$pdo = new PDO(
    "mysql:host=$host;charset=$dbchar;dbname=$db",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

// (B) PHPSPREADSHEET TO LOAD EXCEL FILE
require "../vendor/autoload.php";
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($target_file);
$worksheet = $spreadsheet->getActiveSheet();

if(isset($_POST['clear'])){
}

// (C) READ DATA + IMPORT
$sql = "INSERT INTO residents(firstname,middlename,lastname,age,gender,birthDate,birthPlace,healthCondition,relationshipToHead,bloodType,civilStatus,occupation,income,household_str,religion,nationality,education,voter,phone,mother,father) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
foreach ($worksheet->getRowIterator(2) as $row) {
    // (C1) FETCH DATA FROM WORKSHEET
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    $data = [];
    foreach ($cellIterator as $cell) {
        $data[] = $cell->getValue();
    }

    // (C2) INSERT INTO DATABASE
    print_r($data);
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        echo "OK - USER ID - {$pdo->lastInsertId()}<br>";
    } catch (Exception $ex) {
        echo "Erroror". $ex->getMessage() . "<br>";
    }
    $stmt = null;
}

// (D) CLOSE DATABASE CONNECTION
if ($stmt !== null) {
    $stmt = null;
}
if ($pdo !== null) {
    $pdo = null;
}

$_SESSION['success'] = "Resident record was imported successfully!";

header("location: residents.php");