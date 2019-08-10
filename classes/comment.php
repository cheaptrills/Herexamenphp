<?php

class Comment {

    private string $comment;
    private int $id;
    private Task $task;
    private User $user;
    private int $taskid;
    private int $userid;
    private bool $edited;

/**
 * Getter for Edited
 *
 * @return [type]
 */
public function getEdited()
{
    return $this->edited;
}

/**
 * Setter for Edited
 * @var [type] edited
 *
 * @return self
 */
public function setEdited($edited)
{
    $this->edited = $edited;
    return $this;
}


    /**
     * Getter for Taskid
     *
     * @return [type]
     */
    public function getTaskid()
    {
        return $this->taskid;
    }

    /**
     * Setter for Taskid
     * @var [type] taskid
     *
     * @return self
     */
    public function setTaskid($taskid)
    {
        $this->taskid = $taskid;
        return $this;
    }


    /**
     * Getter for Userid
     *
     * @return [type]
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Setter for Userid
     * @var [type] userid
     *
     * @return self
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
        return $this;
    }


/**
 * Getter for Comment
 *
 * @return [type]
 */
public function getComment()
{
    return $this->comment;
}

/**
 * Setter for Comment
 * @var [type] comment
 *
 * @return self
 */
public function setComment($comment)
{
    $this->comment = $comment;
    return $this;
}


    /**
     * Getter for Id
     *
     * @return [type]
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter for Id
     * @var [type] id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * Getter for Task
     *
     * @return [type]
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Setter for Task
     * @var [type] task
     *
     * @return self
     */
    public function setTask($task)
    {
        $this->task = $task;
        $this->taskid = $task->getId();
        return $this;
    }


    /**
     * Getter for User
     *
     * @return [type]
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Setter for User
     * @var [type] user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;
        $this->userid = $user->getId();
        return $this;
    }


}