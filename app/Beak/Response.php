<?php
/**
* @author Dhemy
* @date 1/11/2017
* @contact m.dhemy@outlook.com
* 
* Implements HTTP status reponses with status codes
**/
namespace App\Beak;
Class Response{

	public function respond($response , $code =200, $headers= []){
		$response = collect(['data'	=> $response]);
		$response->put('status_code', $code);
		return response()->json($response, $code, $headers, JSON_PRETTY_PRINT);
	}	

	/**
	| -----------------------------------------------
	| Successful HTTP requests
	| -----------------------------------------------
	| 
	| Standard response for successful HTTP requests
	**/
	public function ok($data){
		return $this->respond($data, 200);
	}

	/**
	|-------------------------------------------------
	| Creation of a new resource
	|--------------------------------------------------
	|
	| The request has been fulfilled, resulting in the creation of a new resource
	**/

	public function created($data){
		return $this->respond($data, 201);
	}

	/**
	| ---------------------------------------------------
	| Client Errors
	| ---------------------------------------------------
	| The server cannot or will not process the request 
	| due to an apparent client error (Validation errors for example)
	**/
	
	public function badRequest($data){
		return $this->respond($data, 400);
	}

	/**
	| ---------------------------------------------------
	| Unauthorized user
	| ---------------------------------------------------
	| The user does not have the necessary credentials.
	| Can be used when the token is expired or not presented.
	**/

	public function unauthorized($data){
		return $this->respond($data, 401);
	}

	/**
	| ---------------------------------------------------
	| Forbidden "Do not have enough permissions"
	| ---------------------------------------------------
	|
	| The user might be logged in but does not have the necessary permissions for the resource.
	**/

	public function forbidden($data){
		return $this->respond($data, 403);
	}

	/**
	 * ------------------------------------------------
	 * Page not found
	 * -----------------------------------------------
	 *
	 * Page not found error 404!
	 */
	public function notFound(){
		return $this->respond('404 Not found!',404);
	}
}