<?php

class Router
{
    private $routes = [];

    // Đăng ký route GET
    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    // Đăng ký route POST
    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    // Xử lý yêu cầu
    public function resolve($requestUri, $requestMethod)
    {
        $path = parse_url($requestUri, PHP_URL_PATH);
        $callback = null;
    
        // Tìm kiếm route phù hợp, bao gồm các route
        foreach ($this->routes[$requestMethod] as $route => $handler) {
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_-]+)', $route);
            $pattern = '#^' . $pattern . '$#'; // Tạo regex từ route
    
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Loại bỏ match đầu tiên (toàn bộ chuỗi)
                $callback = $handler;
                break;
            }
        }
    
        if (!$callback) {
            http_response_code(404);
            echo "404 - Route not found";
            exit;
        }
    
        // Nếu callback là array [Controller, Method]
        if (is_array($callback)) {
            [$controller, $method] = $callback;
    
            if (method_exists($controller, $method)) {
                $controller->$method(...$matches);
                return;
            }
        }
    
        // Nếu callback là callable (function closure)
        if (is_callable($callback)) {
            call_user_func_array($callback, $matches);
            return;
        }
    
        http_response_code(500);
        echo "500 - Invalid route handler";
    }
    
}
