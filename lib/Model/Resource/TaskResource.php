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
            UNIX_TIMESTAMP(`tasks`.`begin`) as begin,
            UNIX_TIMESTAMP(`tasks`.`end`) as end,
            `priority`.`desc` as priority,
            `status`.`desc` as status,
            `tasks`.`contact_id`,
            `tasks`.`project_id`,
            UNIX_TIMESTAMP(`tasks`.`created_at`) as created_at,
            `tasks`.`updated_at`,
            `projects`.`title` as ptitle
            FROM `tasks`
            LEFT JOIN `priority` ON `priority`.`id` = `tasks`.`priority`
            LEFT JOIN `status` ON `status`.`id` = `tasks`.`status`
            LEFT JOIN `projects` ON `projects`.`id` = `tasks`.`project_id`
                WHERE `tasks`.`status` != 4 AND `tasks`.`status` != 5
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
            $task->setPriority($row['priority']);
            $task->setContactId($row['contact_id']);
            $task->setProjectId($row['project_id']);
            $task->setCreatedAt($row['created_at']);
            $task->setUpdatedAt($row['updated_at']);
            $task->setProjectTitle($row['ptitle']);

            $taskList[] = $task;
        }

        return $taskList;
    }

    public function getTask(int $id)
    {
        $sql = "
        SELECT `tasks`.`id`,
	       `tasks`.`title`,
           `tasks`.`desc`,
           UNIX_TIMESTAMP(`tasks`.`begin`) as begin,
           UNIX_TIMESTAMP(`tasks`.`end`) as end,
           `status`.`id` as status_id,
           `status`.`desc` as status,
           `tasks`.`contact_id`,
           `tasks`.`project_id`,
           UNIX_TIMESTAMP(`tasks`.`created_at`) as created_at,
           `tasks`.`updated_at`,
           `projects`.`title` as ptitle
           FROM `tasks`
           LEFT JOIN `projects` ON `projects`.`id` = `tasks`.`project_id`
           LEFT JOIN `status` ON `status`.`id` = `tasks`.`status`
           WHERE `tasks`.`id` = $id;
        ";

        $dbResult = $this->connect()->query($sql);

        $row = $dbResult->fetch(\PDO::FETCH_ASSOC);
        $task = new TaskModel;

        $task->setId($row['id']);
        $task->setTitle($row['title']);
        $task->setDesc($row['desc']);
        $task->setBegin($row['begin']);
        $task->setEnd($row['end']);
        $task->setStatusId($row['status_id']);
        $task->setStatus($row['status']);
        $task->setContactId($row['contact_id']);
        $task->setProjectId($row['project_id']);
        $task->setCreatedAt($row['created_at']);
        $task->setUpdatedAt($row['updated_at']);
        $task->setProjectTitle($row['ptitle']);

        return $task;
    }

    public function getContactTasks(int $id)
    {
        $sql = "
        SELECT `tasks`.`id`,
        	`tasks`.`title`,
            `tasks`.`desc`,
            UNIX_TIMESTAMP(`tasks`.`begin`) as begin,
            UNIX_TIMESTAMP(`tasks`.`end`) as end,
            `status`.`desc` as status,
            `tasks`.`contact_id`,
            `tasks`.`project_id`,
            UNIX_TIMESTAMP(`tasks`.`created_at`) as created_at,
            `tasks`.`updated_at`,
            `projects`.`title` as ptitle
            FROM `tasks`
            LEFT JOIN `status` ON `status`.`id` = `tasks`.`status`
            LEFT JOIN `projects` ON `projects`.`id` = `tasks`.`project_id`
            WHERE `tasks`.`contact_id` = $id;
        ";

        $dbResult = $this->connect()->query($sql);

        $taskList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_OBJ)) {
            $task = new TaskModel;

            $task->setId($row->id);
            $task->setTitle($row->title);
            $task->setDesc($row->desc);
            $task->setBegin($row->begin);
            $task->setEnd($row->end);
            $task->setStatus($row->status);
            $task->setContactId($row->contact_id);
            $task->setProjectId($row->project_id);
            $task->setCreatedAt($row->created_at);
            $task->setUpdatedAt($row->updated_at);
            $task->setProjectTitle($row->ptitle);

            $taskList[] = $task;
        }

        return $taskList;
    }

    public function getProjectTasks(int $id)
    {
        $sql = "
        SELECT `tasks`.`id`,
        	`tasks`.`title`,
            `tasks`.`desc`,
            UNIX_TIMESTAMP(`tasks`.`begin`) as begin,
            UNIX_TIMESTAMP(`tasks`.`end`) as end,
            `priority`.`desc` as priority,
            `status`.`desc` as status,
            `tasks`.`contact_id`,
            `tasks`.`project_id`,
            UNIX_TIMESTAMP(`tasks`.`created_at`) as created_at,
            `tasks`.`updated_at`,
            `projects`.`title` as ptitle
            FROM `tasks`
            LEFT JOIN `status` ON `status`.`id` = `tasks`.`status`
            LEFT JOIN `projects` ON `projects`.`id` = `tasks`.`project_id`
            LEFT JOIN `priority` ON `priority`.`id` = `tasks`.`priority`
            WHERE `tasks`.`project_id` = $id;
        ";

        $dbResult = $this->connect()->query($sql);

        $taskList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_OBJ)) {
            $task = new TaskModel;

            $task->setId($row->id);
            $task->setTitle($row->title);
            $task->setDesc($row->desc);
            $task->setBegin($row->begin);
            $task->setEnd($row->end);
            $task->setPriority($row->priority);
            $task->setStatus($row->status);
            $task->setContactId($row->contact_id);
            $task->setProjectId($row->project_id);
            $task->setCreatedAt($row->created_at);
            $task->setUpdatedAt($row->updated_at);
            $task->setProjectTitle($row->ptitle);

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
        $stmt->bindParam(':status_id', $values['status_id']);
        $stmt->bindParam(':priority_id', $values['priority_id']);
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
