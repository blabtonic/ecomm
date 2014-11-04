<?php

class Product extends Eloquent {
    
    protected $fillable = array('category_id', 'title', 'description', 'availability', 'price', 'image');
    
    public static $rules = array(
        'category_id'   => 'required|integer',
        'title'         => 'required|min:2',      
        'description'   => 'required|min:25',
        'price'         => 'required|numeric',
        'availability'  => 'integer',
        'image'         => 'required|image|mimes:jpeg,jpg,png,bmp,gif,tff,tiff'
    );
    
    public function category(){
        return $this->belongsTo('Category');    
    }
}
