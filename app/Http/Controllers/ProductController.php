<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Validation\Validate;


class ProductController extends Controller
{
    /*
    {
    path: '/',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/products',
    name: 'Products',
    component: ProductsList
  },
  {
    path: '/products/add',
    name: 'AddProduct',
    component: AddProduct
  },
  {
    path: '/products/edit/:id',
    name: 'EditProduct',
    component: EditProduct,
    props: true
  },
  {
    path: '/orders',
    name: 'Orders',
    component: Orders
  },
  {
    path: '/customers',
    name: 'Customers',
    component: Customers
  },
  {
    path: '/analytics',
    name: 'Analytics',
    component: Analytics
  },
  {
    path: '/settings',
    name: 'Settings',
    component: Settings
  }
    
    */ 
     public function getproduct(){
    
        return Inertia::render('inventory/Products');
           
    }
    public function index(){
         
        return Inertia::render('product/index',[
            'products' =>  product::all()->map(function ($products) {
                return [
                    'id' => $products->id,
                    'name' => $products->name,
                    'detail' => $products->detail
                ];

              })
        ]);
           
    }
    public function Create(){
    
        return Inertia::render('product/Create');
           
    }
    public function edit(Product $product){
    
        return Inertia::render('product/EditProduct', [
            'product' => $product
        ]);
           
    }

public function store(ProductRequest $request){
        Product::create($request->validated());
        return to_route('products.index');
    }
    


    public function update(Product $product, ProductRequest $request){
       
         
        $product->update($request->validated());
       return  to_route('products.index', ['message' => 'product added sucessful']);
         
    }
    public function show(Product $product){
       
        return inertia::render('product/show', [
            'product' => $product
        ]);
    }  
     public function destroy(Product $product){
        
         $product->delete();
         return to_route('products.index');
      
    }



}
