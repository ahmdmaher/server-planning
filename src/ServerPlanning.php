<?php
namespace ServerPlanning;


/**
 * @author Ahmed maher <ahmd_maher@live.com>
 * @description Server - this class represent server planning for the virtualMachines
 * 
 * 
 */
class ServerPlanning
{
    /**
     * @description return the number of servers that is required, to host a non-empty collection of virtual machines
     * @description If a virtual machine is too 'big' for a server, it should be skipped.
     * @description If the collection of virtual machines is empty, an exception should be thrown.
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     * @param $server Object of type Server 
     * @param VirtualMachine $vm object of type VirtualMachine
     *
     * @return Integer the number of servers that is required, to host a non-empty collection of virtual machines
     */
    public function calculate(Server $server, array $virtualMachines): int
    {
        if (count($virtualMachines) == 0) {
             
             throw new \Exception("Empty Virtual Machine Collection");
        }
        
        $policy = new ServerAllocationFirstFitStrategy($server);
        $counter = 0;
        foreach ($virtualMachines as $virtualMachine) {
            if ($policy->fit($virtualMachine)) {
                $counter++;
            }
        }
        return $counter;
    }
}