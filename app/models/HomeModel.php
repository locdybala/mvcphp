<?php 

class HomeModel {
    protected $table='';

    public function getAll(){
        $data=[
            'Item1',
            'Item2',
            'Item3',
            'Item4',

        ];
        return $data;
    }
}