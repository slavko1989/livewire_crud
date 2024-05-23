<div>
    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        @if($isOpen)
            @include('livewire.create')
        @endif
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="row mb-2">
                    <form wire:submit.prevent="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Products" wire:model="searchTerm">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-6">
                        <button wire:click="create()" class="btn btn-primary btn-sm float-right">Add New Product</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) > 0)
                                @foreach ($products as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->price }}</td>
                                        <td>{{ $p->qty }}</td>
                                        <td>
                                            <button wire:click="edit({{ $p->id }})" class="btn btn-primary btn-sm">Edit</button>
                                            <button wire:click="delete({{ $p->id }})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" align="center">No Product Found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id) {
            if (confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteProductListner', id);
        }
    </script>
</div>
