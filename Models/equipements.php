<?php
class equipements
{
	public $id_equipements = 0;
	public $nomequipements = '';
	private $db = null;
	public function __construct()
	{
		try {
            $this->db = new PDO('mysql:host=localhost;dbname=digit_engin;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $error) {
            die($error->getMessage());
        }
	}
	public function checkEquipementsExist(){
        $checkEquipementsExist = $this->db->prepare(
            'SELECT COUNT(`id_equipements`) AS `isEquipementsExist`
            FROM `equipements` 
            WHERE `nomEquipements` = :nomEquipements'
        );
        $checkEquipementsExist->bindvalue(':nomEquipements', $this->nomEquipements, PDO::PARAM_STR);
        $checkEquipementsExist->execute();
        return $checkEquipementsExist->fetch(PDO::FETCH_OBJ)->isEquipementsExist;
    }
	public function getEquipements(){
        $getEquipements = $this->db->prepare(
            'SELECT `id_equipements`, `nomEquipements`
            FROM `equipements`;'
        );
        $getEquipements->execute();
        return $getEquipements->fetchAll(PDO::FETCH_OBJ);
    }
	public function checkIdEquipementsExist(){
        $checkIdEquipementsExist = $this->db->prepare(
            'SELECT COUNT(`id_equipements`) AS `isEquipementsExist`
            FROM `equipements` 
            WHERE `id_equipements` = :id_equipements'
        );
        $checkIdEquipementsExistQuery->bindvalue(':id_equipements', $this->id_equipements, PDO::PARAM_INT);
        $checkIdEquipementsExistQuery->execute();
        $data = $checkIdEquipementsExistQuery->fetch(PDO::FETCH_OBJ);
        return $data->isEquipementsExist;     
    } 
	public function addEquipements(){
        try {
            $addEquipementsQuery = $this->db->prepare(
                'INSERT INTO `equipements` (`nomEquipements`)
                VALUES (:nomEquipements);'
            );
            $addEquipementsQuery->bindvalue(':nomEquipements', $this->nomEquipements, PDO::PARAM_STR);
            return $addEquipementsQuery->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
            echo $th->getMessage();
        }
    }
	public function modifyEquipements(){
        $modifyEquipementsQuery = $this->db->prepare(
           'UPDATE `equipements` 
           SET `nomEquipements` = :nomEquipements
           WHERE `id_equipements` = :id_equipements'
        );
        $modifyEquipementsQuery->bindValue(':nomEquipements', $this->nomEquipements, PDO::PARAM_STR);
        $modifyEquipementsQuery->bindValue(':id_equipements', $this->id_equipements, PDO::PARAM_INT);
        return $modifyEquipementsQuery->execute();
     }

    public function deleteEquipements() {
        $deleteEquipementsQuery = $this->db->prepare(
            'DELETE FROM `equipements`
            WHERE `id_equipements` = :id_equipements'
        );
        $deleteEquipementsQuery->bindValue(':id_equipements', $this->id_equipements, PDO::PARAM_INT);
        return $deleteEquipementsQuery->execute();
    }
}