<?php

namespace App\Constants;

use App\Constants\Finance\TransactionConstants;

class AppConstants
{
    
    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHERS = 'Others';

    // Titles

    const Mr = 'Mr';
    const Mrs = 'Mrs';
    const Miss = 'Others';

  
    const DEFAULT_PASSWORD = "123456";

    const WEB_GUARD = "web";
    const ADMIN_GUARD = "admin";

    const PERMISSION_GUARDS = [
        // self::ADMIN_GUARD => "Admin Guard",
        self::WEB_GUARD => "Web Guard"
    ];

    const GENDER_OPTIONS = [
        self::MALE,
        self::FEMALE,
        self::OTHERS
    ];

  
    const ADMIN_PAGINATION_SIZE = 50;

    const BOOL_OPTIONS = [
        "1" => "Yes",
        "0" => "No"
    ];

    // Users role

        const SUPER_ADMIN = 'Super_Admin';
        const SUPER_USER = 'Super_User';
        const ACCOUNT = 'Account';
        const SALES_POINT = 'Sales_Point';
        const STORE = 'Store';
        const RESERVATION_AGENT = 'Reservation_Agent';
        const GUEST_RELATIONS_MANAGER = 'Guest_Relations_Manager';
        const BANQUET_MANAGER = 'Banquet_Manager';
        const SPA_MANAGER = 'Spa_Manager';
        const REVENUE_MANAGER = 'Revenue_Manager';
        const IT_MANAGER = 'IT_Manager';
        const QUALITY_ASSURANCE_MANAGER = 'Quality_Assurance_Manager';
        const TRAINING_MANAGER = 'Training_Manager';
        const ENVIRONMENTAL_MANAGER = 'Environmental_Manager';
        const ENTERTAINMENT_COORDINATOR = 'Entertainment_Coordinator';
        
        const ROLE_OPTIONS = [
            self::SUPER_ADMIN => self::SUPER_ADMIN,
            self::SUPER_USER => self::SUPER_USER,
            self::ACCOUNT => self::ACCOUNT,
            self::SALES_POINT => self::SALES_POINT,
            self::STORE => self::STORE,
            self::RESERVATION_AGENT => self::RESERVATION_AGENT,
            self::GUEST_RELATIONS_MANAGER => self::GUEST_RELATIONS_MANAGER,
            self::BANQUET_MANAGER => self::BANQUET_MANAGER,
            self::SPA_MANAGER => self::SPA_MANAGER,
            self::REVENUE_MANAGER => self::REVENUE_MANAGER,
            self::IT_MANAGER => self::IT_MANAGER,
            self::QUALITY_ASSURANCE_MANAGER => self::QUALITY_ASSURANCE_MANAGER,
            self::TRAINING_MANAGER => self::TRAINING_MANAGER,
            self::ENVIRONMENTAL_MANAGER => self::ENVIRONMENTAL_MANAGER,
            self::ENTERTAINMENT_COORDINATOR => self::ENTERTAINMENT_COORDINATOR,
        ];
      
}