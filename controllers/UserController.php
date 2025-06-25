<?php

class UserController
{
    public function list(): void
    {
        $template = 'templates/users/list.phtml';
        require 'templates/layout.phtml';
    }
    
    public function show(): void
    {
        $template = 'templates/users/show.phtml';
        require 'templates/layout.phtml';
    }
    
    public function create(): void
    {
        $template = 'templates/users/create.phtml';
        require 'templates/layout.phtml';
    }
    
    public function update(): void
    {
        $template = 'templates/users/update.phtml';
        require 'templates/layout.phtml';
    }
    
    public function checkCreate(): void
    {
        if (!empty($_POST))
        {
            $email = htmlspecialChars($_POST['email']);
            $firstName = htmlspecialChars($_POST['first_name']);
            $lastName = htmlspecialChars($_POST['last_name']);
            
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
        // To be determined later, waiting for the specific logic
        // Our own logic or a determined logic gives in the next steps
        // Display a message after checking datas next to creating with id perhaps 
    }
    
    public function delete(): void
    {
        // To be determined later, waiting for the specific logic
        // Our own logic or a determined logic gives in the next steps
        // Display a message after deleting datas with id perhaps
        // Why this fuc***' function name is blue and not the others... to be searched for explain
    }
}

?>