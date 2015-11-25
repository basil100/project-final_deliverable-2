<?php
/**
 * File name: in-memory-user-repository.spec.php
 * Project: project-final_deliverable-1
 * PHP version 5
 * @category  PHP
 * @author    donbstringham <donbstringham@gmail.com>
 * @copyright 2015 © donbstringham
 * @license   http://opensource.org/licenses/MIT MIT
 * @version   GIT: <git_id>
 * @link      http://donbstringham.us
 * $LastChangedDate$
 * $LastChangedBy$
 */

use Notes\Domain\Entity\UserFactory;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Persistence\Entity\InMemoryUserRepository;

describe('Notes\Persistence\Entity\InMemoryUserRepository', function () {
    beforeEach(function () {
        $this->repo = new InMemoryUserRepository();
        $this->userFactory = new UserFactory();
    });
    describe('->__construct()', function () {
        it('should construct an InMemoryUserRepository object', function () {
            expect($this->repo)->to->be->instanceof(
                'Notes\Persistence\Entity\InMemoryUserRepository'
            );
        }) ;
    });
    describe('->add()', function () {
        it('should a 1 user to the repository', function () {
            $this->repo->add($this->userFactory->create());

            expect($this->repo->count())->to->equal(1);
        });
    });
    describe('->getByUsername()', function () {
        it('should return a single User object', function () {
            /** @var \Notes\Domain\Entity\User $user */
            $user = $this->userFactory->create();
            $user->setUsername(new StringLiteral('harrie'));

            $this->repo->add($user);

            expect($this->repo->count())->to->be->equal(1);

            /** @var \Notes\Domain\Entity\User $actual */
            $actual = $this->repo->getByUsername('harrie');

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
//            expect($actual->getUsername())->to->be->equal(new StringLiteral('harrie'));
        });
    });
//    public function getByUsername($username);
//    public function getUsers();
//    public function modify(User $user);
//    public function remove(User $user);
//    public function removeByUsername($username);
});
