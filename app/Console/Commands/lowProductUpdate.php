<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\product;
use App\Notifications\lowProductNotification;
use Notification;
use App\Models\{admin,manager};
class lowProductUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check for products that are low and send an email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      try{
       $prods =  product::where('reorder_quantity','=>','quantity')->get();
       $mail = manager::first();
       foreach($prods as $products)
       {

       Notification::send($mail, new lowProductNotification($products));
       }
      }catch(\throwable)
      {
        return 'error';
      }
    }
}
