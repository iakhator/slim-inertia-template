<?php

namespace InertiaAdapter\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use InertiaAdapter\Inertia;

class InertiaShared
{
  public function __invoke(Request $request, RequestHandler $handler):Response
  {
      Inertia::share([
          'auth' => [
              'user' => $_SESSION['user'] ?? null, // Example: user data from session
          ],
          'flash' => [
              'message' => $_SESSION['flash_message'] ?? null,
          ],
      ]);

      return $handler->handle($request);
  }
}
