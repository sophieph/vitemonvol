<?php

/**
 * Booking
 */
class Booking
{
    
    protected $id;
    protected $userId;
    protected $tripId;
    protected $createdAt;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
        $this->type = strtolower(static::class);
    }
    
    public function hydrate(array $donnees) 
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }   
    }

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $id = (int) $id;
            
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function getUserId() 
    {
        return $this->userId;
    }


    public function setUserId($userId) 
    {
        if (is_string($userId)) {
            $this->userId = $userId;
        }
    } 

    public function getTripId() 
    {
        return $this->tripId;
    }

    public function setTripId($tripId) 
    {
        if (is_string($tripId)) {
            $this->tripId = $tripId;
        }
    } 

    public function getCreatedAt() 
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) 
    {
        $this->createdAt = $createdAt;
    }
}
