<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class columnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
            $table->string('national_id')->unique()->nullable();
            $table->string('lang')->nullable();
            $table->string('arabic_name')->nullable();
            $table->string('english_name')->nullable();
            $table->string('dob_hijri')->nullable();
            $table->string('dob')->nullable();
            $table->string('arabic_nationality')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationality_code')->nullable();
            $table->string('gender')->nullable();
            $table->string('arabic_first_name')->nullable();
            $table->string('english_first_name')->nullable();
            $table->string('arabic_family_name')->nullable();
            $table->string('english_family_name')->nullable();
            $table->string('arabic_father_name')->nullable();
            $table->string('english_father_name')->nullable();
            $table->string('arabic_grand_father_name')->nullable();
            $table->string('english_grand_father_name')->nullable();
            $table->string('assurance_level')->nullable();
            $table->date('card_issue_date_gregorian')->nullable();
            $table->string('card_issue_date_hijri')->nullable();
            $table->string('issue_location_ar')->nullable();
            $table->string('issue_location_en')->nullable();
            $table->date('iqama_expiry_date_gregorian')->nullable();
            $table->string('iqama_expiry_date_hijri')->nullable();
            $table->date('id_expiry_date_gregorian')->nullable();
            $table->string('id_expiry_date_hijri')->nullable();
            $table->string('version_number')->nullable();
            $table->string('id_version_no')->nullable();
            $table->string('mobile_number')->nullable();
            $table->datetime('mobile_number_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
