<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.4.0
 * ---------------------------------------------------------------------------- */

/**
 * Class Migration_Initial_database_structure
 *
 * @property CI_DB_query_builder db
 * @property CI_DB_forge dbforge
 */
class Migration_Initial_database_structure extends CI_Migration {
    /**
     * Upgrade method.
     */
    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'book_datetime' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'start_datetime' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'end_datetime' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'hash' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'is_unavailable' => [
                'type' => 'TINYINT',
                'constraint' => '4',
                'default' => '0'
            ],
            'id_users_provider' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'id_users_customer' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'id_services' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'id_google_calendar' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('id_users_provider');
        $this->dbforge->add_key('id_users_customer');
        $this->dbforge->add_key('id_services');
        $this->dbforge->create_table('ea_appointments', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'is_admin' => [
                'type' => 'TINYINT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'appointments' => [
                'type' => 'INT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'customers' => [
                'type' => 'INT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'services' => [
                'type' => 'INT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'users' => [
                'type' => 'INT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'system_settings' => [
                'type' => 'INT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'user_settings' => [
                'type' => 'INT',
                'constraint' => '4',
                'null' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ea_roles', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id_users_secretary' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
            ],
            'id_users_provider' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
            ]
        ]);
        $this->dbforge->add_key('id_users_secretary', TRUE);
        $this->dbforge->add_key('id_users_provider', TRUE);
        $this->dbforge->create_table('ea_secretaries_providers', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'duration' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => TRUE
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'id_service_categories' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'null' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('id_service_categories');
        $this->dbforge->create_table('ea_services', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id_users' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
            ],
            'id_services' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
            ]
        ]);
        $this->dbforge->add_key('id_users', TRUE);
        $this->dbforge->add_key('id_services', TRUE);
        $this->dbforge->create_table('ea_services_providers', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('id_service_categories');
        $this->dbforge->create_table('ea_service_categories', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ],
            'value' => [
                'type' => 'LONGTEXT',
                'null' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ea_settings', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ],
            'mobile_number' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE
            ],
            'zip_code' => [
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => TRUE
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'id_roles' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('id_roles');
        $this->dbforge->create_table('ea_users', TRUE, ['engine' => 'InnoDB']);

        $this->dbforge->add_field([
            'id_users' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => TRUE
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ],
            'salt' => [
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ],
            'working_plan' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'notifications' => [
                'type' => 'TINYINT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'google_sync' => [
                'type' => 'TINYINT',
                'constraint' => '4',
                'null' => TRUE
            ],
            'google_token' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'google_calendar' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE
            ],
            'sync_past_days' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
                'default' => '5'
            ],
            'sync_future_days' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
                'default' => '5'
            ],
        ]);
        $this->dbforge->add_key('id_users', TRUE);
        $this->dbforge->create_table('ea_user_settings', TRUE, ['engine' => 'InnoDB']);

        $this->db->query('
            ALTER TABLE `ea_appointments`
              ADD CONSTRAINT `ea_appointments_ibfk_2` FOREIGN KEY (`id_users_customer`) REFERENCES `ea_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
              ADD CONSTRAINT `ea_appointments_ibfk_3` FOREIGN KEY (`id_services`) REFERENCES `ea_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
              ADD CONSTRAINT `ea_appointments_ibfk_4` FOREIGN KEY (`id_users_provider`) REFERENCES `ea_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ');

        $this->db->query('
            ALTER TABLE `ea_secretaries_providers`
              ADD CONSTRAINT `fk_ea_secretaries_providers_1` FOREIGN KEY (`id_users_secretary`) REFERENCES `ea_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
              ADD CONSTRAINT `fk_ea_secretaries_providers_2` FOREIGN KEY (`id_users_provider`) REFERENCES `ea_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ');

        $this->db->query('
            ALTER TABLE `ea_services`
              ADD CONSTRAINT `ea_services_ibfk_1` FOREIGN KEY (`id_service_categories`) REFERENCES `ea_service_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
        ');

        $this->db->query('
            ALTER TABLE `ea_services_providers`
              ADD CONSTRAINT `ea_services_providers_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `ea_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
              ADD CONSTRAINT `ea_services_providers_ibfk_2` FOREIGN KEY (`id_services`) REFERENCES `ea_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ');

        $this->db->query('
            ALTER TABLE `ea_users`
              ADD CONSTRAINT `ea_users_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `ea_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ');

        $this->db->query('
            ALTER TABLE `ea_user_settings`
              ADD CONSTRAINT `ea_user_settings_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `ea_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

        ');

        $this->db->insert('ea_roles', [
            'name' => 'Administrator',
            'slug' => 'admin',
            'is_admin' => TRUE,
            'appointments' => 15,
            'customers' => 15,
            'services' => 15,
            'users' => 15,
            'system_settings' => 15,
            'user_settings' => 15,
        ]);

        $this->db->insert('ea_roles', [
            'name' => 'Provider',
            'slug' => 'provider',
            'is_admin' => FALSE,
            'appointments' => 15,
            'customers' => 15,
            'services' => 0,
            'users' => 0,
            'system_settings' => 0,
            'user_settings' => 15,
        ]);

        $this->db->insert('ea_roles', [
            'name' => 'Customer',
            'slug' => 'customer',
            'is_admin' => FALSE,
            'appointments' => 0,
            'customers' => 0,
            'services' => 0,
            'users' => 0,
            'system_settings' => 0,
            'user_settings' => 0,
        ]);

        $this->db->insert('ea_roles', [
            'name' => 'Secretary',
            'slug' => 'secretary',
            'is_admin' => FALSE,
            'appointments' => 15,
            'customers' => 15,
            'services' => 0,
            'users' => 0,
            'system_settings' => 0,
            'user_settings' => 15,
        ]);

        $this->db->insert('ea_settings', [
            'name' => 'company_working_plan',
            'value' => '{"monday":{"start":"09:00","end":"18:00","breaks":[{"start":"11:20","end":"11:30"},{"start":"14:30","end":"15:00"}]},"tuesday":{"start":"09:00","end":"18:00","breaks":[{"start":"11:20","end":"11:30"},{"start":"14:30","end":"15:00"}]},"wednesday":{"start":"09:00","end":"18:00","breaks":[{"start":"11:20","end":"11:30"},{"start":"14:30","end":"15:00"}]},"thursday":{"start":"09:00","end":"18:00","breaks":[{"start":"11:20","end":"11:30"},{"start":"14:30","end":"15:00"}]},"friday":{"start":"09:00","end":"18:00","breaks":[{"start":"11:20","end":"11:30"},{"start":"14:30","end":"15:00"}]},"saturday":{"start":"09:00","end":"18:00","breaks":[{"start":"11:20","end":"11:30"},{"start":"14:30","end":"15:00"}]},"sunday":{"start":"09:00","end":"18:00","breaks":[{"start":"11:20","end":"11:30"},{"start":"14:30","end":"15:00"}]}}'
        ]);

        $this->db->insert('ea_settings', [
            'name' => 'book_advance_timeout',
            'value' => '30'
        ]);
    }

    /**
     * Downgrade method.
     */
    public function down()
    {
        $this->db->query('ALTER TABLE `ea_appointments` DROP FOREIGN KEY `ea_appointments_ibfk_2`');
        $this->db->query('ALTER TABLE `ea_appointments` DROP FOREIGN KEY `ea_appointments_ibfk_3`');
        $this->db->query('ALTER TABLE `ea_appointments` DROP FOREIGN KEY `ea_appointments_ibfk_4`');
        $this->db->query('ALTER TABLE `ea_secretaries_providers` DROP FOREIGN KEY `fk_ea_secretaries_providers_1`');
        $this->db->query('ALTER TABLE `ea_secretaries_providers` DROP FOREIGN KEY `fk_ea_secretaries_providers_2`');
        $this->db->query('ALTER TABLE `ea_services_providers` DROP FOREIGN KEY `ea_services_providers_ibfk_1`');
        $this->db->query('ALTER TABLE `ea_services_providers` DROP FOREIGN KEY `ea_services_providers_ibfk_2`');
        $this->db->query('ALTER TABLE `ea_services` DROP FOREIGN KEY `ea_services_ibfk_1`');
        $this->db->query('ALTER TABLE `ea_users` DROP FOREIGN KEY `ea_users_ibfk_1`');
        $this->db->query('ALTER TABLE `ea_user_settings` DROP FOREIGN KEY `ea_user_settings_ibfk_1`');

        $this->dbforge->drop_table('ea_appointments');
        $this->dbforge->drop_table('ea_roles');
        $this->dbforge->drop_table('ea_secretaries_providers');
        $this->dbforge->drop_table('ea_services');
        $this->dbforge->drop_table('ea_service_categories');
        $this->dbforge->drop_table('ea_services_providers');
        $this->dbforge->drop_table('ea_settings');
        $this->dbforge->drop_table('ea_user_settings');
        $this->dbforge->drop_table('ea_users');
    }
}