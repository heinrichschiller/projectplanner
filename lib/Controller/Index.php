<?php

namespace Controller;

use Model\Resource\Project;
use Model\Resource\Contact;
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
        $contact = new Contact();
        $task = new Task();

        $projects = $model->getProjects();
        $contacts = $contact->getContacts();
        $tasks = $task->getTasks();

        $list = [
            'projects' => $projects,
            'contacts' => $contacts,
            'tasks' => $tasks
        ];

        echo $this->render('mainpage.phtml',$list);
    }
}
