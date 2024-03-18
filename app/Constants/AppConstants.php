<?php

namespace App\Constants;

use App\Constants\Finance\TransactionConstants;

class AppConstants
{
    const SUDO_EMAIL = "sudo@hotel.com";
    

    const MAX_PROFILE_PIC_SIZE = 2048;

    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHERS = 'Others';

  
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

    const SUPER_ADMIN = 'Super Admin';
    const SUPER_USER = 'Super User';
    const ACCOUNT = 'Account';
    const SALES_POINT = 'Sales Point';
    const STORE = 'Store';
    const RESERVATION_AGENT = 'Reservation Agent';
    const GUEST_RELATIONS_MANAGER = 'Guest Relations Manager';
    const BANQUET_MANAGER = 'Banquet Manager';
    const SPA_MANAGER = 'Spa Manager';
    const REVENUE_MANAGER = 'Revenue Manager';
    const IT_MANAGER = 'IT Manager';
    const QUALITY_ASSURANCE_MANAGER = 'Quality Assurance Manager';
    const TRAINING_MANAGER = 'Training Manager';
    const ENVIRONMENTAL_MANAGER = 'Environmental Manager';
    const ENTERTAINMENT_COORDINATOR = 'Entertainment Coordinator';

    const ROLE_OPTIONS = [
        self::SUPER_ADMIN,
        self::SUPER_USER,
        self::ACCOUNT,
        self::SALES_POINT,
        self::STORE,
        self::RESERVATION_AGENT,
        self::GUEST_RELATIONS_MANAGER,
        self::BANQUET_MANAGER,
        self::SPA_MANAGER,
        self::REVENUE_MANAGER,
        self::IT_MANAGER,
        self::QUALITY_ASSURANCE_MANAGER,
        self::TRAINING_MANAGER,
        self::ENVIRONMENTAL_MANAGER,
        self::ENTERTAINMENT_COORDINATOR,
    ];
}