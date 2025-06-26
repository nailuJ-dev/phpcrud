<?php

class UserController
{
    public function list(): void
    {
        $userManager = new userManager();
        $users = $userManager->findAll();
        
        $template = 'templates/users/list.phtml';
        require 'templates/layout.phtml';
    }
    
    public function show(): void
    {
        if (isset($_GET['id'])) {
            $userId = (int)$_GET['id'];
            $userManager = new userManager();
            $user = $userManager->findOne($userId);
            
            if ($user)
            {
                $template = 'templates/users/show.phtml';
                require 'templates/layout.phtml'; 
            } else
            {
                header('Location: index.php');
                exit();
            }
        } else
        {
            header('Location: index.php');
            exit();
        }
    }
    
    public function create(): void
    {
        $template = "templates/users/create.phtml";
        require "templates/layout.phtml";
    }
    
    public function update(): void
    {
        if (isset($_GET['id'])) {
            $userId = (int)$_GET['id'];
            $userManager = new userManager();
            $user = $userManager->findOne($userId);
            
            if ($user)
            {
                $template = 'templates/users/update.phtml';
                require 'templates/layout.phtml'; 
            } else
            {
                header('Location: index.php');
                exit();
            }
        } else
        {
            header('Location: index.php');
            exit();
        }
    }
    
    public function checkCreate(): void
    {
        if (!empty($_POST))
        {
            $email = htmlspecialchars($_POST['email']);
            $firstName = htmlspecialchars($_POST['first_name']);
            $lastName = htmlspecialchars($_POST['last_name']);
            
            $newUser = new User();
            $newUser->setEmail($email);
            $newUser->setFirstName($firstName);
            $newUser->setLastName($lastName);
            
            $userManager = new UserManager();
            $userManager->create($newUser);
            
            header('Location: index.php');
            exit();
        }
    }
    
    public function checkUpdate(): void
    {
        if (!empty($_POST))
        {
            if (isset($_POST['id'], $_POST['email'], $_POST['first_name'], $_POST['last_name']))
            {
                $id = (int)$_POST['id'];
                $email = htmlspecialchars($_POST['email']);
                $firstName = htmlspecialchars($_POST['first_name']);
                $lastName = htmlspecialchars($_POST['last_name']);
                
                $userToUpdate = new User();
                $userToUpdate->setId($id);
                $userToUpdate->setEmail($email);
                $userToUpdate->setFirstName($firstName);
                $userToUpdate->setLastName($lastName);
                
                $userManager = new UserManager();
                $userManager->update($userToUpdate);
            }
        }
        header('Location: index.php');
        exit();
    }
    
    public function delete(): void
    {
        if (isset($_GET['id'])) {
            $userId = (int)$_GET['id'];
            $userManager = new userManager();
            $user = $userManager->findOne($userId);
            
            if ($user)
            {
                $userManager->delete($userId); 
            }
        }
        
        header('Location: index.php');
        exit();
    }
}

?>