<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        // Schema::create('sign_company', function(Blueprint $table) {
        //     $table->increments('company_id')->index('company_id');
        //     $table->integer('company_parent_id', false)->length(10);
        //     $table->tinyInteger('company_partner', false)->length(4)->index('company_partner');
        //     $table->integer('company_partner_date', false)->length(11);
        //     $table->unsignedInteger('plan_id', false)->length(10)->index('plan_id');
        //     $table->integer('company_billing_date', false)->length(11);
        //     $table->integer('company_billing_date_monthly', false)->length(11);
        //     $table->integer('company_billing_plan_update', false)->length(11);
        //     $table->enum('company_billing_cycle', ['monthly', 'annual', 'quaterly'])->default('monthly');
        //     $table->double('company_billing_balance', 7, 2);
        //     $table->integer('company_billing_failed', false)->length(11);
        //     $table->tinyInteger('company_billing_overage', false)->length(4);
        //     $table->enum('company_usage_cycle', ['monthly', 'annual'])->default('monthly');
        //     $table->unsignedInteger('company_credit', false)->length(10)->default('5');
        //     $table->string('company_name')->index('company_name');
        //     $table->string('company_email')->index('company_email');
        //     $table->string('company_email_code', 20);
        //     $table->string('company_account_email');
        //     $table->string('company_vat', 50);
        //     $table->string('company_paypal_email');
        //     $table->integer('company_payout_limit', false)->length(11);
        //     $table->string('company_address_line_1');
        //     $table->string('company_address_line_2');
        //     $table->string('company_address_town');
        //     $table->string('company_address_city');
        //     $table->string('company_address_postcode', 25);
        //     $table->unsignedInteger('country_id', false)->length(3);
        //     $table->string('company_telephone', 50);
        //     $table->string('company_api_key', 32);
        //     $table->string('company_api_notify_url');
        //     $table->string('company_logo', 32);
        //     $table->unsignedInteger('company_created', false)->length(10)->index('company_created');
        //     $table->unsignedInteger('company_last_updated', false)->length(10);
        //     $table->integer('company_last_login', false)->length(11);
        //     $table->integer('company_login_count', false)->length(11);
        //     $table->unsignedInteger('company_removed', false)->length(10);
        //     $table->unsignedInteger('company_upgraded', false)->length(11)->index('company_upgraded');
        //     $table->unsignedInteger('company_cancelled', false)->length(11);
        //     $table->string('company_xero', 50);
        //     $table->integer('coupon_id', false)->length(11);
        //     $table->integer('plan_trial', false)->length(11);
        //     $table->string('company_referral', 5)->nullable();
        //     $table->integer('kashflow_id', false)->length(11);
        //     $table->integer('signature_more_info', false)->length(11)->default(1);
        //     $table->integer('company_pdf_attach', false)->length(11)->default(0);
        //     $table->integer('company_signature_type', false)->length(11)->default(1);
        //     $table->tinyInteger('company_email_notifications', false)->length(4);
        //     $table->integer('company_staff_assigned', false)->length(11)->index('company_staff_assigned');
        //     $table->tinyInteger('company_tour_enable', false)->length(4)->default(1);
        //     $table->integer('company_api_suspended', false)->length(11);
        //     $table->integer('company_main_email_notifications', false)->length(11);
        //     $table->string('company_signature_default', 10)->default('drawn');
        //     $table->integer('company_consumer_regulations', false)->length(11)->default(0);
        //     $table->integer('company_remind_hours', false)->length(11)->default(0);
        //     $table->text('company_notes');
        //     $table->string('company_signup_referral', 200);
        //     $table->string('company_signup_source', 100);
        //     $table->string('company_signup_medium', 100);
        //     $table->string('company_signup_campaign', 100);
        //     $table->text('company_signup_browser');
        //     $table->tinyInteger('company_signature_format_typed', false)->length(4)->default(1);
        //     $table->tinyInteger('company_signature_format_drawn', false)->length(4)->default(1);
        //     $table->tinyInteger('company_signature_format_upload', false)->length(4)->default(1);
        //     $table->integer('company_hide_email_pdf_audit', false)->length(11)->default(0);
        //     $table->string('company_branding_colour', 7);
        //     $table->integer('company_auto_reminder_default_hours', false)->length(11)->default(48);
        //     $table->integer('company_auto_expire_default_hours', false)->length(11)->default(48);
        //     $table->integer('company_questions_signing', false)->length(11)->default(1);
        //     $table->integer('company_user_return_email', false)->length(11)->default(0);
        //     $table->integer('company_10_day_review_date', false)->length(11)->default(0);
        //     $table->tinyInteger('company_ip_whitelist', false)->length(1)->default(0);
        //     $table->tinyInteger('company_new_signing_page', false)->length(4)->default(0);
        //     // Constraints declaration
        // });
    }

    public function down()
    {
        // Schema::drop('companies');
    }
}
