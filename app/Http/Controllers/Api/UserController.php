<?php

namespace App\Http\Controllers\Api;

use App\Service\UserService;
use Illuminate\Http\Request;


class UserController extends ApiController
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        $getUser = $this->userService->getUser();

        if(!$getUser){
            return $this->respondNotFound(
                config('error.user_not_found.code'),
                config('error.user_not_found.message')
            );
        }
        return $this->respond($getUser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $user = $this->userService->createUser($data);

        if (empty($user['user_name'] && $user['password'])){
            return $this->respondNotFound(
                config('error.user_not_found.code'),
                config('error.user_not_found.message')
            );
        }
        return $this->respondCreated($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserDetails($id)
    {
        $getUserDetails = $this->userService->getUserDetails($id);

        if(!$getUserDetails){
            return $this->respondNotFound(
                config('error.user_not_found.code'),
                config('error.user_not_found.message')
            );
        }
        return $this->respond($getUserDetails);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request, $id)
    {
        $dataUser = $request->all();

        $userUpdate = $this->userService->userUpdate($dataUser, $id);

        if(!$userUpdate){
            return $this->respondNotFound(
                config('error.user_not_found.code'),
                config('error.user_not_found.message')
            );
        }
        return $this->respondUpdate($userUpdate);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser($id)
    {
        $userDelete = $this->userService->userDelete($id);

        if ($userDelete != 1){
            return $this->respondNotFound(
                config('error.user_not_found.code'),
                config('error.user_not_found.message')
            );
        }
        return $this->respondDelete();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
