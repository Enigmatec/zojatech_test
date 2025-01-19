<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = "super_admin";
    case ADMIN = "admin";
    case LINE_MANAGER = "line_manager";
    case STAFF = "staff";
}
