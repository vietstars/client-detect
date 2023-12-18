<?php

require __DIR__.'/../vendor/mobiledetect/mobiledetectlib/tests/UserAgentTest.php';

use Vietstars\ClientDetect\Client;

class VendorsTestExtended extends VendorsTest
{
    /**
     * @var Agent
     */
    protected $detect;

    public function setUp()
    {
        $this->detect = new Client();
    }
}
