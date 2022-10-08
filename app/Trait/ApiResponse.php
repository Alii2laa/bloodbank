<?php


namespace App\Trait;


trait ApiResponse
{
    public function apiResponseJson($data = null,$message = 'done',$status = 200){
        $response = [
            'data' => $data,
            'message' => $message,
            'status' => $status,
        ];
        return response($response);
    }
}
