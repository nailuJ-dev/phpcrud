<?php

class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function findAll(): array
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $usersData = $query->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        
        foreach ($usersData as $userData) 
        {
            $user = new User();
            $user->setId($userData['id']);
            $user->setEmail($userData['email']);
            $user->setFirstName($userData['first_name']);
            $user->setLastName($userData['last_name']);
            $users[] = $user;
        }
        return $users;
    }
    
    public function findOne(int $id): ?User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->execute([':id' => $id]);
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($userData) {
            $user = new User();
            $user->setId($userData['id']);
            $user->setEmail($userData['email']);
            $user->setFirstName($userData['first_name']);
            $user->setLastName($userData['last_name']);
            return $user;
        }
        return null;
    }
    
    public function create(User $user): void
    {
        $sql = "INSERT INTO users (email, first_name, last_name) VALUES (:email, :firstName, :lastName)";
        $query = $this->db->prepare($sql);
        $query->execute([
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName()
        ]);
    }
    
    public function update(User $user): void
    {
        $sql = "UPDATE users SET email = :email, first_name = :firstName, last_name = :lastName WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
        ]);
    }
    
    public function delete(int $id): void
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $query->execute([':id' => $id]);
    }
}

?>