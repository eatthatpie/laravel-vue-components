<?php 

namespace App\Traits;

trait RespondTrait
{
    /**
     * Status code.
     * 
     * @var mixed
     */
    protected $status;

    /**
     * @param mixed
     * 
     * @return Wut\RespondTrait
     */
    public function setStatus($status) 
    {
        $this->status = $status;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus() 
    {
        return $this->status;
    }

    public function respondNotFound($message = 'Not Found')
    {
        return $this->respondWithError($message);
    }

    public function respondUnprocessableEntity($message = 'Unprocessable entity')
    {
        return $this->respondWithError($message);
    }

    public function respondWithError($message) 
    {
        return $this->respond([
            'error' => $message
        ]);
    }

    public function respondSuccessfullyCreated($message = 'Created')
    {
        return $this->respond([
            'message' => $message
        ]);
    }

    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatus(), $headers);
    }
}