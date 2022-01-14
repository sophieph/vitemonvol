<?php
use \Datetime;

/**
 * BookingManager
 */
class BookingManager
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
     * GetList
     *
     * @return void
     * 
     * list of all booking in admin
     */
    public function getList() 
    {
        $requete = 'SELECT * FROM booking';
        $result = $this->_db->query($requete);
        $rows = $result->fetchAll();

        return $rows;
        
    }

    /**
     * Get
     *
     * @param  mixed $id
     * @return void
     * 
     * get a booking with $id
     */
    public function get($id) 
    {
        $requete = 'SELECT * FROM booking WHERE userId = ' . $id;
        $result = $this->_db->query($requete);
        $rows = $result->fetchAll();

        return $rows;
    }

    /**
     * Get
     *
     * @param  mixed $id
     * @return void
     * 
     * get a booking trip with $id
     */
    public function getBookingTrip($id) 
    {
        $requete = 'SELECT * FROM booking WHERE tripId = ' . $id;
        $result = $this->_db->query($requete);
        $rows = $result->fetchAll();

        return $rows;
    }

    /**
     * Add
     *
     * @param  mixed $booking
     * @return void
     * 
     * add a booking in database
     */
    public function add($id, $tripId)
    {
        $date = date("d/m/Y", time());

        $q = $this->_db->prepare('INSERT INTO booking(userId, tripId, createdAt) VALUES(:userId, :tripId, :createdAt)');
        $q->bindValue(':userId', $id);
        $q->bindValue(':tripId', $tripId);
        $q->bindValue(':createdAt', $date);
        $q->execute();
        
        return 'Voyage réservé !';
    }

    /**
      * Exists
      *
      * @return void
      * See if a booking exists
      */
      public function exists($userId, $tripId)
      {
          $q = $this->_db->prepare('SELECT * FROM booking WHERE userId = :userId and tripId = :tripId');
          $q->bindValue(':userId', $userId);
          $q->bindValue(':tripId', $tripId);
          $q->execute();
          
          return (bool) $q->fetchColumn();
      }
}