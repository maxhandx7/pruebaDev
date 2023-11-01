<?php

use Stripe\Person;

$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER["CONTEXT_DOCUMENT_ROOT"])) {
    $res = @include $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/main.inc.php";
}
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = realpath(__FILE__);
$i = strlen($tmp) - 1;
$j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) {
    $i--;
    $j--;
}
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1)) . "/main.inc.php")) {
    $res = @include substr($tmp, 0, ($i + 1)) . "/main.inc.php";
}
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1))) . "/main.inc.php")) {
    $res = @include dirname(substr($tmp, 0, ($i + 1))) . "/main.inc.php";
}
// Try main.inc.php using relative path
if (!$res && file_exists("../main.inc.php")) {
    $res = @include "../main.inc.php";
}
if (!$res && file_exists("../../main.inc.php")) {
    $res = @include "../../main.inc.php";
}
if (!$res && file_exists("../../../main.inc.php")) {
    $res = @include "../../../main.inc.php";
}
if (!$res) {
    die("Include of main fails");
}

require_once DOL_DOCUMENT_ROOT . '/contact/class/contact.class.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/company.lib.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/functions2.lib.php';
dol_include_once('/prueba/class/persona2.class.php');
dol_include_once('/prueba/lib/prueba_persona2.lib.php');

$txtNom = trim($_REQUEST['txtNom']);
$txtApell = trim($_REQUEST['txtApell']);
$txtMail = trim($_REQUEST['txtMail']);
$txtTel = trim($_REQUEST['txtTel']);

if (
    $txtNom == ""       ||
    $txtApell == ""     ||
    $txtMail == ""      ||
    $txtTel == ""
) {
    $_SESSION['message'] = "no se admiten campos vacios";
    header('location: pruebaindex.php');
} else {

    try {
        $db->begin();
        $stmt = $db->query("INSERT INTO llx_prueba (nombre, apellido, email, tel)
         VALUES ('" . $txtNom . "','" . $txtApell . "','" . $txtMail . "','" . $txtTel . "')");
        $db->commit();
        $_SESSION['message'] = "Registro Exitoso";
        header('location: pruebaindex.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
        header('location: pruebaindex.php');
        exit;
    }
}


$_SESSION['message'] = "Error";
header('location: pruebaindex.php');
