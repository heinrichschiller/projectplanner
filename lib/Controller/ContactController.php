<?php

namespace Controller;

use Model\Resource\ContactResource;
use Model\Resource\ProjectResource;
use Model\Resource\TaskResource;
use Session\User;

class ContactController extends Base
{
    public function indexAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();

        $contacts = $contact->getContacts();

        return $this->render('contacts_overview.phtml', array('contacts' => $contacts));
    }

    public function newAction($params)
    {
        User::checkLogin();

        return $this->render('contact.phtml');
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

        return $this->render('contact_overview.phtml', $list);
    }

    public function editAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();

        $list = [
            'contact' => $contact->getContact($params['id'])
        ];

        return $this->render('contact.phtml', $list);
    }

    public function deleteAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();
        $contact->delete($params['id']);

        header('Location: '. \App::getBaseUrl() . 'contact/index');
    }
}
