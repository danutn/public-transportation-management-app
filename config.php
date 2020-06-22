<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPI61inKVS8vBDMU2JjkkZr3gZD5ijFc&libraries=geometry"></script>
<?php

session_start();

date_default_timezone_set( 'Europe/Bucharest' );

class config {



	private $link;



	function __construct() {

		require_once( 'config_access.php' );

		$this->link = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE );

		if ( !$this->link ) {

			echo "Error: Unable to connect to MySQL." . PHP_EOL;

			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;

			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;

			exit;

		}

	}



	//Select all from table.

	function fetchall( $table ) {

$sql = "select * from $table";
//echo $sql;

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			//echo $sql;

			$arr[] = $rs;

		}

		return $arr;

	}



	

	function getotUser( $table, $userid, $level ) {

		$sql = "select count(*) as cnt from $table where refrenceid='$userid' and level='$level'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}



	

	function joining( $table, $userid ) {

		$sql = "select count(*) as cnt from $table where refrenceid='$userid'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}



	function insertValue( $table, $column, $value ) {

		echo $sql = "insert into $table ($column) values($value)";

		$result = mysqli_query( $this->link, $sql );

		$val = mysqli_insert_id( $this->link );

		return $val;

	}



	function checkAvailablity( $table ) {

		$sql = "select count(*) as cnt from $table";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}



	function updateValue( $table ) {

		$sql = "update $table";

		mysqli_query( $this->link, $sql );

	}



	function updateRecords( $table, $fields, $where = '' ) {

		if ( $where != '' )$where = " WHERE $where";



		$query =

			mysqli_query( $this->link, "UPDATE $table SET $fields" . $where )or

		die( "Update Error - UPDATE $table SET $fields" . $where . " - " . mysql_error( $this->link ) );

		if ( $query ) {

			return true;

		}



		return false;

	}



	function updateme( $table, $value, $where = null ) {

		$sql = "update $table set $value $where";

		mysqli_query( $this->link, $sql )or die( mysqli_error( $this->link ) );

	}





	

	function single( $table, $column ) {

		$sql = "select $column from $table";

		$result = mysqli_query( $this->link, $sql );

		 $rs = mysqli_fetch_object( $result );

	

		return $rs;

	}



	function singlev( $table ) {

	$sql = "select * from $table";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs;

	}



	function delme( $table, $del, $field = 'id', $limit = NULL ) {

		if ( !empty( $del ) ) {

		$sql = "delete from $table where $field='$del' $limit";

			if ( mysqli_query( $this->link, $sql ) )

				return true;

			else

				return false;

		} else

			return false;

	}



	function countme( $table ) {

		$sql = "select count(*) as cnt from $table";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}



	function joinme( $column, $table1, $table2, $where = null ) {

		$sql = "select $column from $table1 join $table2 $where";

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			$arr[] = $rs;

		}

		return $arr;

	}



	//------------Special DB functions--------------

	public

	function insert( $values, $table ) {



		if ( empty( $values ) || empty( $table ) ) {

			// Noting to do

			return "";

		}



		$list = array();



		foreach ( $values as $k => $v )

			if ( $v == 'NOW()' )

				$list[] = "`" . $k . "` = " . $v;

		else

			$list[] = "`" . $k . "` = '" . mysqli_real_escape_string( $this->link, $v ) . "'";



		$list = implode( ",", $list );

	$query = "INSERT INTO `" . $table . "` SET " . $list;

		if ( mysqli_query( $this->link, $query ) )

			return mysqli_insert_id( $this->link );

		else {

			echo mysqli_error( $this->link );

			return false;

		}

	}


		public function image_upload_check($filename)
		{
		$maxsize=1097152*2;
        $format=array('image/jpg','image/jpeg','image/png','image/gif' );
			if($_FILES[$filename]['size']>=$maxsize){
			   return 'File Size too large upload limit only 2 MB';
			}
			elseif($_FILES[$filename]['size']==0){
				return 'Invalid File';
			}
			elseif(!in_array($_FILES[$filename]['type'],$format)){
				return 'Format Not Supported Only .jpeg files are accepted '. $_FILES[$filename]['type'];
			}else{
				return "OK";
			}
		}

	public

	function select( $fields, $table, $where = '', $orderby = '', $limit = '' ) {

		if ( $where != '' )$where = " WHERE $where";

		if ( $orderby != '' )$orderby = " ORDER BY $orderby";

		if ( $limit != '' )$limit = " LIMIT $limit";

	

		$recordSet =

			mysqli_query( $this->link,

				"SELECT $fields FROM $table" . $where . $orderby . $limit // Set the SELECT for the query

			)or die(

				"Error - SELECT $fields FROM $table" . $where . $orderby . $limit .

				" - " . mysqli_error()

			);

		if ( !$recordSet ) 

			return "Record Set Error";

		else

			while ( $rs = mysqli_fetch_object( $recordSet ) ) {

				$arr[] = $rs;

			}

		return $arr;

		

	}



	public

	function update( $table, $fields, $where = '' ) {

		if ( $where != '' )$where = " WHERE $where";



		$query =

			mysqli_query( $this->link,

				"UPDATE $table SET $fields" . $where

			)or die(

				"Update Error - UPDATE $table SET $fields" . $where . " - " . mysqli_error()

			);

		if ( $query ) {

			return true;

		}

		return false;

	}



	

	public

	function getInsertId() {

		return mysqli_insert_id( $this->link );

	}



	



	public

	function QueryRun( $sql, $prnt = '' ) {

		if ( $prnt == 1 )

			echo "<br>" . $sql;

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			$arr[] = $rs;

		}

		return $arr;

	}



	public

	function CountRecords( $table, $where = '' ) {

		$sql = "select count(*) as cnt from $table $where";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}



	public

	function delete( $table, $where ) {

		$query = mysqli_query( $this->link, "DELETE FROM $table WHERE $where" )or

		die( "Delete Error - DELETE FROM $table WHERE $where" . " - " . mysqli_query( $this->link ) );

		if ( $query )

			return true;



		return false;

	}

	public

	function QueryRunArray( $sql, $prnt = '' ) {

		if ( $prnt == 1 )

			echo "<br>" . $sql;

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			$arr[] = $rs;

		}

		return $arr;

	}












	public

	function user_reg_ch_username( $username, $uid = '' ) {

		$sql = "SELECT Username FROM " . users . " WHERE Username = '" . $username . "'";

		$result = mysqli_query( $this->link, $sql );

		$rows = $result->num_rows;

		if ( $rows > 0 )

			return false;

		else

			return true;

	}








	





	public

	function user_Login( $username, $password ) {

	$sql = "SELECT * FROM " . users . " WHERE Parola = '" . md5( $password ) . "' AND Username = '" . $username . "' ";

		$results = mysqli_query( $this->link, $sql );

		$user_data = mysqli_fetch_object( $results );

		$no_rows = $results->num_rows;

		if ( $no_rows == 1 )



		{
			$_SESSION[ 'login' ] = true;

			$_SESSION[ 'reg_id' ] = $user_data->id_Users;

			$_SESSION[ 'Username' ] = $user_data->Username;
            $_SESSION[ 'avater' ] = $user_data->avater;
			$this->RedirectUser();
		//	return true;

			

		} else {

			return 0;

			$this->unset_post();

		}





	}
public

	function unset_post() {

		foreach ( $_POST as $k => $v ) {

			unset( $_POST[ $k ] );

		}

	}
public

	function RedirectUser() {
header( "location:index2.php" );
}





	public

	function SessionCheck() {

		if ( $_SESSION[ 'login' ] == true and isset( $_SESSION[ 'reg_id' ] ) )

			return true;

		else

			return false;

	}





	public

	function session() {

		if ( isset( $_SESSION[ 'login' ] ) ) {

			return $_SESSION[ 'login' ];

		} else {

			return false;

		}

	}



	public

	function AdminSession() {

		if ( isset( $_SESSION[ 'MngLogin' ] ) ) {

			return $_SESSION[ 'MngLogin' ];

		} else {

			return false;

		}

	}



	

	public

	function logout() {

		unset( $_SESSION[ 'login' ] );

		session_destroy();

		return true;

	}




	

	public

	function insert_user_reg( $data_post ) {

		$full_name = $data_post[ 'Nume_prenume' ];

		$username = $data_post[ 'Username' ];

		$user_password = $data_post[ 'User_password' ];



		$sql = "INSERT INTO " . MANAGER . " (Nume_prenume, Username, user_password, registeration_date) values('" . $full_name . "','" . $username . "','" . $user_password . "',NOW())";

		$result = mysqli_query( $this->link, $sql );

		return true;

	}





}