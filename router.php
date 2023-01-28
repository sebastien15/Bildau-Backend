<?php 
class Router {
    private $controller;

    public function __construct(ReportsController $controller) {
        $this->controller = $controller;
    }
    
    private function setHeaders() {
        header("Content-Type: application/json");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Origin: http://localhost:3000");
    }

    

    private function route($uri, $method) {

        $this->setHeaders();

        if ($uri === '/reports' && $method === 'GET') {
            
            echo json_encode($this->controller->getAllReports());

        } elseif (preg_match('/\/reports\/([a-zA-Z0-9\-]+)/', $uri, $matches) && $method === 'PUT') {
            
            $reportId = $matches[1];
            $data = json_decode(file_get_contents('php://input'), true);
            $this->controller->updateReport($reportId, $data);

        }elseif (preg_match('/\/reports\/([a-zA-Z0-9\-]+)/', $uri, $matches) && $method === 'DELETE') {
        
            $reportId = $matches[1];

            $this->controller->deleteReport($reportId);

        } else {
            http_response_code(404);
        }

    }

    public function handleRequest() {
        
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $this->route($uri, $method);

        
    }
}
