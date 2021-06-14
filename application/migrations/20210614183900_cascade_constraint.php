<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Cascade_constraint extends CI_Migration {

	public function up()
	{
		// ALTER TABLE `foto_produk` DROP FOREIGN KEY `foto_produk_ibfk_1`;
		// ALTER TABLE `foto_produk` ADD CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk`(`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

		// Ubah constraint file-file produk, ON DELETE CASCADE ON UPDATE CASCADE

		$this->db->query('ALTER TABLE `foto_produk` DROP FOREIGN KEY `foto_produk_ibfk_1`');
		$this->dbforge->add_column('foto_produk', 
			'CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE'
		);

		$this->db->query('ALTER TABLE `logo_produk` DROP FOREIGN KEY `logo_produk_ibfk_1`');
		$this->dbforge->add_column('logo_produk', 
			'CONSTRAINT `logo_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE'
		);

		$this->db->query('ALTER TABLE `kemasan_produk` DROP FOREIGN KEY `kemasan_produk_ibfk_1`');
		$this->dbforge->add_column('kemasan_produk', 
			'CONSTRAINT `kemasan_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE'
		);
	}

	public function down()
	{
		$this->db->query('ALTER TABLE `foto_produk` DROP FOREIGN KEY `foto_produk_ibfk_1`');
		$this->dbforge->add_column('foto_produk', 
			'CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT'
		);

		$this->db->query('ALTER TABLE `logo_produk` DROP FOREIGN KEY `logo_produk_ibfk_1`');
		$this->dbforge->add_column('logo_produk', 
			'CONSTRAINT `logo_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT'
		);

		$this->db->query('ALTER TABLE `kemasan_produk` DROP FOREIGN KEY `kemasan_produk_ibfk_1`');
		$this->dbforge->add_column('kemasan_produk', 
			'CONSTRAINT `kemasan_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT'
		);
	}
}
