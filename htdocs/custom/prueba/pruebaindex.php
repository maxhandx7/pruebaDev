<?php
/* Copyright (C) 2001-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2015      Jean-François Ferry	<jfefe@aternatik.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       prueba/pruebaindex.php
 *	\ingroup    prueba
 *	\brief      Home page of prueba top menu
 */

use Webklex\PHPIMAP\Query\Query;

// Load Dolibarr environment
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

require_once DOL_DOCUMENT_ROOT . '/core/class/html.formfile.class.php';

// Load translation files required by the page
$langs->loadLangs(array("prueba@prueba"));

$action = GETPOST('action', 'aZ09');

$max = 5;
$now = dol_now();

// Security check - Protection if external user
$socid = GETPOST('socid', 'int');
if (isset($user->socid) && $user->socid > 0) {
	$action = '';
	$socid = $user->socid;
}

// Security check (enable the most restrictive one)
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
//if (!isModEnabled('prueba')) {
//	accessforbidden('Module not enabled');
//}
//if (! $user->hasRight('prueba', 'myobject', 'read')) {
//	accessforbidden();
//}
//restrictedArea($user, 'prueba', 0, 'prueba_myobject', 'myobject', '', 'rowid');
//if (empty($user->admin)) {
//	accessforbidden('Must be admin');
//}


/*
 * Actions
 */

// None


/*
 * View
 */

$form = new Form($db);
$formfile = new FormFile($db);

llxHeader("", $langs->trans("PruebaArea"));


?>
<?php

if (isset($_SESSION['message'])) {
?>
	<div class="alert alert-info text-center" style="margin-top:20px;">
		<?php echo $_SESSION['message']; ?>
	</div>
<?php

	unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew">
			Nuevo
		</button>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT *";
				$sql .= " FROM " . MAIN_DB_PREFIX . "prueba";
				foreach ($db->query($sql) as $row) {
					echo '<tr>';
					echo '<td>' . $row['rowid']  . '</td>';
					echo '<td>' . $row['nombre']  . '</td>';
					echo '<td>' . $row['apellido']  . '</td>';
					echo '<td>' . $row['email']  . '</td>';
					echo '<td>' . $row['tel']  . '</td>';
					echo "<td>" .
						"<button type='button' data-bs-target='#edit_".$row['rowid']."' class='btn btn-success btn-sm' data-bs-toggle='modal'>Editar</button>" .
						"<a href='#delete_" . $row['rowid'] . "' class='btn btn-danger btn-sm' data-bs-toggle='modal'></span> Borrar</a>" .
						"</td>";
					include('BorrarEditarModal.php');
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>

	<?php include('AgregarModal.php'); ?>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php $db->close();  ?>