<?php
namespace ServerPlanning;

use ServerPlanning\Exceptions\InvalidResourceException;

/**
 * @author Ahmed maher <ahmd_maher@live.com>
 * @description Server - this class represent the implementation ServerSpecificationsInterface
 * 
 * 
 */

class Server implements ServerSpecifications
{
    /**
     * @author Ahmed maher <ahmd_maher@live.com>
     * @Description integer for the CPU Value.
     *
     * @var Integer
     */
    private $cpu;
    /**
     * @author Ahmed maher <ahmd_maher@live.com>
     * @Description integer for the RAM Value.
     *
     * @var Integer
     */
    private $ram;
    /**
     * @author Ahmed maher <ahmd_maher@live.com>
     * @Description integer for the HDD Value.
     *
     * @var Integer
     */
    private $hdd;
    
    
    /**
     * @description constructor to set $cpu , $ram and $hdd property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     * @param integer $cpu server CPU value
     * @param integer $ram server RAM value
     * @param integer $hdd server HDD value
     * 
     * @return void
     */
    public function  __construct($cpu, $ram, $hdd)
    {
        $this->cpu = self::validateResource('CPU', $cpu);
        $this->ram = self::validateResource('RAM', $ram);
        $this->hdd = self::validateResource('HDD', $hdd);
    }
    
    /**
     * @description getter function to get the CPU value
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     *
     * @return Integer CPU Value
     */

    public function getCpu(): int
    {
        return $this->cpu;
    }
        
    /**
     * @description setter function to set the CPU property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     *
     * @param integer $cpu
     * 
     * @return void
     */
    public function setCpu(int $cpu)
    {
        $this->cpu = $cpu;
    }
    /**
     * @description getter function to get the RAM value
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     *
     * @return Integer RAM Value
     */    
    public function getRam(): int
    {
        return $this->ram;
    }
        
    /**
     * @description setter function to set the RAM property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     *
     * @param integer $ram
     * 
     * @return void
     */
    public function setRam(int $ram)
    {
        $this->ram = $ram;
    }
    /**
     * @description getter function to get the HDD value
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     * 
     *
     * @return Integer HDD Value
     */
    public function getHdd(): int
    {
        return $this->hdd;
    }
    /**
     * @description setter function to set the HDD property
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     *
     * @param integer $hdd
     * 
     * @return void
     */
    public function setHdd(int $hdd)
    {
        $this->hdd = $hdd;
    }
    
    
    /**
     * @description Validate the passed input for the passed resource to be sure it is integer greater than 1 
     * @description and throw exception in case the resource input value is invalid
     * @author Ahmed Maher<ahmd_maher@live.com>
     * @access public
     *
     * @param String  $resource the resource that we need to validate its value (CPU,RAM,HDD)
     * @param Integer $input value of the passed resource
     * 
     * @return Boolean return true if the passed input is integer greater than or equal 1 for the passed resource.
     */
    private static function validateResource($resource, $input): int
    {
        $resourceValue = filter_var($input, FILTER_VALIDATE_INT, [
            'options' => [
                'min_range' => 1
            ],
        ]);
        if (!$resourceValue) {
            throw new InvalidResourceException($resource, $resourceValue);
        }
        return $resourceValue;
    }
}