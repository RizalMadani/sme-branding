<?php

if (! function_exists('d'))
{
	/**
	 * Print data apa saja
	 * 
	 * @param    mixed    $data     Data yang mau di-print
	 */
	function d($data)
	{
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
}

if (! function_exists('dd'))
{
	/**
	 * Print data apa saja
	 * 
	 * Dan akan menghentikan eksekusi php setelah print
	 * 
	 * @param   mixed    $data    Data yang mau di-print 
	 */
	function dd($data)
	{
		d($data);
		die;
	}
}

if (! function_exists('user_level'))
{
	/**
	 * Konversi nama level yang ada di db
	 * 
	 * Cth: pengelola -> admin
	 * 
	 * @param    string    $level    level user dari db
	 * 
	 * @return   string
	 */
	function user_level(string $level):string
	{
		if (strtolower($level) == 'pengelola') {
			return 'admin';
		}

		return strtolower($level);
	}
}
