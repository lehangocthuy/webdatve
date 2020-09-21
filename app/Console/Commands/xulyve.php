<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Ve;
use Carbon\Carbon;

class xulyve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:xulyve';

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
        //
        $time = Carbon::now();
        $timeformat = $time->ToTimeString();
        $giohientai = substr($timeformat,0,2).substr($timeformat,3,2); // Lay theo gio theo phut.
        $ve = DB::table('ve')->where('trangthai',null)
        ->get();
        $update = [];
        foreach($ve as $v)
        {
            $giocreated = $v->created_at;
            $giosql = substr($v->created_at, 11, 2).substr($v->created_at, 14, 2); // Lay theo gio theo phut
            $gio = $giohientai - $giosql;
            if($gio >= '100' ) //hour = 100 ; 5 hour = 5*100 ||   minute = 100; 5 minutes = 5*100
            {
               $up = DB::table('ve')->where('idve',$v->idve)
                ->update(array('trangthai'=>'2'));
                $update[$v->idve] = $up;
            }
        }
    }
}
