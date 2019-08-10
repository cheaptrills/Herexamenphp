<?php

class Task implements JsonSerializable {
    private $title;
    private $date;
    private $work;
    private $done;
    private $comment;
    private $id;
    private $listid;


    public function jsonSerialize(){
        return(get_object_vars ($this));
    }

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
     * Getter for Date
     *
     * @return [type]
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Setter for Date
     * @var [type] date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }


    /**
     * Getter for Work
     *
     * @return [type]
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Setter for Work
     * @var [type] work
     *
     * @return self
     */
    public function setWork($work)
    {
        $this->work = $work;
        return $this;
    }


    /**
     * Getter for Done
     *
     * @return [type]
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Setter for Done
     * @var [type] done
     *
     * @return self
     */
    public function setDone($done)
    {
        $this->done = $done;
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
     * Getter for Listid
     *
     * @return [type]
     */
    public function getListid()
    {
        return $this->listid;
    }

    /**
     * Setter for Listid
     * @var [type] listid
     *
     * @return self
     */
    public function setListid($listid)
    {
        $this->listid = $listid;
        return $this;
    }

    
}