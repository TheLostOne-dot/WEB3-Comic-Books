<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('products')->insert(array(
            'product_name'=>'Detectives comics Volume 3 Issue 1016',
            'stock'=>5,
            'price'=>4.99,
            'created_at'=>date('Y-m-d H:m:s')   ,
            'updated_at'=>date('Y-m-d H:m:s')
        ));

        DB::table('products')->insert(array(
            'product_name'=>'Detectives comics Volume 3 Issue 1017',
            'stock'=>6,
            'price'=>4.99,
            'created_at'=>date('Y-m-d H:m:s')   ,
            'updated_at'=>date('Y-m-d H:m:s')
        ));

        DB::table('products')->insert(array(
            'product_name'=>'Detectives comics Volume 3 Issue 1018',
            'stock'=>8,
            'price'=>4.99,
            'created_at'=>date('Y-m-d H:m:s')   ,
            'updated_at'=>date('Y-m-d H:m:s')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('products')->where('product_id','=',1)->delete();
        DB::table('products')->where('product_id','=',2)->delete();
        DB::table('products')->where('product_id','=',3)->delete();
    }
}
