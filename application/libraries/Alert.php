<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * **Alert Manager**
 * 
 * Class untuk men-set dan menampilkan alert ke view
 * dengan lebih praktis.
 * Penggunaan alert mengikuti tema dasbor yang dipakai.
 * 
 * @author Rizal M
 */
class Alert {

	/**
	 * Object CI
	 * 
	 * @var object
	 */
	private $_CI;

	public function __construct()
	{
		$this->_CI =& get_instance();

		if (empty($_SESSION['alerts'])) {
			// Key array adalah nama class alert
			// dari Urora theme dashboard
			$_SESSION['alerts'] = array(
				'primary' => array(),
				'danger'  => array(),
				'warning' => array(),
				'info'    => array(),
			);
		}
	}

	/**
	 * Set alert danger
	 * 
	 * @param string|array  $pesan  Pesan yang ingin ditampilkan
	 */
	public function alertDanger($pesan)
	{
		$this->_setAlert($pesan, 'danger');
	}

	/**
	 * Set alert success
	 * 
	 * Menggunakan alert jenis `primary` untuk alert success
	 * sesuai dg Urora theme dasboard
	 * 
	 * @param string|array  $pesan  Pesan yang ingin ditampilkan
	 */
	public function alertSuccess($pesan)
	{
		$this->_setAlert($pesan, 'primary');
	}

	/**
	 * Set alert warning
	 * 
	 * @param string|array  $pesan  Pesan yang ingin ditampilkan
	 */
	public function alertWarning($pesan)
	{
		$this->_setAlert($pesan, 'warning');
	}

	/**
	 * Set alert info
	 * 
	 * @param string|array  $pesan  Pesan yang ingin ditampilkan
	 */
	public function alertInfo($pesan)
	{
		$this->_setAlert($pesan, 'info');
	}

	/**
	 * Tampilkan semua alert ke view
	 * 
	 * @return view
	 */
	public function tampilkan()
	{
		$alerts = $_SESSION['alerts'];

		unset($_SESSION['alerts']);

		return $this->_CI->load->view('alert/alert', array('alerts' => $alerts));
	}

	/**
	 * Ambil alert-alert yang sudah di set
	 * 
	 * @param    string    $jenis    Jenis alert yang mau diambil, kosongkan untuk ambil semua
	 * 
	 * @return   array
	 */
	public function getAlerts(string $jenis = ''):array
	{
		if ( ! isset($_SESSION['alerts'])) {
			return [];
		}

		if (! empty($jenis)) {
			return $_SESSION['alerts'][$jenis];
		}

		return $_SESSION['alerts'];
	}

	/**
	 * Has Alert?
	 * 
	 * Cek apakah ada alert yang pernah di-set.
	 * Bisa cek semua jenis atau jenis tertentu saja.
	 * 
	 * @param    string   $jenis    Jenis alert yang mau dicek
	 * 
	 * @return   boolean
	 */
	public function hasAlert(string $jenis = ''):bool
	{
		if ( ! empty($jenis)) {
			return ! empty($_SESSION['alerts'][$jenis]);
		}

		// Jika tidak ada argumen $jenis yang diberikan maka cek semua jenis
		foreach ($_SESSION['alerts'] as $alert) {
			if ( ! empty($alerts)) {
				return TRUE;
			}
		}

		return FALSE;
	}

	/**
	 * Set alert danger
	 * 
	 * @param   string|array  $pesan  Pesan yang ingin ditampilkan
	 * @param   string        $jenis  Jenis pesan alert
	 */
	private function _setAlert($pesan, string $jenis)
	{
		if (is_array($pesan)) {
			$_SESSION['alerts'][$jenis] += $pesan;
		}
		else {
			array_push($_SESSION['alerts'][$jenis], $pesan);
		}
	}
}
