<?php
namespace src;
// src/Users.php
/**
 * @Entity @Table(name="users")
 **/

class Users
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;

     /** @Column(type="string") **/
    protected $email;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
