<?php

class UserModel extends Model{

	public $userId;
	public $slug;
	public $name;
	public $lastname;
	public $email;
	public $password;
	public $photo;
	public $status;
	public $businessId;
	public $created_at;
	public $updated_at;

    public function Add(){


		$sql = sprintf('INSERT INTO %s ("Name", "Lastname", "Email", "Password", "BusinessId", "Created_at", "Updated_at", slug, photo)
			VALUES (:name,:lastname,:email,:password,:businessId,:created_at,:updated_at, :slug, :photo)', DB_TABLE_USERS);
		$data = [
            ":name" => $this->name,
			":lastname" => $this->lastname,
			":email" => $this->email,
			":password" => $this->password,
			":businessId" => $this->businessId,
			":created_at" => $this->created_at,
			":updated_at" => $this->updated_at,
			":slug" => $this->slug,
			":photo" => $this->photo,
		];

		try {

			return ($this -> userId = parent::query($sql, $data)) ? $this -> userId : false;

		} catch (Exception $e) {

			return false;

		}

	}

    public function ValidateUser(){
        $sql = sprintf('SELECT * FROM %s WHERE "Email" = :email LIMIT 1', DB_TABLE_USERS);
        try {
            return ($rows = parent::query($sql, ['email' => $this->email])) ? $rows[0] : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

}