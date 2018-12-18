<?php

namespace Controller;

use Model\Resource\Contact as ContactResource;
use Model\Resource\Project as ProjectResource;
use Model\Resource\Task as TaskResource;
use Session\User;

class Contact extends Base
{
    public function indexAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();

        $contacts = $contact->getContacts();

        echo $this->render('contacts_overview.phtml', array('contacts' => $contacts));
    }

    public function newAction($params)
    {
        User::checkLogin();

        echo $this->render('contact.phtml');
    }

    public function addAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();

        $contact->add($_POST);

        header('Location: '. \App::getBaseUrl() . 'contact/index');
    }

    public function viewAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();
        $project = new ProjectResource();
        $task = new TaskResource();

        $contacts = $contact->getContact($params['id']);
        $projects = $project->getContactProjects($params['id']);
        $tasks = $task->getContactTasks($params['id']);

        $list = [
            'contact' => $contacts,
            'projects' => $projects,
            'tasks'    => $tasks
        ];

        echo $this->render('contact_overview.phtml', $list);
    }
}
