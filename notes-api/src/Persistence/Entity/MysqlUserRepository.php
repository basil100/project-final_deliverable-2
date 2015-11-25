<?php
/**
 * Created by PhpStorm.
 * User: basil
 * Date: 11/24/15
 * Time: 6:05 PM
 */

namespace Notes\Persistence\Entity;

use Notes\Db\Adapter\PdoAdapter;
use Faker\Provider\Uuid;
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserRepositoryInterface;

class MysqlUserRepository implements UserRepositoryInterface
{
    /** @var  \Notes\Db\Adapter\PdoAdapter */
    //protected $adapter;

    /** @var  string */
    protected $dsn;
    /** @var  string */
    protected $username;

    /** @var  string */
    protected $password;

    /** @var  string */
    protected $link;

    public function __construct($dsn, $username, $password/*PdoAdapter $adapter*/) {
        /*$this->adapter = $adapter;*/
        $this->dsn = $dsn;
        $this->password = $password;
        $this->username = $username;

        $this->link = mysqli_connect($this->dsn, $this->username, $this->password);
    }

    public function __destruct() {

        /** @var resource */
        $this->link->close();
    }

    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function add(User $user)
    {
        // TODO: Implement add() method.
        // pull properties 1 and 2 from $user and insert into user_table_1
        // pull properties 3 and 4 from $user and insert into user_table_2
    }

    /**
     * @return int
     */
    public function count()
    {
        // TODO: Implement count() method.
        $sql = 'SELECT COUNT(*) FROM USERS';

        $result = mysqli_query($this->link, $sql);

        if($result == false) {
            echo 'up crap creek without a paddle';
            return false;
        }

        $resultArray = $result->fetch_array();

        return $resultArray[0];
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return mixed
     */
    public function getById(Uuid $id)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        // TODO: Implement getUsers() method.
    }

    /**
     * @param
     * @return bool
     */
    public function modifyById($id)
    {
        // TODO: Implement modifyById() method.
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return mixed
     */
    public function removeById(Uuid $id)
    {
        // TODO: Implement removeById() method.
    }
}