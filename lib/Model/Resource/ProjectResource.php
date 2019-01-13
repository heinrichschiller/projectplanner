<?php

namespace Model\Resource;

use \Model\ProjectModel;
use \Util\Date;

class ProjectResource extends Base
{
    public function getProjects()
    {
        $sql = '
        SELECT `projects`.`id`,
        	`projects`.`title`,
        	`projects`.`desc`,
        	UNIX_TIMESTAMP(`projects`.`begin`) as begin,
        	UNIX_TIMESTAMP(`projects`.`end`) as end,
        	`status`.`desc` as status,
        	`projects`.`contact_id`,
        	UNIX_TIMESTAMP(`projects`.`created_at`) as created_at
        	FROM `projects`
            LEFT JOIN `status` ON `status`.`id` = `projects`.`status`
            LEFT JOIN `contact` ON `contact`.`id` = `projects`.`contact_id`
        ';

        $dbResult = $this->connect()->query($sql);

        $projects = [];

        while($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $project = new ProjectModel();

            $project->setId($row['id']);
            $project->setTitle($row['title']);
            $project->setDesc($row['desc']);
            $project->setBegin(Date::getInstance()->formatDateTime($row['begin']));
            $project->setEnd(Date::getInstance()->formatDateTime($row['end']));
            $project->setStatus($row['status']);
            $project->setContactId($row['contact_id']);
            $project->setCreatedAt(Date::getInstance()->formatDateTime($row['created_at']));

            $projects[] = $project;
        }

        return $projects;
    }

    public function getProject(int $id)
    {
        $sql = "
        SELECT `projects`.`id`,
        	`projects`.`title`,
        	`projects`.`desc`,
            `projects`.`begin`,
        	`projects`.`end`,
        	`status`.`desc` as status,
        	`projects`.`contact_id`,
        	`projects`.`created_at`
        	FROM `projects`
            LEFT JOIN `status` ON `status`.`id` = `projects`.`status`
        	WHERE `projects`.`id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $row = $dbResult->fetch(\PDO::FETCH_ASSOC);

        $project = new ProjectModel();

        $project->setId($row['id']);
        $project->setTitle($row['title']);
        $project->setDesc($row['desc']);
        $project->setBegin($row['begin']);
        $project->setEnd($row['end']);
        $project->setStatus($row['status']);
        $project->setContactId($row['contact_id']);
        $project->setCreatedAt($row['created_at']);

        return $project;
    }

    public function getContactProjects(int $id)
    {
        $sql = "
        SELECT `projects`.`id`,
        	`projects`.`title`,
        	`projects`.`desc`,
            `projects`.`begin`,
        	`projects`.`end`,
        	`status`.`desc` as status,
        	`projects`.`contact_id`,
        	`projects`.`created_at`
        	FROM `projects`
            LEFT JOIN `status` ON `status`.`id` = `projects`.`status`
            WHERE `projects`.`contact_id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $projects = [];

        while($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $project = new ProjectModel();

            $project->setId($row['id']);
            $project->setTitle($row['title']);
            $project->setDesc($row['desc']);
            $project->setBegin($row['begin']);
            $project->setEnd($row['end']);
            $project->setStatus($row['status']);
            $project->setContactId($row['contact_id']);
            $project->setCreatedAt($row['created_at']);

            $projects[] = $project;
        }

        return $projects;
    }

    public function add($values)
    {
        $sql = "
        INSERT INTO `projects`(
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `contact_id`)
            VALUES (
                :title,
                :desc,
                :begin,
                :end,
                :status,
                :contact_id)
        ";

        $con = $this->connect();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(':title', $values['title']);
        $stmt->bindParam(':desc', $values['desc']);
        $stmt->bindParam(':begin', $values['begin']);
        $stmt->bindParam(':end', $values['end']);
        $stmt->bindParam(':status', $values['status']);
        $stmt->bindParam(':contact_id', $values['contactId']);

        $stmt->execute();
    }
}
