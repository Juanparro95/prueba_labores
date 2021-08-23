<?php

class ProgressTicketModel extends Model{

	public $ticketid;
	public $name;
	public $status;
	public $created_at;
	public $updated_at;

	public function Add(){

		$sql = sprintf('INSERT INTO %s (ticketid, "name", "status", created_at, updated_at) VALUES (:ticketid, :name, 0, :created_at, :updated_at)', DB_TABLE_PROGRESS_TICKETS);
		$data = [
			":ticketid" => $this->ticketid,
			":name" => $this->name,
			":created_at" => $this->created_at,
			":updated_at" => $this->updated_at,
		];
		try {

			return ($this -> ticketId = parent::query($sql, $data)) ? $this -> ticketId : false;

		} catch (Exception $e) {
			return false;
		}

	}

    public function One($tickedIdOp = null){

        $sql = sprintf('SELECT ticketid, progressticketid, name, created_at, status FROM %s WHERE ticketid = :ticketid ORDER BY created_at DESC', DB_TABLE_PROGRESS_TICKETS);
		try {
			return ($rows = parent::query($sql, [':ticketid' => ($tickedIdOp != null) ? $tickedIdOp : $this->ticketId])) ? $rows : false;
		} catch (Exception $e) {
			throw $e;
		}
    }

    public function OneBySlug(){

        $sql = sprintf('SELECT * FROM %s WHERE slug = :slug', DB_TABLE_TICKETS);
		try {
			return ($rows = parent::query($sql, ['slug' => $this->slug])) ? $rows[0] : false;
		} catch (Exception $e) {
			throw $e;
		}
    }

    public function Update(){
        $sql = sprintf('UPDATE %s SET status = :status, updated_at = :updated_at WHERE progressticketid = :progressticketid', DB_TABLE_PROGRESS_TICKETS);
        $data = [
                    'status' => $this->status,
                    'progressticketid'    => $this->ticketid,
                    'updated_at'    => $this->updated_at,
                ];

        try {
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }


	public function Count(){

        $sql = sprintf('SELECT COUNT(ticketid) as conteo FROM %s WHERE ticketid = :ticketid', DB_TABLE_PROGRESS_TICKETS);
		try {
			return ($rows = parent::query($sql, [':ticketid' => $this->ticketid])) ? $rows[0] : false;
		} catch (Exception $e) {
			throw $e;
		}
        
    }
    
}