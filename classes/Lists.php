<?php

class Lists implements JsonSerializable {

    private $title;
    private $id;
    private $todos;
    private $userid;

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



    public function jsonSerialize(){
        return(get_object_vars ($this));
    }

/**
 * Getter for Todos
 *
 * @return [type]
 */
public function getTodos()
{
    return $this->todos;
}

/**
 * Setter for Todos
 * @var [type] todos
 *
 * @return self
 */
public function setTodos($todos)
{
    $this->todos = $todos;
    return $this;
}


/**
 * Getter for Title
 *
 * @return [type]
 */
public function getTitle()
{
    return htmlspecialchars($this->title);
}

/**
 * Setter for Title
 * @var [type] title
 *
 * @return self
 */
public function setTitle($title)
{
    $this->title = $title;
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



}
