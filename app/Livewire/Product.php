<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as Prd;
use App\Http\Requests\ProductRequest;

class Product extends Component
{

    public $products, $name, $price, $qty, $id;
    public $isOpen = 0;




    public function render()
    {

        $this->products = Prd::all();
        return view('livewire.product');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();

    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function resetInputFields(){
        $this->name = '';
        $this->price = '';
        $this->qty = '';
        $this->id = '';
    }

    public function store()
    {
        $validatedData = $this->validate((new ProductRequest)->rules());

            Prd::updateOrCreate(['id' => $this->id], $validatedData );
            session()->flash('message', $this->id ? 'Product Updated Successfully.' : 'Product Created Successfully.');
            $this->closeModal();
            $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Prd::findOrFail($id);
        $this->id = $id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->qty = $product->qty;

        $this->openModal();
    }

    public function delete($id)
    {
        Prd::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
        }
}
