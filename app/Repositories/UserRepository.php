<?php
namespace App\Repositories;
use DB;
use App\Model\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public  function createUser($data)
    {
        return $this->create($data);
    }

    public function getUserAll()
    {
        return $this->getUserTotall();
    }

    public function  getUserDetails($id)
    {
        return $this->getUser($id);
    }

    public function userUpdate($data, $id)
    {
        return $this->update($data, $id);
    }

    public function userDelete($id)
    {
        return $this->delete($id);
    }
}
