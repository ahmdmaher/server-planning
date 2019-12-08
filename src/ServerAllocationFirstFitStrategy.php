<?php
namespace ServerPlanning;
/**
 * @author Ahmed maher <ahmd_maher@live.com>
 * @description Server - this class represent the implementation ServerAllocationFirstFitStrategy
 * 
 * 
 */
class ServerAllocationFirstFitStrategy implements ServerAllocationStrategy
{
    /**
     * @author Ahmed maher <ahmd_maher@live.com>
     * @Description integer for the CPU Value.
     *
     * @var Integer
     */
    private $availableCpu = 0;
    /**
     * @author Ahmed maher <ahmd_maher@live.com>
     * @Description integer for the RAM Value.
     *
     * @var Integer
     */
    private $availableRam = 0;
    /**
     * @author Ahmed maher <ahmd_maher@live.com>
     * @Description integer for the HDD Value.
     *
     * @var Integer
     */
    private $availableHdd = 0;
    
    /**
     * @description constructor to set availableCpu , availableRam and availableHdd property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     * @param $server Object of type Server 
     * 
     * @return void
     */
    public function __construct(Server $server)
    {
        $this->availableCpu = $server->getCpu();
        $this->availableRam = $server->getRam();
        $this->availableHdd = $server->getHdd();
    }
    /**
     * @description To check if the passed VirtualMachine fit to the server according to the used ServerAllocationFirstFitStrategy 
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     * @param VirtualMachine $vm object of type VirtualMachine
     *
     * @return Boolean true in case passed virtual machine fit and false incase if it does not fit according to the ServerAllocationFirstFitStrategy 
     */

    public function fit(VirtualMachine $vm): bool
    {
        $cpu = $this->availableCpu - $vm->getCpu();
        $ram = $this->availableRam - $vm->getRam();
        $hdd = $this->availableHdd - $vm->getHdd();
        
        if ($cpu >= 0 && $ram >= 0 && $hdd >= 0) {
            
            $this->availableCpu -= $vm->getCpu();
            $this->availableRam -= $vm->getRam();
            $this->availableHdd -= $vm->getHdd();
            
            return true;
            
        } else {
            
            return false;
        }
    }
}