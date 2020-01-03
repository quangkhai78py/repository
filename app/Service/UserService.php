<?php
namespace App\Service;

use App\Repositories\UserRepository;

class UserService
{
    public $userRepo;

    public  function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function createUser($data)
    {
        return $this->userRepo->createUser($data);
    }

    public function getUser()
    {
        return $this->userRepo->getUserAll();
    }

    public function getUserDetails($id)
    {
        return $this->userRepo->getUserDetails($id);
    }

    public function userUpdate($data, $id)
    {
        return $this->userRepo->userUpdate($data, $id);
    }

    public  function userDelete($id)
    {
        return $this->userRepo->userDelete($id);
    }
}
