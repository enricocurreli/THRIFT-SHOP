<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_revisor')->after('is_admin')->default(0);
        });

        $admin = [
            'name'  => 'thriftshop',
            'email'  => 'thriftshop@mail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
            'is_revisor' => true       
        ];

        User::create($admin);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_revisor');
        });

        
    }
};
