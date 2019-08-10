<?php

class Comment {

    private string $comment;
    private int $id;
    private Task $task;
    private User $user;

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
        return $this;
    }


}