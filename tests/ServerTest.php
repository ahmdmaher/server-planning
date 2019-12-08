<?php
use PHPUnit\Framework\TestCase;
use ServerPlanning\Exceptions\InvalidResourceException;
use ServerPlanning\Server;

class ServerTest extends TestCase
{
    

    /**
     * @description prepare data to be used as providers for different cases for Server __construct
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::__construct
     * 
     * @return array  of arrays of params for the called method test case function for all the invalid cases that will throw exception. 
     */
    public function provideDataForTestingServerIntialization() : array
    {
     
        return array(           
                //case cpu value is zero
               array(/* $cpu */0,/* $ram */1,/* $hdd */1),
               //case ram value is zero
               array(/* $cpu */1,/* $ram */0,/* $hdd */1),
                //case hdd value is zero
               array(/* $cpu */1,/* $ram */1,/* $hdd */0),
                //case cpu value is string
               array(/* $cpu */'test',/* $ram */1,/* $hdd */1),
               //case ram value is string
               array(/* $cpu */1,/* $ram */'test',/* $hdd */1),
               //case hdd value is string
               array(/* $cpu */1,/* $ram */1,'/* $hdd */test'),
               //case cpu value is  float
               array(/* $cpu */1.5,/* $ram */1,/* $hdd */1),
                //case ram value is  float
               array(/* $cpu */1,/* $ram */1.5,/* $hdd */1),
                //case hdd value is float
               array(/* $cpu */1,/* $ram */1,/* $hdd */1.5),
                //case cpu value is null
               array(/* $cpu */null,/* $ram */1,/* $hdd */1),
                //case ram value is null
               array(/* $cpu */1,/* $ram */null,/* $hdd */1),
                 //case hdd value is null
               array(/* $cpu */1,/* $ram */1,/* $hdd */null),
        );
    }
    
    /**
     * @description Tests Server::__construct For invalid cases 
     * @description case cpu value is zero
     * @description case ram value is zero
     * @description case hdd value is zero
     * @description case cpu value is string
     * @description case ram value is string
     * @description case hdd value is string
     * @description case cpu value is  float
     * @description case ram value is  float
     * @description case hdd value is float
     * @description case cpu value is null
     * @description case ram value is null
     * @description case hdd value is null
     * 
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::__construct
     * 
     * @param array $serverResources array of the server resources for all the invalid cases
     * 
     * @dataProvider provideDataForTestingServerIntialization
     * 
     * @assert exception of type InvalidResourceException is thrown.
     * 
     */
    public function test_serverInvalidResourcesCase($serverResources): void 
    {
        
        $this->expectException(InvalidResourceException::class);
        $server = new Server($serverResources[0],$serverResources[1],$serverResources[2]);
    }
    
    /**
     * @description Tests Server::__construct For valid cases 
     * 
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::__construct
     * 
     * 
     * 
     * @assert $server is instance of ServerPlanning\Server.
     * @assert cpu resource value is integer
     * @assert cpu resource value is equal the passed value for the __construct
     * @assert ram resource value is integer
     * @assert ram resource value is equal the passed value for the __construct
     * @assert hdd resource value is integer
     * @assert hdd resource value is equal the passed value for the __construct
     */
    
    public function test_serverValidResourcesCase() : void
    {
        
        $server = new Server(/*cpu*/2,/*ram*/16,/*Hdd*/100);
        $this->assertInstanceOf("ServerPlanning\Server", $server);
        $this->assertIsInt($server->getCpu());
        $this->assertEquals(2,$server->getCpu());
        $this->assertIsInt($server->getRam());
        $this->assertEquals(16,$server->getRam());
        $this->assertIsInt($server->getHdd());
        $this->assertEquals(100,$server->getHdd());
    }
}