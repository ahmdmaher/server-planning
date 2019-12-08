<?php

namespace ServerPlanning;

/**
 * @description Represents interface that shall be implemented by all the different strategy for ServerAllocation
 * @author Ahmed Maher<ahmd_maher@live.com>
 * 
 *
 */
interface ServerAllocationStrategy
{
    /**
     * @description To check if the passed VirtualMachine fit to the server according to the used ServerAllocationStrategy 
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     * @param VirtualMachine $vm object of type VirtualMachine
     *
     * @return Boolean true in case passed virtual machine fit and false incase if it does not fit according to the used ServerAllocationStrategy 
     */

    public function fit(VirtualMachine $vm): bool;
}

