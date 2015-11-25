<?php
/**
 * File name: InMemoryUserRepository.php
 * Project: project-final_deliverable-1
 * PHP version 5
 * @category  PHP
 * @package   Notes\Persistence\Entity
 * @author    donbstringham <donbstringham@gmail.com>
 * @copyright 2015 © donbstringham
 * @license   http://opensource.org/licenses/MIT MIT
 * @version   GIT: <git_id>
 * @link      http://donbstringham.us
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Notes\Persistence\Entity;

use Faker\Provider\Uuid;
use InvalidArgumentException;
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserRepositoryInterface;
use Notes\Domain\ValueObject\StringLiteral;

/**
 * Class InMemoryUserRepository
 * @category  PHP
 * @package   Notes\Persistence\Entity
 * @author    donbstringham <donbstringham@gmail.com>
 * @link      http://donbstringham.us
 */
class InMemoryUserRepository implements UserRepositoryInterface
{
    /** @var array */
    protected $users;

    /**
     * InMemoryUserRepository constructor
     */
    public function __construct()
    {
        $this->users = [];
    }

    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function add(User $user)
    {
        if (!$user instanceof User) {
            throw new InvalidArgumentException(
                __METHOD__ . '(): $user has to be a User object'
            );
        }

        $this->users[] = $user;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->users);
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getByUsername($username)
    {
        $results = [];

        foreach($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $user*/
            if ($user->getUsername()->__toString() === $username) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        // TODO: Implement getUsers() method
        return $this->users;
    }

    /**
     * @param \Notes\Domain\ValueObject\StringLiteral $search
     * @param \Notes\Domain\Entity\User $newUser
     * @return bool
     */
    public function modifyByUsername(StringLiteral $search, User $newUser)
    {
        // TODO: Implement modify() method
        // not needed

        // search for user object in array
        // if found delete it

        /*$oldUser = &$this->searchByUsername($search);
        $oldUser = $newUser;*/

        //if(!$this->remove($oldUser))
    }

    public function getById(Uuid $id)
    {
        $results = [];

        foreach($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $user*/
            if ($user->getId()->__toString() === $id -> __toString()) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    public function removeById(Uuid $id)
    {

        foreach($this->users as $i => $user) {
            /** @var \Notes\Domain\Entity\User $user*/
            if ($user->getId()->__toString() === $id -> __toString()) {
                unset($this->users[$i]);
                return true;
            }
        }

        return false;
    }


    /**
     * @param
     * @return bool
     */
    public function modifyById($id)
    {
        // TODO: Implement modifyById() method.
    }
}
