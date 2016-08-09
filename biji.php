模型

	1, 创建
			app/goods.php
		<!-- php artisan make:model Goods -->
			app/Models/Goods.php
		<!-- php artisan make:model Models/Goods -->

			app/Models/Goods.php  -m顺便生成数据库迁移
		php artisan make:model Models/Goods -m
		
	2, 创建了 model模型  创建了数据库迁移 
		/database/migrations/2016_08_08_055530_create_goods_table.php
	
		public function up()
		{
		    Schema::create('goods', function (Blueprint $table) {
		        $table->increments('id')->comment('商品主键');
		        $table->string('title')->comment('商品标题');
		        $table->timestamps();//创建时间   修改时间
		    });
		}

		public function down()
		{
		    Schema::drop('goods');
		}

	//运行迁移
		php artisan migrate
	//如果进行了修改 
		php artisan migrate:refresh
		注意:不会保留数据



数据填充
	1,创建
		php artisan make:seeder GoodsTableSeeder

	2,运行数据填充
	php artisan db:seed --class=GoodsTableSeeder

表单请求验证
	1,创建表单请求验证类
		php artisan make:request GoodsPostRequest

	2, /app/Http/Requests/GoodsPostRequest

	 public function authorize()
    {
        return false;//注意改成true
    }



    3,定以验证规则
    	rules(){
    		return[
				
    		]
    	}

    4,使用,在方法中把Request替换成当前表单验证类
    注意 命名空间使用use App\Http\Requests\GoodsPostRequest;

    5,自定义错误信息
    	在类中定义方法 messages

	



