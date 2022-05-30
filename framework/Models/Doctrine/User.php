<?php

namespace Otus\Mvc\Models\Doctrine;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
/**
 * @Entity
 * @Table(name="users")
 **/
class User
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $name;

    /** @Column(type="string") **/
    protected $password;

    /** @Column(type="string") **/
    protected $bio;


    public function __construct(string $name, string $password, string $bio)
    {
        $this->name = $name;
        $this->password = $password;
        $this->bio = $bio;
    }

    # Accessors
    public function getId() : int { return $this->id; }
    public function getName() : string { return $this->name; }
    public function getPassword() : string { return $this->password; }
    public function getBio() : string { return $this->bio; }
    public function setBio($bio) : void { $this->bio = $bio; }
}
