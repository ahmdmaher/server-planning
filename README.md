  ____                                ____  _                   _             
 / ___|  ___ _ ____   _____ _ __     |  _ \| | __ _ _ __  _ __ (_)_ __   __ _ 
 \___ \ / _ \ '__\ \ / / _ \ '__|____| |_) | |/ _` | '_ \| '_ \| | '_ \ / _` |
  ___) |  __/ |   \ V /  __/ | |_____|  __/| | (_| | | | | | | | | | | | (_| |
 |____/ \___|_|    \_/ \___|_|       |_|   |_|\__,_|_| |_|_| |_|_|_| |_|\__, |
                                                                        |___/ 
------------------------------------------------------------------------------                                                         
Write a library that calculates the number of servers (which have the same configuration) needed to host a specified
amount of virtual machines.

Your library should return the number of servers that is required, to host a non-empty collection of virtual machines.
This means you should implement the following method (UML definition):
    +calculate(serverType: Server, virtualMachines: VirtualMachine[1..*]): int
All servers have the same type. This type defines the hardware resources each server provides: CPU, RAM, HDD.
Each virtual machine is defined by the virtual hardware resources it needs (on a server): CPU, RAM, HDD.

The algorithm for the virtual machine distribution should implement a 'first fit' strategy. 
This means there is no resource optimization or 'look back'.
Virtual machines are always allocated on the current or the next server (in case of limited resources).

If a virtual machine is too 'big' for a server, it should be skipped.
If the collection of virtual machines is empty, an exception should be thrown.

------------------------------------------------------------------------------
Example:
    - Server type = {CPU: 2, RAM: 32, HDD: 100}
    - Virtual Machines = [{CPU: 1, RAM: 16, HDD: 10}, {CPU: 1, RAM: 16, HDD: 10}, {CPU: 2, RAM: 32, HDD: 100}]
    - Result = 2
------------------------------------------------------------------------------
General Requirements:
    - Create a composer project with PHP version 7 or higher
    - Free choice of dependencies, but keep it simple
    - Your code should be fully (unit) tested!  
