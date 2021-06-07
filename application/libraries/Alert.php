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
	 * Penyimpanan semua alert yang ingin ditampilkan
	 * 
	 * @var array
	 */
	private $_alerts;

	public function __construct()
	{
		// Key array adalah nama class alert
		// dari Urora theme dashboard
		$this->_alerts = array(
			'danger'  => array(),
			'primary' => array(),
			'warning' => array(),
			'info'    => array(),
		);
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
		$CI =& get_instance();

		return $CI->load->view('alert/alert', array('alerts' => $this->_alerts));
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
		if (! empty($jenis)) {
			return $this->_alerts[$jenis];
		}

		return $this->_alerts;
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
			$this->_alerts[$jenis] += $pesan;
		}
		else {
			array_push($this->_alerts[$jenis], $pesan);
		}
	}
}
