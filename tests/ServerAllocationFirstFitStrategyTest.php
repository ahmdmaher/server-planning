<?php
use PHPUnit\Framework\TestCase;
use ServerPlanning\ServerAllocationFirstFitStrategy;
use ServerPlanning\Server;
use ServerPlanning\VirtualMachine;


class ServerAllocationFirstFitStrategyTest extends TestCase
{
    /**
     * @description Tests ServerAllocationFirstFitStrategyTest::fit CaseVirtualMachineTooBig 
     * 
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::fit
     * 
     * @assert $firstFitStrategy equal false
     * @assert Assert that the return datatype is of type Boolean
     */
    
    public function test_CaseVirtualMachineTooBig(): void
    {
        $server = new Server(3, 16, 100);
        $virtualMachine = new VirtualMachine(4, 32, 100);
        $firstFitStrategy = new ServerAllocationFirstFitStrategy($server);
        $this->assertEquals(false, $firstFitStrategy->fit($virtualMachine));
        $this->assertIsBool($firstFitStrategy->fit($virtualMachine));
    }
    /**
     * @description Tests ServerAllocationFirstFitStrategyTest::fit CaseVirtualMachineFit 
     * 
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::fit
     * 
     * @assert $firstFitStrategy equal true
     * @assert Assert that the return datatype is of type Boolean
     */
    public function testCaseVirtualMachineFit(): void
    {
        $server = new Server(2, 16, 10);
        $virtualMachine = new VirtualMachine(1, 16, 10);
        $firstFitStrategy = new ServerAllocationFirstFitStrategy($server);
        $this->assertEquals(true, $firstFitStrategy->fit($virtualMachine));
        $this->assertIsBool($firstFitStrategy->fit($virtualMachine));
    }
}