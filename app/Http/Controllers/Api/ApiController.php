<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

abstract class ApiController extends Controller
{
    protected $statusCode = Response::HTTP_OK;

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    protected function respondError($code, $message)
    {
        return $this->respond([
            'code' => $code,
            'message' => $message,
        ], [], false);
    }

    protected function respond($data, $headers = [], $status = true)
    {
        return response()->json([
            'status' => $status,
            'result' => $data
        ], $this->getStatusCode(), $headers);
    }

    protected function respondUpdate($userUpdate)
    {
        return $this->setStatusCode(200)->respond([$userUpdate => 'Update_User_Success']);
    }

    protected function respondDelete()
    {
        return $this->setStatusCode(204)->respond(null);
    }

    protected function respondCreated($user)
    {
        return $this->setStatusCode(201)->respond($user);
    }

    protected function respondNotFound($code, $message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondError($code, $message);
    }
}
