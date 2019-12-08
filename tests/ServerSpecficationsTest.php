<?php
use PHPUnit\Framework\TestCase;
use ServerPlanning\Exceptions\InvalidResourceException;
use ServerPlanning\VirtualMachine;

abstract class ServerSpecficationsTest extends TestCase
{
    

    /**
     * @description prepare data to be used as providers for different cases for Server/VirtualMachine __construct
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::__construct
     * 
     * @return array  of arrays of params for the called method test case function for all the invalid cases that will throw exception. 
     */
    public function provideDataForTestingIntialization() {
     
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
    
   
}