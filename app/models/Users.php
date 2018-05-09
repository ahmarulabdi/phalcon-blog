<?php

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_users", type="integer", length=11, nullable=false)
     */
    protected $id_users;

    /**
     *
     * @var string
     * @Column(column="nama", type="string", length=200, nullable=true)
     */
    protected $nama;

    /**
     *
     * @var string
     * @Column(column="username", type="string", length=200, nullable=true)
     */
    protected $username;

    /**
     *
     * @var string
     * @Column(column="password", type="string", nullable=true)
     */
    protected $password;

    /**
     *
     * @var string
     * @Column(column="hak_akses", type="string", nullable=true)
     */
    protected $hak_akses;

    /**
     * Method to set the value of field id_users
     *
     * @param integer $id_users
     * @return $this
     */
    public function setIdUsers($id_users)
    {
        $this->id_users = $id_users;

        return $this;
    }

    /**
     * Method to set the value of field nama
     *
     * @param string $nama
     * @return $this
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field hak_akses
     *
     * @param string $hak_akses
     * @return $this
     */
    public function setHakAkses($hak_akses)
    {
        $this->hak_akses = $hak_akses;

        return $this;
    }

    /**
     * Returns the value of field id_users
     *
     * @return integer
     */
    public function getIdUsers()
    {
        return $this->id_users;
    }

    /**
     * Returns the value of field nama
     *
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field hak_akses
     *
     * @return string
     */
    public function getHakAkses()
    {
        return $this->hak_akses;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon-blog");
        $this->setSource("users");
        $this->hasMany('id_users', 'Posts', 'id_users', ['alias' => 'Posts']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

}
