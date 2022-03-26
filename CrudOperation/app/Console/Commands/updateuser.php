<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class updateuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      DB::tabel("user_details")->insert(['username'=>"sandeep Balpande"]);
        echo "User Details Added Succussfully!!";
    }
}
