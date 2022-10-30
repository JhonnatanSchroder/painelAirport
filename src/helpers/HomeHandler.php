<?php
namespace src\helpers;

use \core\Database;
use \src\Config;
use \src\models\Airport;
use \src\models\Orders;
use \src\models\TaxiOrders;
use \src\models\AirportOrders;
use \src\models\Bus;
use \src\models\Limousine;

class HomeHandler {

     public static function getOrder($id, $service) {

        if($service === 'airporttaxi'){
            $data =  AirportOrders::select()->where('id', $id)->one();
            return $data;
        }

        if($service === 'taxi'){
            $data = Taxiorders::select()->where('id', $id)->one();
            return $data;
            
        }

        if($service === 'bus'){
            $data = Bus::select()->where('id', $id)->one();
            return $data;
            
        }

        if($service === 'limousine'){
            $data = Limousine::select()->where('id', $id)->one();
            return $data;
                 
        }
        
    }

    public function getLastsOrderAirport() {

        $data = AirportOrders::select()->orderBy('id', 'desc')->limit(2)->get();

        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date_start'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }

    }

    public function getLastsOrderBus() {
        $data = Bus::select()->orderBy('id', 'desc')->limit(2)->get();

        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }

    }

    public function getLastsOrderLimousine() {
        $data = Limousine::select()->orderBy('id', 'desc')->limit(2)->get();
        
        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;
            }
            
            return $order;
        }

    }
    
    public function getLastsOrderTaxi() {
        $data = TaxiOrders::select()->orderBy('id', 'desc')->limit(2)->get();
       
        if(isset($data)) {
            foreach($data as $pedido) {
                $newOrder = new Orders();
                $newOrder->date = $pedido['date_start'];
                $newOrder->service_type = $pedido['service_type'];
                $newOrder->id = $pedido['id'];

                $order->list[] = $newOrder;

            }
            
            return $order;
        }

    }
}