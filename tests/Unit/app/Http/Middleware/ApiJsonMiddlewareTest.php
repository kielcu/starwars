<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Tests\Unit\app\Http\Middleware;


use App\Http\Middleware\ApiJsonMiddleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tests\TestCase;

class ApiJsonMiddlewareTest extends TestCase
{
    /** @test */
    public function request_header_has_not_accept_application_json()
    {
        $request = new Request;

        $middleware = new ApiJsonMiddleware();

        /** @var JsonResponse $response */
        $response = $middleware->handle($request, function ($req) {});
        $this->assertNotNull($response);
    }

    /** @test */
    public function request_header_has_wrong_accept_type()
    {
        $request = new Request;
        $request->headers->set('Accept', 'test');

        $middleware = new ApiJsonMiddleware();

        /** @var JsonResponse $response */
        $response = $middleware->handle($request, function ($req) {});
        $this->assertNotNull($response);
    }


    /** @test */
    public function request_header_has_good_accept_type()
    {
        $request = new Request;
        $request->headers->set('Accept', 'application/json');

        $middleware = new ApiJsonMiddleware();

        /** @var JsonResponse $response */
        $response = $middleware->handle($request, function ($req) {});
        $this->assertNull($response);
    }
}