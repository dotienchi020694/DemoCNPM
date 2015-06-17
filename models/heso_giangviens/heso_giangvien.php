<?php
class Heso_giangvien{
    
    private $hv_id;
    private $hs_heso;
    private $hs_mota;
    private $hs_sonamyc;
    private $hs_sonamdk;
    private $nh_id;
   
    function __construct() {
    }
    
    //SET_METHOD
    
    function set_hv_id($hv_id){
        $this->hv_id=$hv_id;
    }
    function set_hs_heso($hs_heso){
        $this->hs_heso=$hs_heso;
    }
    
    function set_hs_mota($hs_mota){
        $this->hs_mota=$hs_mota;
    }
    function set_hs_sonamyc($hs_sonamyc)
    {
        $this->hs_sonamyc=$hs_sonamyc;
    }

    function set_hs_sonamdk($hs_sonamdk)
    {
        $this->hs_sonamdk=$hs_sonamdk;
    }
    
    function set_nh_id($nh_id)
    {
        $this->nh_id=$nh_id;
    }
    
    //GET_METHOD
    
    function get_hv_id(){
        return $this->hv_id;
    }
    function get_hs_heso(){
        return $this->hs_heso;
    }
    function get_hs_mota(){
        return $this->hs_mota;
    }
    function get_hs_sonamyc(){
        return $this->hs_sonamyc;
    }
    function get_hs_sonamdk(){
        return $this->hs_sonamdk;
    }
    function get_nh_id(){
        return $this->nh_id;
    }
}
?>