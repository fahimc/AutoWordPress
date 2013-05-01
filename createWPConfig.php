<?php
Class WPConfig {
	public $keys = "";
	public $siteurl = "";
	public $config = "";
	public function getKeys() {
		//get keys
		$this -> keys = file_get_contents('http://api.wordpress.org/secret-key/1.1/salt/', "r");
		echo  $this -> keys ;
	}

	public function createConfigFile() {
		echo "<br> url:".$this->config -> CLIENT_URL . $this->config -> WP_CONFIG_FILENAME."<br>";
		if (!copy($this->config -> CLIENT_URL . $this->config -> WP_CONFIG_FILENAME, $this->config -> CLIENT_URL . "/" . $this->config -> WP_CONFIG_FILENAME)) {
			echo "failed to copy file...\n";
		}
	}

	public function updateConfig() {
		$string = file_get_contents($this->config -> CLIENT_URL . "/" . $this->config -> WP_CONFIG_FILENAME, "r");
		$string = str_replace("[DB_NAME]", $this->config->DATABASE_NAME, $string);
		$string = str_replace("[DB_USER]", Config::DATABASE_USER,$string);
		$string = str_replace("[DB_PASSWORD]", Config::DATABASE_PASS,$string);
		$string = str_replace("[DB_HOST]", Config::HOST_NAME,$string);
		$string = str_replace("[KEYS]", $this -> keys,$string);
		$fh = fopen($this->config -> CLIENT_URL . "/" . $this->config -> WP_CONFIG_FILENAME, 'w') or die("Could not open: " . mysql_error());
		fwrite($fh, $string);
		fclose($fh);
	}
	public function init()
	{
		$this->getKeys();
		//$this->createConfigFile();
		$this->updateConfig();
		echo "WPConfig::Done";
	}
}
?>