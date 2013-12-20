growclient-php
==============

Official GROW-Services.net client library for PHP


## Install

You can install the through the composer.
    
    {
        "require": {
            "grow-services/growclient-php": "dev-master"
        }
    }    

## Usage

    use GrowClient;
    use GrowChart\Common\Pregnancy;
    
    
    // This factory can get all client. rest xml and soap.
    $client = ClientFactory::getInstance()->getClient('rest', $apikey, $apisecret);
    
    $preg = new Pregnancy();
    
    $preg->setEdd($edd);
    $preg->setEthnicity($eoc->client->spirit_ethnicity->toString());
    $preg->setParity($para);
    $preg->setMaternalheight($length);
    $preg->setMaternalweight($weight);
    $preg->setGrowchartversion($version);
    $preg->setGrowchartid($growchartid);
    
    $chart = $client->registerPregnancy($preg);
    
    print_r($chart);

