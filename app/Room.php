<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facade\DB;

class Room extends Model
{
    public function getAvailableRooms($start_date,$end_date){
        $availableRooms = DB::table('rooms as r')->select('r.id','r.name')
                            ->whereRaw('r.id NOT IN (
                                SELECT b.room_id
                                FROM reservation b
                                WHERE NOT(
                                    b.date_in>{$end_date} or
                                    b.date_out<{$start_date}
                                )
                            )');

        return $availableRooms;

    }


    public function getAvailableRooms($start_date, $end_date){
        $availableRooms = DB::table('rooms as r')
                        -> select('r.id','r.name')
                        ->whereRaw(
                            'r.id NOT IN(
                                SELECT b.room_id
                                FROM reservation b
                                WHERE NOT (
                                    b.date_in>$end_date OR
                                    b.date_out<$start_date
                                )
                            )'
                        );
        return $availableRooms;
}
