////Updating Column Attributes

Schema::table('users', function (Blueprint $table) {
$table->string('name', 50)->change();
});
Schema::table('users', function (Blueprint $table) {
$table->string('name', 50)->nullable()->change();
});

//RENAMING

Schema::table('users', function (Blueprint $table) {
$table->renameColumn('from', 'to');
});

//DROP
Schema::table('users', function (Blueprint $table) {
$table->dropColumn(['votes', 'avatar', 'location']);
});