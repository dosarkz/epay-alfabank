<?php
namespace Dosarkz\EPayAlfaBank;


use Dosarkz\EPayAlfaBank\Requests\DoRegisterRequest;

class BasicPay extends AlfaBankRepository
{
    /**
     * @param DoRegisterRequest $request
     * @return mixed
     */
    public function registerDo(DoRegisterRequest $request)
    {
        return $this->request('register.do', $request->all());
    }
}