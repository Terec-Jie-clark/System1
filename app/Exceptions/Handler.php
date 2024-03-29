<?php

namespace App\Exceptions;

// new added namespace
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
  
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

   
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $errors = $exception->validator->errors()->all();
            if (in_array('The position name has already been taken.', $errors)) {
                return $this->errorResponse('Data already exists', Response::HTTP_BAD_REQUEST);
            }
        }

        //  http not found  ✅ (USING GET)
        if ($exception instanceof HttpException){
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];

            return $this->errorResponse($message, $code);
        }
        // instance not found ✅ (USING DELETE)
        if ($exception instanceof ModelNotFoundException){
            $model = strtolower(class_basename($exception->getModel()));

            return $this->errorResponse("Does not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND);

        }
        

        // validation exception ✅ (USING PUT)

        if ($exception instanceof ValidationException){
            $errors = $exception->validator->errors()->getMessages();

            return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        // access to forbidden
        if ($exception instanceof AuthorizationException){
            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
        }

        // unauthorized access
        if ($exception instanceof AuthorizationException){
            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }

    

        if (env('APP_DEBUG', false)){        
            return parent::render($request, $exception);
        }

        return $this->errorResponse('Unexpected error. Try later', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
