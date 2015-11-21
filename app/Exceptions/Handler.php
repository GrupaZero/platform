<?php namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\App;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Gzero\Validator\ValidationException;
use Gzero\Api\AccessForbiddenException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

    const VALIDATION_ERROR = 400;   // (Bad Request)
    const SERVER_ERROR = 500;       // (Internal Server Error)
    const FORBIDDEN_ERROR = 403;    // (Forbidden Error)

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException'
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     *
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $e
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($request->ajax()) {
            /** @var $CORS \Asm89\Stack\CorsService */
            $CORS = app()->make('Asm89\Stack\CorsService');
            if ($e instanceof ValidationException) {
                return $CORS->addActualRequestHeaders(
                    response()->json(
                        [
                            'code'  => self::VALIDATION_ERROR,
                            'error' => $e->getErrors()
                        ],
                        self::VALIDATION_ERROR
                    ),
                    $request
                );
            } elseif ($e instanceof AccessForbiddenException) {
                return $CORS->addActualRequestHeaders(
                    response()->json(
                        [
                            'code'  => self::FORBIDDEN_ERROR,
                            'error' => ($e->getMessage()) ? $e->getMessage() : 'Forbidden.'
                        ],
                        self::FORBIDDEN_ERROR
                    ),
                    $request
                );
            } else {
                if (App::environment() == 'production') {
                    return $CORS->addActualRequestHeaders(
                        response()->json(
                            [
                                'code'  => self::SERVER_ERROR,
                                'error' => [
                                    'message' => ($e->getMessage()) ? $e->getMessage() : 'Internal Server Error',
                                ]
                            ],
                            self::SERVER_ERROR
                        ),
                        $request
                    );
                } else {
                    return $CORS->addActualRequestHeaders(
                        response()->json(
                            [
                                'code'  => self::SERVER_ERROR,
                                'error' => [
                                    'type'    => get_class($e),
                                    'message' => ($e->getMessage()) ? $e->getMessage() : 'Internal Server Error',
                                    'file'    => $e->getFile(),
                                    'line'    => $e->getLine(),
                                ]
                            ],
                            self::SERVER_ERROR
                        ),
                        $request
                    );
                }
            }
        } else {
            if (config('app.debug')) {
                $whoops = new Run;
                $whoops->pushHandler(new PrettyPageHandler);
                return response(
                    $whoops->handleException($e),
                    method_exists($e, 'getStatusCode') ? $e->getStatusCode() : self::SERVER_ERROR,
                    method_exists($e, 'getHeaders') ? $e->getHeaders() : []
                );
            } else {
                return parent::render($request, $e);
            }
        }
    }
}
