<?php

namespace Controller;

use Model\Resource\Project;
use Model\Resource\Customer;
use Model\Resource\Task;
use Session\User;

class Index extends Base
{
    public function loginAction($params)
    {
        if($this->isPost()) {
            if(User::login($_POST['email'], $_POST['password'])) {
                header('Location: ' . \App::getBaseUrl());
            }
        }
 
        echo $this->render('login.phtml');
    }

    public function logoutAction($params)
    {
        User::logout();

        $url = \App::getBaseUrl() . 'index/login';
        
        header("Location: $url");
    }

    public function mainAction($params)
    {
        User::checkLogin();

        $model = new Project();
        $customer = new Customer();
        $task = new Task();

        $projects = $model->getProjects();
        $customers = $customer->getCustomers();
        $tasks = $task->getTasks();

        $list = [
            'projects' => $projects,
            'customers' => $customers,
            'tasks' => $tasks
        ];

        echo $this->render('mainpage.phtml',$list);
    }
}
