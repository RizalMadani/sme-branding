<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Seeder
 *
 * Class controller untuk seeding database.
 * Isi database menggunakan faker FakerPHP.
 *
 * **Requirement**:
 *
 * FakerPHP/Faker
 *
 * **Contoh penggunaan**:
 *
 *  - Di browser
 *
 * 		localhost/sme-branding/isidata/umkm/2
 *
 *  - Di cli (cmd) di direktori/folder app ini
 *
 * 		php index.php isidata/freelancer/3
 *
 * **Fitur**
 *
 * - Isi data pengelola
 * - Isi data umkm
 * - Isi data freelancer
 */
class Seeder extends CI_controller {

	/**
	 * Faker objek dari FakerPHP/Faker
	 *
	 * @var object
	 */
	private $_faker;

	/**
	 * Array untuk level user
	 *
	 * @var array
	 */
	private $_userLevel;

	/**
	 * Array kategori keahlian
	 *
	 * @var array
	 */
	private $_kategori_keahlian;

	//---------------------------------

	public function __construct()
	{
		parent::__construct();
		$this->_userLevel = ['pengelola', 'umkm', 'freelancer'];
		$this->_kategori_keahlian = ['desainer', 'branding', 'bisnis'];
	}

	/**
	 * Function Index
	 *
	 * Menentukan function apa yang harus dipanggil
	 * sesuai parameter $kelompok
	 *
	 * @param  string  $kelompok  Kelomok data untuk diisi (user, pengelola, umkm, freeelancer)
	 * @param  mixed   $jumlah    Jumlah baris yang harus diisi
	 */
	public function index(string $kelompok = 'semua', $jumlah = 1)
	{
		if (ENVIRONMENT !== 'development') {
			exit();
		}

		$this->_faker = \Faker\Factory::create('id_ID');

		// Cetak tag <pre> jika url dibuka lewat browser
		if ( ! is_cli()) {
			echo "<pre>";
		}

		if ($kelompok === 'semua') {
			$this->_isiPengelola($jumlah);
			$this->_isiUmkm($jumlah);
			$this->_isiFreelancer($jumlah);
		}

		// Jika parameter $kelompok tidak valid maka echo pesan dan keluar
		if ( ! method_exists($this, '_isi'.ucfirst($kelompok))) {
			echo 'Isi data "'.$kelompok.'" tidak berhasil.'.PHP_EOL.
				'Data valid: "user", "umkm", "pengelola", dan "freelancer."';

			return;
		}

		$kelompok = ucfirst($kelompok);

		// Panggil method berdasarkan parameter $kelompok
		// Contoh: $kelompok = 'umkm' -> panggil method _isiUmkm
		$this->{'_isi'.$kelompok}($jumlah);

		// Cetak penutup tag </pre> jika url dibuka lewat browser
		if ( ! is_cli()) {
			echo "</pre>";
		}
	}

	public function isiTestimoni($jumlah = 1)
	{
		$this->db->select('id_umkm');
		$umkms = $this->db->get('umkm')->result();

		if (empty($umkms)) {
			return 'Tabel umkm kosong. Testimoni membutuhkan data UMKM';
		}
		
		$fakeTestimoni = array(
			'Bagus desainnya 😍. ',
			'Terima kasih bantuan redesign-nya 🙏. ',
			'Terima kasih SME Branding. ',
			'Semoga setelah dipakai bisa menambah jumlah pembeli. ',
			'🙏🙏 ',
			'Suka desainnya...',
			'Kemasan sangat menarik dan cocok. ',
			'👍 ',
			'Keren pokoknya...'
		);

		for ($i=0; $i < $jumlah; $i++) { 
			$randKey   = array_rand($umkms);
			$testimoni = array();

			for ($j=0; $j < random_int(1, 4); $j++) { 
				$testimoni[$j] = $fakeTestimoni[array_rand($fakeTestimoni)];
			}

			$data = [
				'id_umkm'          => $umkms[$randKey]->id_umkm,
				'detail_testimoni' => implode($testimoni)
			];

			$this->db->insert('testimoni', $data);
		}

		echo '> Selesai mengisi tabel testimoni sebanyak '.$jumlah.' baris data.'.PHP_EOL;
	}

	/**
	 * Isi tabel user
	 *
	 * @param    string    $jumlah    Jumlah baris untuk diisi
	 * @param    string    $level     Level user, kosongkan untuk random
	 *
	 * @return   array    $idUser     id_user dari hasil insert
	 */
	private function _isiUser($jumlah, string $level = '')
	{
		$idUser = [];
		$pesanTambahan = ' dengan level '.$level;

		if ($level === '') {
			$pesanTambahan = '';
		}

		for ($i = 0; $i < $jumlah; $i++) {
			$username = $this->_faker->unique()->userName();

			$level = $level === '' ? $this->_faker->randomElement($this->_userLevel) : $level;

			$data = [
				'username' => $username,
				'password' => password_hash($username, PASSWORD_DEFAULT),
				'nama'     => $this->_faker->name(),
				'email'    => $this->_faker->email(),
				'no_wa'    => $this->_faker->phoneNumber(),
				'level'    => $level
			];

			$this->db->insert('user', $data);
			$idUser[] = $this->db->insert_id();
		}

		echo '> Selesai mengisi tabel user'.$pesanTambahan.' sebanyak '.$jumlah.' baris data.'.PHP_EOL;
		echo 'Isi password sama dengan username'.PHP_EOL;

		return $idUser;
	}

	/**
	 * Isi tabel user dan Umkm
	 *
	 * @param    mixed    $jumlah    Jumlah baris untuk diisi
	 */
	private function _isiUmkm($jumlah)
	{
		$idUsers = $this->_isiUser($jumlah, 'umkm');

		foreach ($idUsers as $idUser) {
			$data = [
				'id_user'   => $idUser,
				'nama_umkm' => $this->_faker->word(),
				'alamat'    => $this->_faker->address(),
			];

			$this->db->insert('umkm', $data);
		}

		echo '> Selesai mengisi tabel umkm sebanyak '.$jumlah.' baris data.'.PHP_EOL;
		echo PHP_EOL;
	}

	/**
	 * Isi tabel user dengan level 'pengelola'
	 *
	 * @param    mixed    $jumlah    Jumlah baris untuk diisi
	 */
	private function _isiPengelola($jumlah)
	{
		$this->_isiUser($jumlah, 'pengelola');

		echo PHP_EOL;
	}

	/**
	 * Isi tabel user dan freelancer_data
	 *
	 * @param    mixed    $jumlah    Jumlah baris untuk diisi
	 */
	private function _isiFreelancer($jumlah)
	{
		$idUsers = $this->_isiUser($jumlah, 'freelancer');

		foreach ($idUsers as $idUser) {
			$data = [
				'id_user'           => $idUser,
				'kategori_keahlian' => $this->_faker->randomElement($this->_kategori_keahlian),
				'keterangan'        => $this->_faker->optional()->sentence(),
			];

			$this->db->insert('freelancer_data', $data);
		}

		echo '> Selesai mengisi tabel freelancer_data sebanyak '.$jumlah.' baris data.'.PHP_EOL;
		echo PHP_EOL;
	}
}
