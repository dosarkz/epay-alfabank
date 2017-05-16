<?php
namespace Dosarkz\EPayAlfaBank;

use Dosarkz\EPayAlfaBank\Requests\DoRegisterRequest;
use Dosarkz\EPayAlfaBank\Requests\GetOrderStatusRequest;
use Dosarkz\EPayAlfaBank\Requests\PaymentOrderBindingDoRequest;
use Dosarkz\EPayAlfaBank\Requests\RefundRequest;

/**
 * Class AlfaBankRepository
 * @package Dosarkz\EPayAlfaBank
 */
class AlfaBankRepository
{
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $password;
    /**
     * @var
     */
    public $getaway_url;
    /**
     * @var
     */
    public $return_url;
    /**
     * @var
     */
    public $orderNumber;
    /**
     * @var
     */
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

    /**
     * @param DoRegisterRequest $request
     * @return mixed
     */
    public function registerDo(DoRegisterRequest $request)
    {
        return $this->request('register.do', $request->all());
    }

    /**
     * @param GetOrderStatusRequest $request
     * @return mixed
     */
    public function getOrderStatus(GetOrderStatusRequest $request)
    {
        return $this->request('getOrderStatus.do', $request->all());
    }

    /**
     * @param GetOrderStatusRequest $request
     * @return mixed
     */
    public function getOrderStatusExtended(GetOrderStatusRequest $request)
    {
        return $this->request('getOrderStatusExtended.do', $request->all());
    }

    /**
     * @param DoRegisterRequest $request
     * @return mixed
     */
    public function registerPreAuth(DoRegisterRequest $request)
    {
        return $this->request('registerPreAuth.do', $request->all());
    }

    /**
     * @param RefundRequest $request
     * @return mixed
     */
    public function refund(RefundRequest $request)
    {
        return $this->request('refund.do', $request->all());
    }

    /**
     * @param GetOrderStatusRequest $request
     * @return mixed
     */
    public function reverse(GetOrderStatusRequest $request)
    {
        return $this->request('reverse.do', $request->all());
    }

    public function paymentOrderBindingDo(PaymentOrderBindingDoRequest $request)
    {
        return $this->request('paymentOrderBinding.do', $request->all());
    }

    public function depositDo(RefundRequest $request)
    {
        return $this->request('deposit.do', $request->all());
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