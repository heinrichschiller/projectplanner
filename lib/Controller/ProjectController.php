<?php

namespace Controller;

use Model\Resource\ProjectResource;
use Model\Resource\ContactResource;
use Model\Resource\TaskResource;
use Session\User;
use Helper\HtmlFormHelper;

class ProjectController extends Base
{
    public function indexAction()
    {
        User::checkLogin();

        $project = new ProjectResource();

        $projectList = $project->getProjects();

        return $this->render('projects_overview.phtml', array('projects' => $projectList));
    }

    public function newAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();

        $contactList = $contact->getContacts();
        $statusList = HtmlFormHelper::getInstance()->getStatusList();

        $list = [
            'contacts' => $contactList,
            'statusList'   => $statusList
        ];

        return $this->render('project.phtml', $list);
    }

    public function addAction()
    {
        User::checkLogin();

        $project = new ProjectResource();

        $project->add($_POST);

        header('Location: ' . \App::getBaseUrl() . 'project/index');
    }

    public function updateAction() {
        User::checkLogin();

        $project = new ProjectResource();

        $project->update($_POST);

        header('Location: ' . \App::getBaseUrl() . 'project/index');
    }

    public function editAction($params) {
        User::checkLogin();

        $contact = new ContactResource();
        $project = new ProjectResource();
        $task    = new TaskResource();

        $projectList = $project->getProject($params['id']);

        $id = $projectList->getContactId();
        $contactList = $contact->getContact($id);
        $taskList = $task->getContactTasks($params['id']);
        $statusList = HtmlFormHelper::getInstance()->getStatusList();

        $list = [
            'contact' => $contactList,
            'project'  => $projectList,
            'tasks'    => $taskList,
            'statusList' => $statusList
        ];

        return $this->render('project.phtml', $list);
    }

    public function viewAction($params)
    {
        User::checkLogin();

        $contact = new ContactResource();
        $project = new ProjectResource();
        $task = new TaskResource();

        $projectList = $project->getProject($params['id']);

        $id = $projectList->getContactId();
        $contactList = $contact->getContact($id);
        $taskList = $task->getProjectTasks($params['id']);

        $list = [
            'contact' => $contactList,
            'project'  => $projectList,
            'tasks'    => $taskList
        ];

        return $this->render('project_overview.phtml', $list);
    }
}
