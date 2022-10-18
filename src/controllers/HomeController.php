<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHandler;
use \src\helpers\AirportHandler;
use \src\helpers\OrdersHandler;

class HomeController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    public function index() {
        $lastOrderAirport = AirportHandler::getLastsOrderAirport();
        $lastOrderBus = AirportHandler::getLastsOrderBus();
        $lastOrderLimousine = AirportHandler::getLastsOrderLimousine();
        $lastOrderTaxi = AirportHandler::getLastsOrderTaxi();

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
        $pedido = AirportHandler::getOrder($atts['id'], $atts['service']);

        $this->render('edit', [
            'order' => $pedido
        ]);
    }

    public function editAction($atts) {
        if($atts['service'] === 'airportTaxi'){
            $cep_start = filter_input(INPUT_POST, 'cep_start');
            $date = filter_input(INPUT_POST, 'date');
            $passenger = filter_input(INPUT_POST, 'passenger');
            $kids_seats = filter_input(INPUT_POST, 'kids_seats');
            $booster_seats = filter_input(INPUT_POST, 'booster_seats');
            $obs = filter_input(INPUT_POST, 'obs');
            $name = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $street = filter_input(INPUT_POST, 'street');
            $cep_end = filter_input(INPUT_POST, 'cep_end');
            $conection = filter_input(INPUT_POST, 'conection');
            $airport = filter_input(INPUT_POST, 'airport');
        }

        if($atts['service'] === 'taxi'){
           $street_start =  filter_input(INPUT_POST, 'street_start');
           $cep_start =  filter_input(INPUT_POST, 'cep_start');
           $city_start =  filter_input(INPUT_POST, 'city_start');
           $street_end =  filter_input(INPUT_POST, 'street_end');
           $cep_end =  filter_input(INPUT_POST, 'cep_end');
           $city_end =  filter_input(INPUT_POST, 'city_end');
           $date =  filter_input(INPUT_POST, 'date');
           $passengers =  filter_input(INPUT_POST, 'passengers');
           $kids_seats =  filter_input(INPUT_POST, 'kids_seats');
           $bosster_seats =  filter_input(INPUT_POST, 'booster_seats');
           $obs =  filter_input(INPUT_POST, 'obs');
           $conection =  filter_input(INPUT_POST, 'conection');
           $name =  filter_input(INPUT_POST, 'name');
           $email =  filter_input(INPUT_POST, 'email');
           $phone =  filter_input(INPUT_POST, 'phone');
           $service_type =  filter_input(INPUT_POST, 'service_type');
        }

        if($atts['service'] === 'bus'){
            $date = filter_input(INPUT_POST, 'date');
            $street = filter_input(INPUT_POST, 'street');
            $cep_start = filter_input(INPUT_POST, 'cep_start');
            $passenger = filter_input(INPUT_POST, 'passenger');
            $obs = filter_input(INPUT_POST, 'obs');
            $how = filter_input(INPUT_POST, 'how');
            $name = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
        }
        
        if($atts['service'] === 'limousine'){
            $date = filter_input(INPUT_POST, 'date');
            $street = filter_input(INPUT_POST, 'street');
            $cep_start = filter_input(INPUT_POST, 'cep_start');
            $passenger = filter_input(INPUT_POST, 'passenger');
            $kids_seats = filter_input(INPUT_POST, 'kids_seats');
            $booster_seats = filter_input(INPUT_POST, 'booster_seats');
            $obs = filter_input(INPUT_POST, 'obs');
            $how = filter_input(INPUT_POST, 'how');
            $name = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
        }
    }

    public function excluir($atts) {
        OrdersHandler::delete($atts['id'], $atts['service']);

        $this->redirect('/orders');
    }



}