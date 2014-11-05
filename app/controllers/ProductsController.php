<?php

class ProductsController extends BaseController{
    public function __construct() {
    $this->beforeFilter('csrf', array('on' => 'post'));
  }
  /**
   * Show all categories
   * @return Response
   */
  public function getIndex() {
    $categories = array();
    foreach(Category::all() as $category){
        $categories[$category->id] = $category->name;
    }
    
    return View::make('products/index')
      ->with('products', Product::all())->with('categories', $categories);
  }
  /**
   * Create a new category
   * @return Response
   */
  public function postCreate() {
    $validator = Validator::make(Input::all(), Product::$rules);
    if($validator->passes()) {
      $product = new Product;
      $product->category_id = Input::get('category_id');
      $product->title = Input::get('title');
      $product->description = Input::get('description');
      $product->price = Input::get('price');
      
      $image = Input::file('image');
      $fileName = date('Y-m-d-H:i:s'). "-". $image->getClientOriginalName();
      Image::make($image->getRealPath())->resize(468, 249)->save('public/img/products/'. $fileName);
      $product->image = 'img/products/'. $fileName;
      $product->save();
      
      return Redirect::to('admin/products/index')
        ->with('message', 'Product Created');
    }
    return Redirect::to('admin/products/index')
      ->with('message', 'Something went wrong')
      ->withErrors($validator)
      ->withInput();
  }
  /**
   * Delete selected category
   * @return Response
   */
  public function postDestroy() {
    $product = Product::find(Input::get('id'));
    if($product) {
        File::delete('public/'. $product->image);
        $product->delete();
        return Redirect::to('admin/products/index')
        ->with('message', 'Product has been Deleted');
    }
    return Redirect::to('admin/products/index')->with('message','Something went wrong, please try again');
  }
  public function postToggleAvailablity(){
    $product = Product::find(Input::get('id'));
    
    if($product) {
        $product->availablity = Input::get('availablity');
        $product->save();
        return Redirect::to('admin/products/index')->with('message', 'Product Updated');
    }
    return Redirect::to('admin/products/index')->with('message', 'Invalid Product');
  }
}