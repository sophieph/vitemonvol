<?php 
 
/**
 * TripManager
 */
class TripManager
{
    private $_db;
    
    public function __construct($db) 
    {
        $this->setDb($db);
    }
    
    public function setDb(PDO $db) 
    {
        $this->_db = $db;
    }

    /**
     * Add
     *
     * @param  mixed $trip
     * @return void
     * 
     * add a trip in database
     */
    public function add(Trip $trip)
    {
        $q = $this->_db->prepare('INSERT INTO trip(name, date,description, maximumTravellers, price) VALUES(:name, :date, :description, :maximumTravellers, :price)');
        $q->bindValue(':name', $trip->getName());
        $q->bindValue(':date', $trip->getDate());
        $q->bindValue(':description', $trip->getDescription());
        $q->bindValue(':maximumTravellers', $trip->getMaximumTravellers());
        $q->bindValue(':price', $trip->getPrice());
        $q->execute();

        $trip->hydrate(
            [
            'code' => $this->_db->lastInsertId()
            ]
        );
    }


    /**
     * Edit
     *
     * @param  mixed $trip
     * @return void
     * 
     * edit a trip
     */
    public function edit(Trip $trip)
    {
        $q = $this->_db->prepare('UPDATE trip SET name = :name, date = :date,  description = :description, maximumTravellers = :maximumTravellers WHERE id = :id');
        $q->bindValue(':id', $trip->getId());
        $q->bindValue(':name', $trip->getName());
        $q->bindValue(':description', $trip->getDescription());
        $q->bindValue(':date', $trip->getDate());
        $q->bindValue(':maximumTravellers', $trip->getMaximumTravellers());
        $q->execute();
    }

    /**
     * Delete
     *
     * @param  mixed $id
     * @return void
     * 
     * Delete a Trip in Trip table
     */
    public function delete($id) 
    {
        $q = $this->_db->prepare('DELETE FROM trip WHERE id = :id');
        $q->bindValue(':id', $id);
        $q->execute();
    }

        
    /**
     * GetList
     *
     * @return void
     * 
     * list of all trip in admin
     */
    public function getList() 
    {
        $q = $this->_db->prepare('SELECT * FROM trip');
        $q->execute();
        return $q->fetchAll();
    }
}