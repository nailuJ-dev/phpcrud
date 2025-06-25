<?php

class Router
{
    public function handlerequest (array $get) : void
    {
        $controller = new UserController();
        
        if (isset($get['route']) && !empty($get['route']))
        {
            if ($get['route'] === 'show_user')
            {
                $controller->show();
            } else if ($get["route"] === "create_user") {
                $controller->create();
            } else if ($get["route"] === "check_create_user") {
                $controller->checkCreate();
            } else if ($get["route"] === "update_user") {
                $controller->update();
            } else if ($get["route"] === "check_update_user") {
                $controller->checkUpdate();
            } else if ($get["route"] === "delete_user") {
                $controller->delete();
            } else
            {
                $controller->list();
            }
        } else
        {
            $controller->list();
        }
    }
}

?>