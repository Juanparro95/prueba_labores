<?php 

class ProjectModel extends Model{

    public $projectId;
    public $userId;
    public $slug;
    public $name;
    public $description;
    public $created_at;
    public $updated_at;

    public function Add(){

        $sql = sprintf('INSERT INTO %s (userid, slug, "name", description, status, created_at, updated_at) VALUES(:userId, :slug, :name, :description, 0, :created_at, :updated_at)', DB_TABLE_PROJECTS);
        
        $data = [
			":userId" => $this->userId,
			":slug" => $this->slug,
			":name" => $this->name,
			":description" => $this->description,
			":created_at" => $this->created_at,
			":updated_at" => $this->updated_at
		];
		try {
			return ($this -> id = parent::query($sql, $data)) ? $this -> id : false;
		} catch (Exception $e) {
			// throw $e;
            return false;
		}
    }

    public function All(){

        $sql = sprintf('SELECT * FROM %s ', DB_TABLE_PROJECTS);
		try {
			return ($rows = parent::query($sql)) ? $rows : false;
		} catch (Exception $e) {
			throw $e;
		}
    }

    public function One(){

        $sql = sprintf('SELECT * FROM %s WHERE ProjectId = :projectId', DB_TABLE_PROJECTS);
		try {
			return ($rows = parent::query($sql, ['projectId' => $this->projectId])) ? $rows[0] : false;
		} catch (Exception $e) {
			throw $e;
		}
    }

    public function OneBySlug(){

        $sql = sprintf('SELECT * FROM %s WHERE slug = :slug', DB_TABLE_PROJECTS);
		try {
			return ($rows = parent::query($sql, ['slug' => $this->slug])) ? $rows[0] : false;
		} catch (Exception $e) {
			throw $e;
		}
    }

}