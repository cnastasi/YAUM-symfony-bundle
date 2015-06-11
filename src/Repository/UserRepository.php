<?php
/**
 * UserRepository.php
 *
 * @author cnastasi - Christian Nastasi <christian.nastasi@dxi.eu>
 * Created on Jun 08, 2015, 17:21
 * Copyright (C) DXI Ltd
 */

namespace YAUM\Symfony\Repository;

use Doctrine\ORM\EntityRepository;
use YAUM\Contract\User;
use YAUM\Contract\UserRepository as UserRepositoryInterface;

/**
 * Class UserRepository
 * @package YAUM\Symfony\Repository
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{

    /**
     *
     * @param string $username
     * @return User
     */
    public function getUserByUsername($username)
    {
        return $this->findOneBy(['username' => $username]);
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function getById($id)
    {
        return $this->find($id);
    }

    /**
     * @param User $user
     */
    public function save(User $user)
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }
}
