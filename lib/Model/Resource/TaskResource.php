<?php

namespace Model\Resource;

use \Model\TaskModel;

class TaskResource extends Base
{
    public function getTasks()
    {
        $sql = '
        SELECT `tasks`.`id`,
	       `tasks`.`title`,
           `tasks`.`desc`,
           `tasks`.`begin`,
           `tasks`.`end`,
           `tasks`.`status`,
           `tasks`.`contact_id`,
           `tasks`.`project_id`,
           `tasks`.`created_at`,
           `tasks`.`updated_at`,
           `projects`.`title` as ptitle
           FROM `tasks`
           LEFT JOIN `projects` ON `projects`.`id` = `tasks`.`project_id`;
        ';

        $dbResult = $this->connect()->query($sql);

        $taskList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $task = new TaskModel;

            $task->setId($row['id']);
            $task->setTitle($row['title']);
            $task->setDesc($row['desc']);
            $task->setBegin($row['begin']);
            $task->setEnd($row['end']);
            $task->setStatus($row['status']);
            $task->setContactId($row['contact_id']);
            $task->setProjectId($row['project_id']);
            $task->setCreatedAt($row['created_at']);
            $task->setUpdatedAt($row['updated_at']);
            $task->setProjectTitle($row['ptitle']);

            $taskList[] = $task;
        }

        return $taskList;
    }

    public function getContactTasks(int $id)
    {
        $sql = "
        SELECT `id`,
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `contact_id`,
            `project_id`,
            `created_at`,
            `updated_at`
            FROM `tasks`
            WHERE `project_id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $taskList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $task = new TaskModel;

            $task->setId($row['id']);
            $task->setTitle($row['title']);
            $task->setDesc($row['desc']);
            $task->setBegin($row['begin']);
            $task->setEnd($row['end']);
            $task->setStatus($row['status']);
            $task->setContactId($row['contact_id']);
            $task->setProjectId($row['project_id']);
            $task->setCreatedAt($row['created_at']);
            $task->setUpdatedAt($row['updated_at']);

            $taskList[] = $task;
        }

        return $taskList;
    }

    public function add(array $values)
    {
        $sql = "
        INSERT INTO `tasks`(
            `title`,
            `desc`,
            `begin`,
            `end`,
            `status`,
            `contact_id`,
            `project_id`)
            VALUES (
                :title,
                :desc,
                :begin,
                :end,
                :status,
                :contact_id,
                :project_id)
        ";

        $con = $this->connect();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(':title', $values['title']);
        $stmt->bindParam(':desc', $values['desc']);
        $stmt->bindParam(':begin', $values['begin']);
        $stmt->bindParam(':end', $values['end']);
        $stmt->bindParam(':status', $values['status']);
        $stmt->bindParam(':contact_id', $values['contactId']);
        $stmt->bindParam(':project_id', $values['projectId']);

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "
        DELETE FROM `tasks`
            WHERE `id` = :id
        ";

        $con = $this->connect();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}