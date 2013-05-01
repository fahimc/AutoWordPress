<?php
Class SQLImport {
	private $sqlfile = "";
	// SQL File
	private $hostname = "";
	// Server Name
	private $db_user = "";
	// User Name
	private $db_password = "";
	// User Password
	private $database_name = "";
	// DBName

	private $sqldelimiter = ';';
	private $description = '';
	private $diagnostic_info = '';
	private $blnDiagnostics = FALSE;

	public function init($config) {
		$this -> sqlfile = $config -> CLIENT_URL . $config -> SQL_SQL_FILENAME;
		$this -> hostname = $config::HOST_NAME;
		$this -> db_user = $config::DATABASE_USER;
		$this -> db_password = $config::DATABASE_PASS;
		$this -> database_name = $config -> DATABASE_NAME;
	}

	public function import() {
		$diagmode = (isset($_REQUEST['diagmode'])) ? $_REQUEST['diagmode'] : 0;
		if ($diagmode == 1)
			$this -> blnDiagnostics = TRUE;

		$link = mysql_connect(mysql_real_escape_string($this -> hostname), mysql_real_escape_string($this -> db_user), mysql_real_escape_string($this -> db_password));

		if (!$link) {
			die("Unable to connect to the MySQL database");
		} else {
			// Select the mySQL DB
			mysql_select_db(mysql_real_escape_string($this -> database_name), $link) or die("Wrong MySQL Database");

			$filename = $this -> sqlfile;
			$this -> sqlfile = fopen($this -> sqlfile, 'r');

			if (is_resource($this -> sqlfile) === true) {
				$query = array();

				while (feof($this -> sqlfile) === false) {
					$query[] = fgets($this -> sqlfile);

					if (preg_match('~' . preg_quote($this -> sqldelimiter, '~') . '\s*$~iS', end($query)) === 1) {
						$query = trim(implode('', $query));

						if ($this -> blnDiagnostics === true)
							$this -> diagnostic_info .= $query;

						$result = mysql_query($query);

						while (ob_get_level() > 0) {
							ob_end_flush();
						}
						flush();
					}
					if (is_string($query) === true) {
						$query = array();
					}
					
				}
				fclose($this -> sqlfile);
			}
			$this -> description = "File " . $filename . " successfully imported into the " . $this -> database_name . " database.";

			if ($this -> blnDiagnostics === true)
				$this -> description .= '<h3>Diagnostics</h3><div>' . $this -> diagnostic_info . '</div>';

			mysql_close();

		}

		return $this -> description;
		
	}

}

// function startImport()
// {
//
// /* *******************************************
// *	Include the configuration file
// * *******************************************/
//
// require_once 'sqlconfig.php';
// //require_once 'sqlimportfunc.php';
//
// //Initialize variables
// $sqlfile = $config['sql_file'];					// SQL File
// $hostname = $config['host_name'];				// Server Name
// $db_user = $config['database_user'];			// User Name
// $db_password = $config['database_password'];	// User Password
// $database_name = $config['database_name'];		// DBName
//
// $sqldelimiter = ';';
// $description = '';
// $diagnostic_info = '';
// $blnDiagnostics = FALSE;
//
// $diagmode = (isset($_REQUEST['diagmode'])) ? $_REQUEST['diagmode'] : 0;
//
// if($diagmode == 1)
// $blnDiagnostics = TRUE;
//
// /* ************************************************
// *	Connect to the mysql database
// * ************************************************/
// $link = mysql_connect(mysql_real_escape_string($hostname), mysql_real_escape_string($db_user), mysql_real_escape_string($db_password));
//
// if (!$link)
// {
// die($header.$body."Unable to connect to the MySQL database".$footer);
// }
// else
// {
// // Select the mySQL DB
// mysql_select_db(mysql_real_escape_string($database_name), $link) or die("Wrong MySQL Database");
//
// $filename = $sqlfile;
// $sqlfile = fopen($sqlfile, 'r');
//
// if (is_resource($sqlfile) === true)
// {
// $query = array();
//
// while (feof($sqlfile) === false)
// {
// $query[] = fgets($sqlfile);
//
// if (preg_match('~' . preg_quote($sqldelimiter, '~') . '\s*$~iS', end($query)) === 1)
// {
// $query = trim(implode('', $query));
//
// if($blnDiagnostics === true)
// $diagnostic_info .= $query;
//
// $result = mysql_query($query)or die(mysql_error().'. The import has been terminated and did not complete the process.'.$query);
//
// while (ob_get_level() > 0)
// {
// ob_end_flush();
// }
// flush();
// }
// if (is_string($query) === true)
// {
// $query = array();
// }
// }
//
// fclose($sqlfile);
// }
// $description = "File ".$filename." successfully imported into the ".$database_name." database.";
//
// if($blnDiagnostics === true)
// $description .= '<h3>Diagnostics</h3><div>'.$diagnostic_info.'</div>';
//
// mysql_close();
//
// }
//
// echo $description;
// }
?>