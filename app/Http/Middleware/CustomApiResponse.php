<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!$response instanceof JsonResponse) {
            return $response;
        }

        $status = $response->status();

        if ($status === 204) {
            return $response;
        }

        $code = $status === 422 ? 'Failed' : Response::$statusTexts[$status];

        if ($status === 500) {
            return $response->error($status, $code, 'error.unexpected');
        }

        $data = $response->getData();

        if (isset($data->errors)) {
            return $response->error($status, $code, get_object_vars($data->errors));
        }

        if (isset($data->message)) {
            return $response->error($status, $code, $data->message);
        }

        if (isset($data->data) && is_object($data->data)) {
            $data = get_object_vars($data->data);
        }

        return $response->success($status, $code, $data);
    }

}
