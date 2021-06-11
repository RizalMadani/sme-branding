<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_modify_columns extends CI_Migration {

	public function up()
	{
		// ubah nama kolom, ubah 'L' menjadi 'l'
		$fieldsLayanan = array(
			'detail_Layanan' => array(
				'name'       => 'detail_layanan',
				'type'       => 'VARCHAR',
				'constraint' => '50',
			),
		);

		$this->dbforge->modify_column('layanan', $fieldsLayanan);

		// ubah default value status
		$fieldsPemesanan = array(
			'status' => array(
				'type' => 'ENUM("pending","mencari freelancer","on going","review","revisi","approval")',
				'null'    => FALSE,
			),
		);

		$this->dbforge->modify_column('pemesanan', $fieldsPemesanan);
	}

	public function down()
	{
		$fieldsLayanan = array(
			'detail_layanan' => array(
				'name'       => 'detail_Layanan',
				'type'       => 'VARCHAR',
				'constraint' => '50',
			),
		);

		$this->dbforge->modify_column('layanan', $fieldsLayanan);

		$fieldsPemesanan = array(
			'status' => array(
				'type' => 'ENUM("pending","mencari freelancer","on going","review","revisi","approval")',
				'null' => TRUE,
			),
		);

		$this->dbforge->modify_column('pemesanan', $fieldsPemesanan);
	}
}
