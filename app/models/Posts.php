<?php

class Posts extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_posts", type="integer", length=11, nullable=false)
     */
    public $id_posts;

    /**
     *
     * @var integer
     * @Column(column="id_users", type="integer", length=11, nullable=true)
     */
    public $id_users;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=200, nullable=true)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(column="description", type="string", nullable=true)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(column="file", type="string", nullable=true)
     */
    public $file;

    /**
     *
     * @var string
     * @Column(column="kategori", type="string", nullable=true)
     */
    public $kategori;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon-blog");
        $this->setSource("posts");
        $this->belongsTo('id_users', '\Users', 'id_users', ['alias' => 'Users']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'posts';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Posts[]|Posts|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Posts|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
