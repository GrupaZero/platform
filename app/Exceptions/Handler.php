<?php namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\App;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Gzero\Validator\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

    const VALIDATION_ERROR = 400;   // (Bad Request)
    const SERVER_ERROR = 500;       // (Internal Server Error)

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
            $cors = app()->make('Asm89\Stack\CorsService');
            if ($e instanceof ValidationException) {
                return $cors->addActualRequestHeaders(
                    response()->json(
                        [
                            'code'  => self::VALIDATION_ERROR,
                            'error' => $e->getErrors()
                        ],
                        500
                    ),
                    $request
                );
            } else if (App::environment() == 'prod') {
                return $cors->addActualRequestHeaders(
                    response()->json(
                        [
                            'code'  => self::SERVER_ERROR,
                            'error' => [
                                'message' => $e->getMessage(),
                            ]
                        ],
                        500
                    ),
                    $request
                );
            } else {
                return $cors->addActualRequestHeaders(
                    response()->json(
                        [
                            'code'  => self::SERVER_ERROR,
                            'error' => [
                                'type'    => get_class($e),
                                'message' => $e->getMessage(),
                                'file'    => $e->getFile(),
                                'line'    => $e->getLine(),
                            ]
                        ],
                        500
                    ),
                    $request
                );
            }
        } else {
            if (config('app.debug')) {
                $whoops = new Run;
                $whoops->pushHandler(new PrettyPageHandler);

                return response(
                    $whoops->handleException($e),
                    $e->getStatusCode(),
                    $e->getHeaders()
                );
            } else {
                return parent::render($request, $e);
            }
        }
    }
}
