<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;
class CreateForeignKeys extends Migration {

	public function up()
	{
		

       

      

        Schema::table('parent_attachments', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('cascade');
        });

	}

	public function down()
	{
		
       
	}
}
