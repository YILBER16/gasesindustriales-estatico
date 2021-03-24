<?php

namespace App\DataProviders;

abstract class testDataProvider
{
    public static function users_roles()
    {
        return [
            ['user_id' => '1','role_id' => '1']
            
        ];
    }
    public static function users_permissions()
    {
        return [
            ['user_id' => '1','permission_id' => '1']
            
        ];
    }
    public static function users()
    {
        return [
            ['id' => '1','name' => 'admin','email' => 'admin@gmail.com','email_verified_at' => '','password' => '$2y$10$DnGlF4droUtMzRRjQOdU6Oz1J5ruHlWAhCnuR9iZf6UKQ7Ktt2fg2','remember_token' => '','created_at' => '2021-03-19 17:02:54','updated_at' => '2021-03-19 17:02:54']
            
        ];
    }
    public static function roles_permissions()
    {
        return [
            ['user_id' => '1','permission_id' => '1']
            
        ];
    }
    public static function roles()
    {
        return [
            ['id' => '1','name' => 'Admin','slug' => 'admin','created_at' => '2021-03-19 17:02:37','updated_at' => '2021-03-19 17:02:37']
            
        ];
    }
   
}
