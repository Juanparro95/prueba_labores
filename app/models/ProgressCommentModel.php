<?php

class ProgressCommentModel extends Model{

	public $progressCommentId;
	public $progressTicketId;
	public $description;
	public $status;
	public $created_at;
	public $updated_at;

	public function Add(){

		$sql = sprintf('INSERT INTO %s (progressticketid, "description", created_at, updated_at) VALUES (:progressticketid, :description, :created_at, :updated_at)', DB_TABLE_PROGRESS_COMMENTS_TICKETS);
		$data = [
			":progressticketid" => $this->progressTicketId,
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

    public function One(){

        $sql = sprintf('SELECT description, created_at FROM %s WHERE progressticketid = :progressTicketId ORDER BY created_at DESC', DB_TABLE_PROGRESS_COMMENTS_TICKETS);

		try {
			return ($rows = parent::query($sql, [':progressTicketId' => $this->progressTicketId])) ? $rows : false;
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