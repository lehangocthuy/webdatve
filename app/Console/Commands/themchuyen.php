<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class themchuyen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:themchuyen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thêm chuyến xe mỗi ngày';

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
        $ngaydi = Carbon::now();
        $formatngaydi = $ngaydi->toDateString();
        $ngayden = Carbon::tomorrow();
        $formatngayden = $ngayden->toDateString();
        DB::table('chuyenxe')->insert([
    ['giodi' => '05:00:00' , 'gioden' => '14:00:00', 'ngaydi' => $formatngaydi ,'ngayden' => $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '1'],
    ['giodi' => '08:15:00' , 'gioden' => '17:15:00' , 'ngaydi' => $formatngaydi,'ngayden' => $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '2'],
    ['giodi' => '11:15:00' , 'gioden' => '20:15:00', 'ngaydi' => $formatngaydi,'ngayden' =>  $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '3'],
    ['giodi' => '14:15:00' , 'gioden' => '23:15:00', 'ngaydi' => $formatngaydi, 'ngayden' => $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '4'],
    ['giodi' => '17:15:00' , 'gioden' => '02:15:00', 'ngaydi' => $formatngaydi,'ngayden' => $formatngayden, 'idtuyenxe' => '1', 'idxe' => '5'],
    ['giodi' => '20:15:00' , 'gioden' => '05:15:00', 'ngaydi' => $formatngaydi,'ngayden' => $formatngayden, 'idtuyenxe' => '1', 'idxe' => '6'],
        ]);
    }
}
