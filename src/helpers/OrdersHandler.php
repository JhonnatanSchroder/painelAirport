<?php
namespace src\helpers;

use \core\Database;
use \src\Config;
use \src\models\Airport;
use \src\models\Orders;


class OrdersHandler {

    public function getOrdersBus() {
        $pdo = Database::getInstance();

        $sql = $pdo->query("SELECT * FROM `bus`  ORDER BY id DESC");
    
        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
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
        $pdo = Database::getInstance();

        $sql = $pdo->query("SELECT * FROM `limousine` ORDER BY id DESC");

        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
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
        $pdo = Database::getInstance();

        $sql = $pdo->query("SELECT * FROM `taxi` ORDER BY id DESC");

        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
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
        $pdo = Database::getInstance();

        $sql = $pdo->query("SELECT * FROM `taxiorder` ORDER BY id DESC");


        $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $order = new Orders();
        $order->list = [];

        if($sql->rowCount() != 0) {
            foreach($data as $pedido) {
                $newOrder = new Orders(); 
                $newOrder->cep_start = $pedido['cep_start'];
                $newOrder->date = $pedido['date_start'];
                $newOrder->passengers = $pedido['passengers'];
                $newOrder->kids_seats = $pedido['kids_seats'];
                $newOrder->booster_seats = $pedido['booster_seats'];
                $newOrder->obs = $pedido['obs'];
                $newOrder->name = $pedido['name_user'];
                $newOrder->email = $pedido['email'];
                $newOrder->telefone = $pedido['telefone'];
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
        $pdo = Database::getInstance();

        $sql = [];
        if($service === 'airportTaxi'){
            $sql = $pdo->prepare("DELETE FROM `taxiorder` WHERE id = :id");   
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

        if($service === 'taxi'){
            $sql = $pdo->prepare("DELETE FROM `taxi` WHERE id = :id");   
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

        if($service === 'bus'){
            $sql = $pdo->prepare("DELETE FROM `bus` WHERE id = :id");   
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

        if($service === 'limousine'){
            $sql = $pdo->prepare("DELETE FROM `limousine` WHERE id = :id");   
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
        
    }

}