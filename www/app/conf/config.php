<?php
	// $conf['db_host'] = 'localhost';
	// $conf['db_name'] = 'wks_test';
	// $conf['db_table'] = 'users';
	// $conf['db_login'] = 'root';
	// $conf['db_pwd'] = '';
	// $conf['include_dir'][] = '';
	// $conf['include_dir'][] = 'lib';
	// $conf['include_dir'][] = 'model';

	class Config
	{
		private $data;

		public function Config()
		{
			$this->data = array(
				"db_host" => "localhost",
				"db_name" => "wks_test",
				"db_table" => "users",
				"db_login" => "root",
				"db_pwd" => ""
			);
		}
	}
?>
