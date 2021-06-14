<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Migrate
 * 
 * Class controller untuk melakukan migrasi database
 * 
 * **Contoh penggunaan**:
 *
 *  - Di browser
 *
 * 		localhost/sme-branding/migrate
 *
 *  - Di cli (cmd) di direktori/folder app ini
 *
 * 		php index.php migrate
 */
class Migrate extends CI_Controller {

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());

			return;
		}

		echo "Database sudah di-update".PHP_EOL.PHP_EOL;
	}

}
