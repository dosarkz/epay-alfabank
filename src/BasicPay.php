<?php
namespace Dosarkz\EPayAlfaBank;


use Dosarkz\EPayAlfaBank\Requests\DoRegisterRequest;
use Dosarkz\EPayAlfaBank\Requests\GetOrderStatusRequest;

class BasicPay extends AlfaBankRepository
{
    private $params;

    public function __construct($params = [])
    {
        parent::__construct();

        $this->params = $params;
    }

    /**
     * @param DoRegisterRequest $request
     * @return mixed
     */
    public function registerDo(DoRegisterRequest $request)
    {
        return $this->request('register.do', $request->all());
    }

    public function getOrderStatus(GetOrderStatusRequest $request)
    {
        return $this->request('getOrderStatus.do', $request->all());
    }
}