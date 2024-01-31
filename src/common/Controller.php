<?php 
namespace Quockhanh\Asignment2\common;
use eftec\bladeone\BladeOne;


class Controller {

    public function renderClient($view, $data=[]) {
        $path = __DIR__ .'/../Views/Client';
        $blade = new BladeOne($path);
        echo $blade->run($view, $data);
    }

    public function renderAuth($view, $data=[]) {
        $path = __DIR__ .'/../Views/Auth';
        $blade = new BladeOne($path);
        echo $blade->run($view, $data);
    }

    public function renderAdmin($view, $data=[]) {
        $path = __DIR__ .'/../Views/Admin';
        $blade = new BladeOne($path);
        echo $blade->run($view, $data);
    }
}
