<?php
/**
 * unit-qql:/index.php
 *
 * @creation  2019-06-21
 * @version   1.0
 * @package   unit-qql
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @creation  2019-06-21
 */
namespace OP\UNIT;

/** Used class.
 *
 */
use OP\OP_CORE;
use OP\OP_UNIT;
use OP\IF_UNIT;

/** qql
 *
 * @creation  2019-06-21
 * @version   1.0
 * @package   unit-qql
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class QQL implements IF_UNIT
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_UNIT;

	/** Parse to array of op-unit-sql config.
	 *
	 * @param  string $qql
	 * @return array  $config
	 */
	static function Parse($qql)
	{
		//	...
		$config = [];

		//	...
		if( $pos = strpos($qql, '<-') ){
			$fld = substr($qql, 0, $pos);
			$qql = substr($qql, $pos+2);

			//	....
			$config['field'] = $fld;
		};

		//	...
		if( $pos   = strrpos($qql, '=') ){
			$table = substr ($qql, 0, $pos);
			$value = substr ($qql, $pos+2);
		};

		//	...
		if( $table ){
			//	...
			list($table, $field) = explode('.', trim($table).'.');

			//	...
			$config['table'] = $table;
			$config['where'][trim($field)] = trim($value);
		};

		//	...
		return $config;
	}
}
