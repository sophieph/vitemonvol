<?php

/**
 * Trip
 */
class Trip
{
    
    protected $id;
    protected $name;
    protected $date;
    protected $description;
    protected $maximumTravellers;
    protected $picture;

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

    public function getName() 
    {
        return $this->name;
    }


    public function setName($name) 
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    } 

    public function getDate() 
    {
        return $this->date;
    }

    public function setDate($date) 
    {
        if (is_string($date)) {
            $this->date = $date;
        }
    } 

    public function getDescription() 
    {
        return $this->description;
    }

    public function setDescription($description) 
    {
        if (is_string($description)) {
            $this->description = $description;
        }
    }

    public function getMaximumTravellers()
    {
        return $this->maximumTravellers;
    }

    public function setMaximumTravellers($maximumTravellers) 
    {
        $maximumTravellers = (int) $maximumTravellers;
        if ($maximumTravellers > 0) {
            $this->maximumTravellers = $maximumTravellers;
        }
    }

    
    public function getPicture() 
    {
        return $this->picture;
    }


    public function setPicture($picture) 
    {
        if (is_string($picture)) {
            $this->picture = $picture;
        }
    } 
    
    
}

?>