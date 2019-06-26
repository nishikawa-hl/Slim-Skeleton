<?php

namespace App\Model;

use PDO;

abstract class Model
{

    protected $pdo;

    public function __construct() {

        $settings = require __DIR__ . '/../../settings.php';

        switch ( getenv( 'ENV' ) ) {

            case 'develop':
            case 'admin':

                $this->pdo = new PDO(

                    $settings[ 'settings' ][ 'db' ][ 'develop' ][ 'dsn' ],
                    $settings[ 'settings' ][ 'db' ][ 'develop' ][ 'user' ],
                    $settings[ 'settings' ][ 'db' ][ 'develop' ][ 'password' ]

                );
                break;

            default:

                $this->pdo = new PDO(

                    $settings[ 'settings' ][ 'db' ][ 'production' ][ 'dsn' ],
                    $settings[ 'settings' ][ 'db' ][ 'production' ][ 'user' ],
                    $settings[ 'settings' ][ 'db' ][ 'production' ][ 'password' ]

                );
                break;

        }

		$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
    }

    function generateRandomStrings($length, $table=null, $column=null) {

		$str = array_merge(
			range('a', 'z'),
			range('0', '9'),
			range('A', 'Z')
		);

		while( 1 ) {

			$result = null;

			for ( $i=0; $i<$length; $i++ ) {

				$result .= $str[rand(0, count($str)-1)];

			}

			if ( $table != null and $column != null ) {

				$sql = "SELECT ".$column." FROM ".$table." WHERE ".$column."=:value";
				$sth = $this->pdo->prepare($sql);
				$sth->bindValue("value", $result, PDO::PARAM_STR);
				$sth->execute();

				if ( !$sth->fetch() ) {

					break;

				}

			} else {

				break;

			}

		}

		return $result;

    }
    
}