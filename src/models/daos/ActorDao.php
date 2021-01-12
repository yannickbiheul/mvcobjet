<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Actor;

class ActorDao extends BaseDao
{
   
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM actor ");
        $res = $stmt->execute();
        if ($res) {
            $actors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $actors[] = $this->createObjectFromFields($row);
            }
            return $actors;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields)
    {
        $acteur = new actor();
        $acteur->setId($fields['id'])
              ->setFirstName($fields['first_name']) 
              ->setLastName($fields['last_name']);         

        return $acteur;
    }




}
