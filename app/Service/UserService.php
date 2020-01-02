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
        if (!empty($data)){
            $user = $this->userRepo->createUser($data);
            if (!empty($user)){
                return [
                    'error' => 0,
                    'message' => $user,
                ];
            }else{
                return [
                    'error' => 2,
                    'message' => 'User_not_exit',
                ];
            }
        }else{
            return [
                'error' => 1,
                'message' => 'User_not_exit',
            ];
        }
    }

    public function getUser()
    {
        return $this->userRepo->getUserAll();
    }

    public function getUserDetails($id)
    {
        $userDetails = $this->userRepo->getUserDetails($id);
        if (!empty($userDetails)){
            return $userDetails;
        }else{
            return [
                'error' => 2,
                'message' => 'User_not_exit',
            ];
        }
    }

    public function userUpdate($data, $id)
    {
        $userUpdate = $this->userRepo->userUpdate($data, $id);

        if ($userUpdate == 1){
            return [
                'error' => '0',
                'message' => 'Delete User success',
            ];
        }else{
            return [
                'error' => '1',
                'message' => 'Delete User fails',
            ];
        }
    }

    public  function userDelete($id)
    {
        $userDelete = $this->userRepo->userDelete($id);

        if ($userDelete == 1){
            return [
                'error' => '0',
                'message' => 'Delete User success',
            ];
        }else{
            return [
                'error' => '1',
                'message' => 'Delete User fails',
            ];
        }

    }
}
