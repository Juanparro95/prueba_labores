<?php

class BusinnesModel extends Model{

	public $businessId;
	public $name;
	public $primaryColor;
	public $secondaryColor;
	public $logo;
	public $created_at;
	public $updated_at;

	public function Add(){

		$sql = sprintf('INSERT INTO %s VALUES (:name,:primaryColor,:secondaryColor,:logo,:created_at, :updated_at)', DB_TABLE_BUSINESS);

		$data = [
			":name" => $this->name,
			":primaryColor" => $this->primaryColor,
			":secondaryColor" => $this->secondaryColor,
			":logo" => $this->logo,
			":created_at" => $this->created_at,
			":updated_at" => $this->updated_at,
		];

		try {

			return ($this -> id = parent::query($sql, $data)) ? $this -> id : false;

		} catch (Exception $e) {

			return false;

		}

	}

	public static function All()
	{
		$sql = sprintf('SELECT BusinessId, Name FROM %s ORDER BY BusinessId', DB_TABLE_BUSINESS);
		try {
			return ($rows = parent::query($sql)) ? $rows : false;
		} catch (Exception $e) {
			throw $e;
		}
	}
    
}