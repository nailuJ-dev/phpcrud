<?php

class Router
{
    public function handlerequest (array $get) : void
    {
        if (isset($get['route']) && !empty($get['route']))
        {
            if ($get['route'] === 'show_user')
            {
                // UserController->show()
            } else if ($get["route"] === "create_user") {
                // UserController->create()
            } else if ($get["route"] === "check_create_user") {
                // UserController->checkCreate()
            } else if ($get["route"] === "update_user") {
                // UserController->update()
            } else if ($get["route"] === "check_update_user") {
                // UserController->checkUpdate()
            } else if ($get["route"] === "delete_user") {
                // UserController->delete()
        } else
        {
            // UserController->list()
        }
    }
}

?>