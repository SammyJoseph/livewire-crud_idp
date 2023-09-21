<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products, $description, $quantity, $product_id;
    public $modal = false, $deleteModal = false, $toast = false;

    public function render()
    {
        $this->products = Product::orderBy('id', 'desc')->get();

        return view('livewire.products');
    }

    public function store()
    {
        $validate = $this->validate([
            'description'   => 'required|string|min:3',
            'quantity'      => 'required|numeric|between:1,100',
        ]);

        Product::updateOrCreate(['id' => $this->product_id], $validate);

        $this->closeModal();
        session()->flash('message', $this->product_id ? 'El registro se actualizó' : 'El registro se creó');
        $this->toast = true;
    }

    public function destroy()
    {
        $product = Product::find($this->product_id);
        $product->delete();
        $this->reset(['deleteModal']);
        session()->flash('message', 'El registro se eliminó');
        $this->toast = true;
    }

    public function createProductButton()
    {
        $this->clearInputs();
        $this->openModal();
    }

    public function editProductButton(Product $product)
    {
        $this->product_id   = $product->id;
        $this->description  = $product->description;
        $this->quantity     = $product->quantity;

        $this->openModal();
    }    

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function clearInputs()
    {
        $this->reset(['description', 'quantity', 'product_id']);
    }

    public function setDeleteData(Product $product)
    {
        $this->product_id = $product->id;
        $this->deleteModal = true;
    }
}
