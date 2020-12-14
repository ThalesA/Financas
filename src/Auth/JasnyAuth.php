<?php


namespace SONFin\Auth;


use Jasny\Auth\Sessions;
use Jasny\Auth\User;
use SONFin\Repository\RepositoryInterface;
use Jasny\Auth as Auth;

class JasnyAuth extends Auth
{
    use Sessions;

    private $repository;

    /**
     * JasnyAuth constructor.
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function fetchUserById($id)
    {
        return $this->repository->find($id, false);
    }

    public function fetchUserByUsername($username)
    {
        return $this->repository->findByField('email', $username)[0];
    }
}
