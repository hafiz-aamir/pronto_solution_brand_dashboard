<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->id();
            $table->uuid()->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role_id');
            $table->string('brand_id');
            $table->longText('image')->nullable();
            $table->string('ip'); 
            $table->string('auth_id')->default('1');
            $table->integer('status')->default('1');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        
        });


        $now = Carbon::now();
        $password = bcrypt('@SuperAdmin!23#');
        $ipAddress = getHostByName(getHostName());
        $auth_id = Str::uuid();
        // Insert initial roles 
        $role = User::insert([
            ['uuid' => $auth_id, 'fname' => 'Super', 'lname' => 'Admin', 'email' => 'custombackend@gmail.com', 'password' => $password, 'phone' => '+92XX-XXXXXX',  'image' => '', 'role_id' => '1', 'auth_id' =>  $auth_id, 'email_verified_at' => null , 'ip' => $ipAddress, 'created_at' => $now, 'updated_at' => $now]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
