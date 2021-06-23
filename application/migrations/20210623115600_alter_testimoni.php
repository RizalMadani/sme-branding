<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_testimoni extends CI_Migration {

	public function up()
	{
		// ALTER TABLE `testimoni` DROP FOREIGN KEY `testimoni_ibfk_1`; 
		// ALTER TABLE `testimoni` ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `user`(`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

		$this->db->query('ALTER TABLE `testimoni` DROP FOREIGN KEY `testimoni_ibfk_1`');
		$this->db->query('ALTER TABLE `testimoni` ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `umkm`(`id_umkm`) ON DELETE RESTRICT ON UPDATE RESTRICT');

		$this->db->query('ALTER TABLE `testimoni` CHANGE `detail_testimoni` `detail_testimoni` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE `testimoni` DROP FOREIGN KEY `testimoni_ibfk_1`');
		$this->db->query('ALTER TABLE `testimoni` ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `user`(`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT');

		$this->db->query('ALTER TABLE `testimoni` CHANGE `detail_testimoni` `detail_testimoni` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL');
	}
}
