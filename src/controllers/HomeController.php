<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHandler;
use \src\helpers\HomeHandler;
use \src\helpers\OrdersHandler;
use \src\models\AirportOrders;
use \src\models\TaxiOrders;
use \src\models\Bus;
use \src\models\Limousine;


class HomeController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    public function index() {
        $lastOrderAirport = HomeHandler::getLastsOrderAirport();
        $lastOrderBus = HomeHandler::getLastsOrderBus();
        $lastOrderLimousine = HomeHandler::getLastsOrderLimousine();
        $lastOrderTaxi = HomeHandler::getLastsOrderTaxi();

        $this->render('home', [
            'ordersAirport' => $lastOrderAirport,
            'ordersBus' => $lastOrderBus,
            'ordersLimousine' => $lastOrderLimousine,
            'ordersTaxi' => $lastOrderTaxi
        ]);
    }

    public function orders() {
        $ordersAirport = OrdersHandler::getOrdersAirport();
        $ordersBus = OrdersHandler::getOrdersBus();
        $ordersLimousine = OrdersHandler::getOrdersLimousine();
        $ordersTaxi = OrdersHandler::getOrdersTaxi();
    
        $this->render('pedidos', [
            'ordersAirport' => $ordersAirport,
            'ordersBus' => $ordersBus,
            'ordersLimousine' => $ordersLimousine,
            'ordersTaxi' => $ordersTaxi,
        ]);
    }

    public function edit($atts) {
        $pedido = HomeHandler::getOrder($atts['id'], $atts['service']);

        $this->render('edit', [
            'order' => $pedido
        ]);
    }

    public function editAction($atts) {
        if($atts['service'] === 'airporttaxi'){
            AirportOrders::update()->set([
                'cep_start' => $_POST['cep_start'],
                'date_start' => $_POST['date'],
                'passengers' => $_POST['passengers'],
                'kids_seats' => $_POST['kids_seats'],
                'booster_seats' => $_POST['booster_seats'],
                'obs' => $_POST['obs'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'street_name' => $_POST['street'],
                'cep_end' => $_POST['cep_end'],
                'conection' => $_POST['conection'],
                'airport' => $_POST['airport'],
            ])->where('id', $atts['id'])->execute();
        }

        if($atts['service'] === 'taxi'){
            TaxiOrders::update()->set([
               'street_start' =>  $_POST['street_start'],
               'cep_start' =>  $_POST['cep_start'],
               'city_start' =>  $_POST['city_start'],
               'street_end' =>  $_POST['street_end'],
               'cep_end' =>  $_POST['cep_end'],
               'city_end' =>  $_POST['city_end'],
               'date_start' =>  $_POST['date'],
               'passengers' =>  $_POST['passengers'],
               'kids_seats' =>  $_POST['kids_seats'],
               'booster_seats' =>  $_POST['booster_seats'],
               'obs' =>  $_POST['obs'],
               'conection' =>  $_POST['conection'],
               'name' =>  $_POST['name'],
               'email' =>  $_POST['email'],
               'phone' =>  $_POST['phone'],
            ])->where('id', $atts['id'])->execute();

        }

        if($atts['service'] === 'bus'){
            Bus::update()->set([
                'date' => $_POST['date'],
                'street' => $_POST['street'],
                'cep_start' => $_POST['cep_start'],
                'passengers' => $_POST['passengers'],
                'obs' => $_POST['obs'],
                'how' => $_POST['how'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
            ])->where('id', $atts['id'])->execute();

        }
        
        if($atts['service'] === 'limousine'){
            Limousine::update()->set([
                'date' => $_POST['date'],
                'street' => $_POST['street'],
                'cep_start' => $_POST['cep_start'],
                'passengers' => $_POST['passengers'],
                'kids_seats' => $_POST['kids_seats'],
                'booster_seats' => $_POST['booster_seats'],
                'obs' => $_POST['obs'],
                'how' => $_POST['how'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
            ])->where('id', $atts['id'])->execute();
        }

        $this->redirect('/orders');
    }

    public function excluir($atts) {
        OrdersHandler::delete($atts['id'], $atts['service']);

        $this->redirect('/orders');
    }

    public function logout() {
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }



}