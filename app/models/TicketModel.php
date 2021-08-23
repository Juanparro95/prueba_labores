<?php

class TicketModel extends Model{

	public $ticketId;
	public $projectId;
	public $slug;
	public $name;
	public $status;
	public $description;
	public $created_at;
	public $updated_at;

	public function Add(){

		$sql = sprintf('INSERT INTO %s (projectid, slug, "name", "status", "description", created_at, updated_at) VALUES (:projectid, :slug, :name, 0,:description,:created_at, :updated_at)', DB_TABLE_TICKETS);

		$data = [
			":projectid" => $this->projectId,
			":slug" => $this->slug,
			":name" => $this->name,
			":description" => $this->description,
			":created_at" => $this->created_at,
			":updated_at" => $this->updated_at,
		];
		try {

			return ($this -> ticketId = parent::query($sql, $data)) ? $this -> ticketId : false;

		} catch (Exception $e) {
			return false;
		}

	}

	public function All()
	{
		$sql = sprintf('SELECT * FROM %s WHERE projectid = :projectid', DB_TABLE_TICKETS);

		try {
			return ($rows = parent::query($sql, [':projectid' => $this->projectId])) ? $rows : false;
		} catch (Exception $e) {
			throw $e;
		}
	}

    public function One(){

        $sql = sprintf('SELECT * FROM %s WHERE ticketid = :ticketid', DB_TABLE_TICKETS);
		try {
			return ($rows = parent::query($sql, ['ticketid' => $this->ticketId])) ? $rows[0] : false;
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
    
}