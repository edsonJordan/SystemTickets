<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);        
        $role2 = Role::create(['name' => 'Admin_group']);
        $role3 = Role::create(['name' => 'Support']);

        $permission = Permission::create(['name' => 'admin.ticket.home.index', 'description' => 'Ver el dashboard'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'admin.data.export.index', 'description' => 'Ver vista de exportación de datos'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.data.export.prueba', 'description' => 'Exportar datos'])->syncRoles([$role1, $role2]);

 /*     $permission = Permission::create(['name' => 'admin.role.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.role.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.role.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.role.destroy'])->syncRoles([$role1]);  */

        $permission = Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Roles'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar Roles'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar Roles'])->syncRoles([$role1, $role2]); 

        $permission = Permission::create(['name' => 'admin.roles.general.create', 'description' => 'Ver listado de roles general'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.roles.general.store', 'description' => 'Crear Roles generales'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.roles.general.destroy', 'description' => 'Eliminar Roles generales'])->syncRoles([$role1, $role2]); 


        $permission = Permission::create(['name' => 'admin.ticket.groups.index', 'description' => 'Ver listado de Grupos de Soporte'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.ticket.groups.create', 'description' => 'Crear Grupos de Soporte'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.ticket.groups.edit', 'description' => 'Editar Grupos de Soporte'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.ticket.groups.destroy', 'description' => 'Eliminar Grupos de Soporte'])->syncRoles([$role1, $role2]);

        $permission = Permission::create(['name' => 'admin.ticket.areas.index', 'description' => 'Ver listado de Areas'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.ticket.areas.create', 'description' => 'Crear Areas'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.ticket.areas.edit', 'description' => 'Editar Areas'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.ticket.areas.destroy', 'description' => 'Eliminar Areas'])->syncRoles([$role1, $role2]);


        $permission = Permission::create(['name' => 'admin.ticket.users.index', 'description' => 'Ver listado de Usuarios'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.users.create', 'description' => 'Crear Usuarios'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.users.edit', 'description' => 'Editar Usuarios'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.users.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]); 
        
        $permission = Permission::create(['name' => 'admin.ticket.tickets.index', 'description' => 'Ver listado de Tickets'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.tickets.create', 'description' => 'Crear Tickets'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.tickets.edit', 'description' => 'Editar Tickets'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.tickets.destroy', 'description' => 'Eliminar Tickets'])->syncRoles([$role1]); 

        $permission = Permission::create(['name' => 'admin.ticket.tickets.mygroup', 'description' => 'Ver los Tickets de mi Grupo'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.ticket.tickets.myticket', 'description' => 'Ver los tickets que se me asignaron'])->syncRoles([$role1]);
        

        $permission = Permission::create(['name' => 'admin.ticket.userassignments.index', 'description' => 'Ver listado de asignaciones de tickets a usuarios'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.userassignments.create', 'description' => 'Crear asignaciones de tickets a usuarios'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.userassignments.edit', 'description' => 'Editar asignaciones de tickets a usuarios'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.userassignments.destroy', 'description' => 'Eliminar asignaciones de tickets a usuarios'])->syncRoles([$role1]);
        
        $permission = Permission::create(['name' => 'admin.ticket.assignments.index', 'description' => 'Ver listado de asignaciones de tickets a grupos de soporte'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.assignments.create', 'description' => 'Crear asignaciones de tickets a grupos de soporte'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.assignments.edit', 'description' => 'Editar asignaciones de tickets a grupos de soporte'])->syncRoles([$role1]); 
        $permission = Permission::create(['name' => 'admin.ticket.assignments.destroy', 'description' => 'Eliminar asignaciones de tickets a grupos de soporte'])->syncRoles([$role1]); 
    

/*         $permission = Permission::create(['name' => 'admin.data.export.pdf', 'description' => 'Ver listado de datos para exportar en pdf'])->syncRoles([$role1]); 
 */        /* $permission = Permission::create(['name' => 'admin.data.export.prueba', 'description' => 'Exportar datos en pdf'])->syncRoles([$role1]);  */
    
    }
}
