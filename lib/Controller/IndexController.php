<?php

namespace Controller;

use Model\Resource\ProjectResource;
use Model\Resource\ContactResource;
use Model\Resource\TaskResource;
use Session\User;

class IndexController extends Base
{
    public function loginAction($params)
    {
        if($this->isPost()) {
            if(User::login($_POST['email'], $_POST['password'])) {
                header('Location: ' . \App::getBaseUrl());
            }
        }

        return $this->render('login.phtml');
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

        $model = new ProjectResource();
        $contact = new ContactResource();
        $task = new TaskResource();

        $projects = $model->getProjects();
        $contacts = $contact->getContacts();
        $tasks = $task->getTasks();

        $list = [
            'projects' => $projects,
            'contacts' => $contacts,
            'tasks' => $tasks
        ];

        return $this->render('mainpage.phtml',$list);
    }
}
