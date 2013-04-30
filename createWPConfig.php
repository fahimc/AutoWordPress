<?php
Class WPConfig {
	public $keys = "";
	public $siteurl = "";
	public $config = "";
	public function getKeys() {
		//get keys
		$this -> keys = file_get_contents('https://api.wordpress.org/secret-key/1.1/salt/', "r");
	}

	public function createConfigFile() {
		if (!copy($this->config -> THEME_URL . $this->config -> WP_CONFIG_FILENAME, $this->config -> CLIENT_URL . "/" . $this->config -> WP_CONFIG_FILENAME)) {
			echo "failed to copy file...\n";
		}
	}

	public function updateConfig() {
		$string = file_get_contents($this->config -> CLIENT_URL . "/" . $this->config -> WP_CONFIG_FILENAME, "r");
		$string = str_replace("[DB_NAME]", $this->config, $string);
		$fh = fopen($newsiteurl . "/" . $config -> SQL_SQL_FILENAME, 'w') or die("Could not open: " . mysql_error());
		fwrite($fh, $string);
		fclose($fh);
	}
	public function init()
	{
		$this->getKeys();
		$this->createConfigFile();
	}
}
?>