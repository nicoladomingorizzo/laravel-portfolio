<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // rimozione della colonna tools
            $table->dropColumn('tools');

            // aggiunta di type_id e la constrain
            $table->foreignId('type_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // ricreazione di tools
            $table->string('tools');
            // eliminazione della constrain
            $table->dropForeign('projects_type_id_foreign');
            //  eliminazione della colonna
            $table->dropColumn('type_id');
        });
    }
};
