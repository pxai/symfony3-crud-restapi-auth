<?php

namespace Pello\InventoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="Pello\InventoryBundle\EntityRepository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends Entity implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @ORM\Column(name="login",type="string", length=50)
     */
    private $login;
  
     /**
     * @ORM\Column(name="password",type="string", length=100)
     */
    private $password;

     /**
     * @ORM\Column(name="email",type="string", length=100)
     */
    private $email;

   /**
     * @ManyToMany(targetEntity="Role")
     * @JoinTable(name="user_roles",
     *      joinColumns={@JoinColumn(name="iduser", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="idrole", referencedColumnName="id", unique=true)}
     *      )
     */
    private $roles;

    public function __construct () {
        $this->since = time();
        $this->roles = array();
    }

    public function randPassword( $length = 8, $chars = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789' ) {
        return substr( str_shuffle( $chars ), 0, $length );
    }
    
    /**
    *
    */
    public function getId () {
      return $this->id;  
    }
    
    /**
    *
    */
    public function setId ($id) {
        $this->id = $id;
        return $this;
    }


    public function getLogin() {
        return $this->login;
    }
    
    public function getUsername() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
   public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->login,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }
    
     /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->login,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    
    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

       public function setEmail($email) {
        $this->email = $email;
    }

    public function setRoles ($roles) {
        $this->roles = $roles;
    }
}