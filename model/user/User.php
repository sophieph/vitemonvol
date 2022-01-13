<?php

class User {
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $isAdmin;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
        $this->type = strtolower(static::class);
    }
    
    public function hydrate(array $donnees) {
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

    public function setId($id) {
        $id = (int) $id;
            
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function getName() 
    {
        return $this->name;
    }

    public function setName($name) {
            $this->name = $name;
    }  

    public function getEmail() 
    {
        return $this->email;
    }

    public function setEmail($email) {
            $this->email = $email;
    } 

    public function getPassword() 
    {
        return $this->password;
    }

    public function setPassword($password) {
            $this->password = $password;
    }

    public function isAdmin() 
    {
        return $this->isAdmin;
    }

    
    public function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    } 
   

}

?>