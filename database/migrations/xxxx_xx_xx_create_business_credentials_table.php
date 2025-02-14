use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCredentialsTable extends Migration
{
    public function up()
    {
        Schema::create('business_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('db_host');
            $table->string('db_port')->default('3306');
            $table->string('db_name');
            $table->string('db_username');
            $table->string('db_password')->nullable();
            // other fields
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_credentials');
    }
} 