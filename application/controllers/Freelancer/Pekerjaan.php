<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends MY_Controller
{
	public function index($type)
	{
		switch ($type) {
			case 'ongoing':
				$this->_pekerjaanOnGoing();
				break;

			case 'history':
				$this->_pekerjaanHistory();
				break;
			}
	}

	public function _pekerjaanOnGoing()
	{
		echo "on goinggg";
	}

	public function _pekerjaanHistory()
	{
		echo "history";
	}
}
