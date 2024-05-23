<div class="d-flex justify-content-center align-items-center full-height">
    <div class="card w-50">
        <div class="card-body">
            <form>
                {{ $id ? 'Edit Product' : 'Create Product' }}
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" wire:model="name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model="price" placeholder="Enter Price">
                    @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="qty">Quantity:</label>
                    <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" wire:model="qty" placeholder="Enter Quantity">
                    @error('qty')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Save</button>
                    <button type="button" class="btn btn-secondary" wire:click="closeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
