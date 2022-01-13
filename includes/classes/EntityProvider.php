<?php 
class EntityProvider {

    public static function getEntities($con, $categoryId, $limit) {

        $sql = "SELECT * FROM categories ";

        if($categoryId != null) {
            $sql .= "WHERE categoryId=:categoryId ";
        }

        $sql .= "ORDER BY RANDO() LIMIT :limit";

        $query = $con->prepare($sql);

        if($categoryId !=null) {
            $query->bindValue(":categoryId", $categoryId);
        }

    }

}
?>