<?php
use PHPUnit\Framework\TestCase;
use ServerPlanning\Exceptions\InvalidResourceException;
use ServerPlanning\VirtualMachine;
class VirtualMachineTest extends TestCase
{
    

    /**
     * @description prepare data to be used as providers for different cases for VirtualMachine __construct
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::__construct
     * 
     * @return array  of arrays of params for the called method test case function for all the invalid cases that will throw exception. 
     */
    public function provideDataForTestingVirtualMachineIntialization() {
     
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
     * @param array $serverResources array of the VirtualMachine resources for all the invalid cases
     * 
     * @dataProvider provideDataForTestingVirtualMachineIntialization
     * 
     * @assert exception of type InvalidResourceException is thrown.
     * 
     */
    public function test_virtualMachineInvalidResources($serverResources) {
        
        $this->expectException(InvalidResourceException::class);
        $server = new VirtualMachine($serverResources[0],$serverResources[1],$serverResources[2]);
    }
    
    
        /**
     * @description Tests virtualMachine::__construct For valid cases 
     * 
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::__construct
     * 
     * 
     * 
     * @assert $server is instance of ServerPlanning\VirtualMachine
     * @assert cpu resource value is integer
     * @assert cpu resource value is equal the passed value for the __construct
     * @assert ram resource value is integer
     * @assert ram resource value is equal the passed value for the __construct
     * @assert hdd resource value is integer
     * @assert hdd resource value is equal the passed value for the __construct
     */
    
    public function test_virtualMachineValidResourcesCase() {
        
        $virtualMachine= new VirtualMachine(/*cpu*/2,/*ram*/16,/*Hdd*/100);
        $this->assertInstanceOf("ServerPlanning\VirtualMachine", $virtualMachine);
        $this->assertIsInt($virtualMachine->getCpu());
        $this->assertEquals(2,$virtualMachine->getCpu());
        $this->assertIsInt($virtualMachine->getRam());
        $this->assertEquals(16,$virtualMachine->getRam());
        $this->assertIsInt($virtualMachine->getHdd());
        $this->assertEquals(100,$virtualMachine->getHdd());
    }
}