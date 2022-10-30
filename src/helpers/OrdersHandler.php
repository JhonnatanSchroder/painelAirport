<?php
namespace src\helpers;

use \src\models\Airport;
use \src\models\Orders;
use \src\models\AirportOrders;
use \src\models\Bus;
use \src\models\Limousine;
use \src\models\Taxiorders;



class OrdersHandler {

    public function getOrdersBus() {
        $data = Bus::select()->orderBy('id', 'desc')->get();

        $order = new Orders();
        $order->list = [];
        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders(); 
                $newOrder->date = $pedido['date'];
                $newOrder->street = $pedido['street'];
                $newOrder->cep_start = $pedido['cep_start'];
                $newOrder->passengers = $pedido['passengers'];
                $newOrder->obs = $pedido['obs'];
                $newOrder->how = $pedido['how'];
                $newOrder->name = $pedido['name'];
                $newOrder->email = $pedido['email'];
                $newOrder->phone = $pedido['phone'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }

    }

    public static function getOrdersLimousine() {
        $data = Limousine::select()->orderBy('id', 'desc')->get();

        $order = new Orders();
        $order->list = [];
        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders(); 
                $newOrder->date = $pedido['date'];
                $newOrder->street = $pedido['street'];
                $newOrder->cep_start = $pedido['cep_start'];
                $newOrder->passengers = $pedido['passengers'];
                $newOrder->kids_seats = $pedido['kids_seats'];
                $newOrder->booster_seats = $pedido['booster_seats'];
                $newOrder->obs = $pedido['obs'];
                $newOrder->how = $pedido['how'];
                $newOrder->name = $pedido['name'];
                $newOrder->email = $pedido['email'];
                $newOrder->phone = $pedido['phone'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }
       
    }

    public static function getOrdersTaxi() {
        $data = Taxiorders::select()->orderBy('id', 'desc')->get();

        $order = new Orders();
        $order->list = [];
        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders(); 
                $newOrder->street_start = $pedido['street_start'];
                $newOrder->cep_start = $pedido['cep_start'];
                $newOrder->city_start = $pedido['city_start'];
                $newOrder->street_end = $pedido['street_end'];
                $newOrder->cep_end = $pedido['cep_end'];
                $newOrder->city_end = $pedido['city_end'];
                $newOrder->date = $pedido['date_start'];
                $newOrder->passengers = $pedido['passengers'];
                $newOrder->kids_seats = $pedido['kids_seats'];
                $newOrder->booster_seats = $pedido['booster_seats'];
                $newOrder->obs = $pedido['obs'];
                $newOrder->name = $pedido['name'];
                $newOrder->email = $pedido['email'];
                $newOrder->phone = $pedido['phone'];
                $newOrder->conection = $pedido['conection'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }
    }

    public static function getOrdersAirport() {
        $data = AirportOrders::select()->orderBy('id', 'desc')->get();

        $order = new Orders();
        $order->list = [];
        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders(); 
                $newOrder->cep_start = $pedido['cep_start'];
                $newOrder->date = $pedido['date_start'];
                $newOrder->passengers = $pedido['passengers'];
                $newOrder->kids_seats = $pedido['kids_seats'];
                $newOrder->booster_seats = $pedido['booster_seats'];
                $newOrder->obs = $pedido['obs'];
                $newOrder->name = $pedido['name'];
                $newOrder->email = $pedido['email'];
                $newOrder->telefone = $pedido['phone'];
                $newOrder->street_name = $pedido['street_name'];
                $newOrder->cep_end = $pedido['cep_end'];
                $newOrder->conection = $pedido['conection'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->airport = $pedido['airport'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }
        
    }

    public static function delete($id, $service) {

        if($service === 'airporttaxi'){
            AirportOrders::delete()->where('id', $id)->execute();

            return;
        }

        if($service === 'taxi'){
            Taxiorders::delete()->where('id', $id)->execute();
            return;
        }

        if($service === 'bus'){
           Bus::delete()->where('id', $id)->execute();
           return;
        }

        if($service === 'limousine'){
            Limousine::delete()->where('id', $id)->execute();
            return;
            
        }
        
    }

}