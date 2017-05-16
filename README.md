# epay-alfabank for Laravel Framework
Equiring system from Alfa Bank

# Install

```
  composer require dosarkz/epay-alfabank
```

# Service provider

```
   Dosarkz\EPayAlfaBank\AlfaBankServiceProvider::class,
```

# Facade

```
 'AlfaBank' => Dosarkz\EPayAlfaBank\Facades\AlfaBank::class,
```
# Basic Pay

```
use Dosarkz\EPayAlfaBank\Facades\AlfaBank;
use Dosarkz\EPayAlfaBank\Requests\DoRegisterRequest;

 $params = [
    'userName' => '*',
                    'password' =>  '*',
                    'orderNumber' => '*',
                    'amount'    => '*',
                    'currency' => 398,
                    'returnUrl' => '*',
                    'description'   => '*',
                    'language'  => '*',
                    'pageView'  => '*',
 ]
 
 $pay = AlfaBank::registerDo(new DoRegisterRequest($params));
 ```
