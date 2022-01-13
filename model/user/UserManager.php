<?php 
 
/**
 * UserManager
 */
class UserManager
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
     * @param  mixed $user
     * @return void
     * 
     * Add a user
     */
    public function add(User $user) 
    {

        $q = $this->_db->prepare('INSERT INTO User(name, email, password, isAdmin) VALUES(:name, :email, :pass, :isAdmin)');
        $q->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $q->bindValue(':pass', $user->getPassword(), PDO::PARAM_STR);
        $q->bindValue(':isAdmin', $user->isAdmin(), PDO::PARAM_INT);

        $q->execute();
        
        $user->hydrate(
            [
            'id' => $this->_db->lastInsertId()
            ]
        );

    }
    
    /**
     * Edit
     *
     * @param  mixed $user
     * @return void
     * 
     * edit information about a user
     */
    public function edit(User $user)
    {
        $q = $this->_db->prepare('UPDATE User SET name = :name WHERE id = :id');
        $q->bindValue(':id', $user->getId());
        $q->bindValue(':name', $user->getName());

        $q->execute();
    }
    


     
     /**
      * Exists
      *
      * @param  mixed $email
      * @return void
      * See if an email exists
      */
    public function exists($email)
    {
        $q = $this->_db->prepare('SELECT email FROM User WHERE email = :email');
        $q->execute([':email' => $email]);
        
        return (bool) $q->fetchColumn();
    }
    
    /**
     * SignIn
     *
     * @param  mixed $email
     * @param  mixed $pass
     * @return void
     * 
     * Signing in
     */
    public function signIn($email, $pass)
    {   
        $q = $this->_db->prepare('SELECT email, pass FROM User WHERE email = ? AND pass = ?');
        $q->execute(array($email, $pass));
        
        return (bool) $q->fetchColumn();
    }
    
    /**
     * Admin
     *
     * @param  mixed $email
     * @return void
     * 
     * Verify if its an admin
     */
    public function admin($email) 
    {

        $q = $this->_db->prepare('SELECT isAdmin FROM User WHERE email = ? AND isAdmin = ?');
        $q->execute(array($email, 1));

        return (bool) $q->fetchColumn();
    }

    
    /**
     * Get
     *
     * @param  mixed $email
     * @return void
     * 
     * get info of a user
     */
    public function get($email) 
    {
        $query = 'SELECT * FROM User WHERE email = :email';
        $q = $this->_db->prepare($query);
        $q->execute([':email' => $email]);

        $user = $q->fetch(PDO::FETCH_ASSOC); 
        $u = new User($user);
        
        return new User($user);
    }

    /**
     * GetId
     *
     * @param  mixed $id
     * @return void
     * 
     * get info of a user
     */
    public function getId($id) 
    {

        $query = 'SELECT * FROM User WHERE id = :id';
        $q = $this->_db->prepare($query);
        $q->execute([':id' => $id]);

        $user = $q->fetch(PDO::FETCH_ASSOC); 
        return new User($user);
    }
    
    
    /**
     * GetList
     *
     * @return void
     * 
     * list of all users
     */
    public function getList() 
    {
        $q = $this->_db->prepare('SELECT * FROM User WHERE isAdmin = 0');
        $q->execute();

        return $q->fetchAll();
    }

    
    /**
     * DeleteUser
     *
     * @param  mixed $id
     * @return void
     * 
     * delete a user
     */
    public function deleteUser($id) 
    {
        $q = $this->_db->prepare('DELETE FROM User WHERE id = :id');
        $q->bindValue(':id', $id);
        $q->execute();
    }
}