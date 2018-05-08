<?php

namespace App\Http\Middleware;

use Closure;

class AjaxHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->isMethod('post') && $handler = $request->server('HTTP_X_SM_REQUEST_HANDLER'))
        {

            $route = $request->route();

            $action = $route->getAction();
            $prex =  substr($action['uses'], 0, strpos($action['uses'], '@')+1);

            $routeAction = array_merge($action, [
                'uses'       => $prex . $handler,
                'controller' => $prex . $handler,
            ]);

            $route->setAction($routeAction);
            $route->controller = false;
            
        }
        return $next($request);
    }
}
