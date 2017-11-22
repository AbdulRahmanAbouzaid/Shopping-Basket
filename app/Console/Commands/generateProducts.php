<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ProductSeed;
use Faker\Factory as FakerFactory;

class generateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate dummy prodcuts' data with Faker";

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

        $length = (int)$this->ask('How many products you want to generate?');

        

        if(!is_integer($length) || $length <= 0){

            $this->error('Must be an positive and integer number');

        }else{

            $lang = $this->choice('What is the Language you want ?', ['Arabic', 'French']);

            $this->generate($length, $lang);

            $this->info('Product(s) Generated !');
        }

    }




    public function generate($length, $language)
    {
        
        $languages = [

            'Arabic' => 'ar_SA',

            'French' => 'fr_FR',

        ];

        $lang_code =  $languages[$language];

        $faker = FakerFactory::create($lang_code);

        factory(ProductSeed::class, $length)->create([

            'name_ar' => $faker->name

        ]);

    }
}
