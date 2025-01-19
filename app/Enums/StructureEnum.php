<?php

namespace App\Enums;

enum StructureEnum: string
{
    case SUBSIDIARY = "subsidiary";
    case ZONAL_OFFICES = "zonal_offices";
    case BRANCHES = "branches";
    case DEPARTMENT = "department";
    case UNIT = "unit";
}
