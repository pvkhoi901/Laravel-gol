<?php

namespace App\Services\Settings;

use Spatie\LaravelSettings\Settings;

class SystemSettings extends Settings
{
    public string $enrollment_id_title;
    public string $lifeline_ebb_plan_enable;
    public string $display_combo_plan_for_lifeline;
    public string $display_combo_plan_for_ebb;
    public string $life_line_dulicate_and_email_alt_phone_required;
    public string $allow_duplicate_enrolment_with_source;
    public string $allow_business_address_service_address;

    public static function group(): string
    {
        return 'system';
    }
}
