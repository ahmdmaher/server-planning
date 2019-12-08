<?php
use PHPUnit\Framework\TestCase;
use ServerPlanning\Server;
use ServerPlanning\ServerPlanning;
use ServerPlanning\VirtualMachine;


 class ServerPlanningTest extends TestCase
{
     
    /**
     * @description Tests ServerPlanning::calculate calculateCaseserverFitVirtualMachines
     * 
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::calculate
     * 
     * 
     * 
     * @assert Assert the number of the server is correct
     * @assert Assert the $numberOfServers value of type integer.
     */
    public function test_calculateCaseserverFitVirtualMachines(): void
    {
        $serverPlanning = new ServerPlanning();
        $server  = new Server(2, 32, 100);
        $virtualMachines = [
            new VirtualMachine(1, 16, 10),
            new VirtualMachine(1, 16, 10),
            new VirtualMachine(2, 32, 100),
        ];
        $numberOfServers = $serverPlanning->calculate($server, $virtualMachines);
        $this->assertEquals(2, $numberOfServers);
        $this->assertIsInt($numberOfServers);
    }
    /**
     * @description Tests ServerPlanning::calculate calculateCaseserverFitVirtualMachines
     * 
     * @author Ahmed Maher <ahmd_maher@live.com>
     * @access public
     * @covers ::calculate
     * 
     * 
     * 
     * @assert Assert there is exception thrown case virtual machine list is empty
     */
    public function test_calculateCaseVirtualEmptyMachineList(): void
    {
        $serverPlanning = new ServerPlanning();
        $server = new Server(1, 1, 1);
        $this->expectException(Exception::class);
        $serverPlanning->calculate($server, []);
    }

    public function test_calculateCaseVirtualEmptyMachineList2(): void
    {
        $serverPlanning = new ServerPlanning();
        $this->expectException(Exception::class);
        $server = new Server(0,1,1);
        //$this->expectException(Exception::class);
        //$serverPlanning->calculate($server, []);
    }

}