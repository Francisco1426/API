<?php

namespace App\Exceptions;

use Exception;
use App\Http\Traits\ApiResponser;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
       if($exception instanceof ValidationException){
            return $this->convertValidationExceptionToResponse($exception, $request);

        }
        if($exception instanceof ModelNotFoundException){

            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("No existe ningun registro en ($modelo) con el id especificado",404);
        }
        if($exception instanceof NotFoundHttpException){
            return $this->errorResponse("No se ejecuto la URL especificada",404);
        }
        if($exception instanceof MethodNotAllowedHttpException){
            return $this->errorResponse("El metodo especificado no es valido",405);
        }
        if($exception instanceof HttpException){
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }
        return parent::render($request, $exception);
    
    }
}
