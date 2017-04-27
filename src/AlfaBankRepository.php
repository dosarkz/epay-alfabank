<?php
namespace Dosarkz\EPayAlfaBank;

use Dosarkz\EPayAlfaBank\Requests\DoRegisterRequest;

class AlfaBankRepository
{
    public $username;
    public $password;
    public $getaway_url;
    public $return_url;
    public $orderNumber;
    public $amount;


    public function __construct()
    {
        config('alfabank.pay_test_mode',true) ? $this->setTestParams() : $this->setProductionParams();
    }


    private function setTestParams()
    {
        $this->getaway_url  =   config('alfabank.TEST_GETAWAY_URL');
        $this->username = config('alfabank.');
    }

    private function setProductionParams()
    {
    }

    public function basicPay($params)
    {
        $basicPay =  new BasicPay();
        return $basicPay->registerDo(new DoRegisterRequest($params));
    }



    /**
     * @param $method
     * @param $data
     * @return mixed
     */
    public function request($method, $data) {
        $curl = curl_init(); // Инициализируем запрос
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getaway_url.$method, // Полный адрес метода
            CURLOPT_RETURNTRANSFER => true, // Возвращать ответ
            CURLOPT_POST => true, // Метод POST
            CURLOPT_POSTFIELDS => http_build_query($data) // Данные в запросе
        ));
        $response = curl_exec($curl); // Выполненяем запрос

        $response = json_decode($response, true); // Декодируем из JSON в массив
        curl_close($curl); // Закрываем соединение
        return $response; // Возвращаем ответ
    }



}