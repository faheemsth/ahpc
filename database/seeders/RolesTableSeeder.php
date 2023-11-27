<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => UserRoleEnum::ADMIN,
                'guard_name' => 'web',
                // 'permissions' => [
                //     'dashboard_show',
                //     'dash_stats_widget',
                //     'dash_customer_widget',
                //     'dash_company_widget',
                //     'dash_helpdesk_widget',
                //     'dash_flagged_widget',
                //     'dash_user_activity_widget',
                //     'dash_staff_widget',
                //     'dash_follow_up_widget',
                //     'customers_show',
                //     'customer_create',
                //     'customer_delete',
                //     'customer_edit',
                //     'companies_show',
                //     'company_create',
                //     'company_delete',
                //     'company_edit',
                //     'invoicing_show',
                //     'rfq_show',
                //     'product_show',
                //     'add_product',
                //     'product_categories',
                //     'product_attributes',
                //     'order_show',
                //     'subscription_show',
                //     'helpdesk_show',
                //     'create_ticket',
                //     'trash_tickets',
                //     'delete_tickets_permanent',
                //     'merge_tickets',
                //     'edit_ticket',
                //     'compose_reply',
                //     'add_notes',
                //     'edit_notes',
                //     'delete_notes',
                //     'view_notes',
                //     'view_follow_up',
                //     'add_follow_up',
                //     'edit_follow_up',
                //     'delete_follow_up',
                //     'change_sla',
                //     'reset_sla',
                //     'assets_show',
                //     'asset_types_show',
                //     'asset_types_create',
                //     'asset_types_edit',
                //     'asset_types_delete',
                //     'asset_create',
                //     'asset_edit',
                //     'asset_delete',
                //     'leads_show',
                //     'leads_add',
                //     'leads_edit',
                //     'leads_delete',
                //     'leads_add_notes',
                //     'leads_edit_notes',
                //     'leads_delete_notes',
                //     'leads_create_user_account',
                //     'leads_add_tag',
                //     'leads_import',
                //     'staff_show',
                //     'staff_add',
                //     'staff_edit',
                //     'staff_delete',
                //     'roles_show',
                //     'roles_add',
                //     'roles_edit',
                //     'roles_delete',
                //     'integration_show',
                //     'integration_add',
                //     'integration_edit',
                //     'integration_delete',
                //     'settings_show',
                //     'livechat_show',
                //     'licensing_show',
                //     'staff_report_show',
                //     'helpdesk_report_show',
                // ]
            ],
            [
                'name' => UserRoleEnum::INSTITUTE,
                'guard_name' => 'web',
                // 'permissions' => [
                //     'customer_profile_show',
                //     'customer_assets_show',
                //     'customer_tickets_show',
                //     'customer_submit_ticket',
                //     'customer_payment_methods',
                //     'customer_addresses',
                //     'customer_orders',
                //     'customer_subscriptions',
                // ]
            ],
        ];

        foreach ($roles as $r) {
            $role = Role::updateOrCreate([
                'name' => $r['name'],
            ], [
                'name' => $r['name'],
                'guard_name' => $r['guard_name'],
            ]);

            // $permi45ssions = Permission::all()->whereIn('name', $r['permissions']);
            // $role->permissions()->sync($permissions);
        }
    }

}
