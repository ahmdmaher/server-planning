<?php

namespace ServerPlanning;

/**
 * @description Represents the Main server/VirtualMachine specification from CPU,RAM,HDD
 * @author Ahmed Maher<ahmd_maher@live.com>
 * 
 *
 */
interface ServerSpecifications
{

    /**
     * @description getter function to get the CPU value
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     *
     * @return Integer CPU Value
     */

    public function getCpu(): int;
    /**
     * @description setter function to set the CPU property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     *
     * @param integer $cpu
     * 
     * @return void
     */
    public function setCpu(int $cpu);
    
    /**
     * @description getter function to get the RAM value
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     *
     * @return Integer RAM Value
     */
    public function getRam(): int;
    
    /**
     * @description setter function to set the RAM property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     *
     * @param integer $ram
     * 
     * @return void
     */
    public function setRam(int $ram);

    /**
     * @description getter function to get the HDD value
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     *
     * @return Integer HDD Value
     */
    public function getHdd(): int;
    
    /**
     * @description setter function to set the HDD property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     *
     * @param integer $hdd
     * 
     * @return void
     */
    public function setHdd(int $hdd);
}