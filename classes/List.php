<?php

class list {

    private $title;
    private $id;
    private $todos;

/**
 * Getter for Title
 *
 * @return [type]
 */
public function getTitle()
{
    return $this->title;
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
