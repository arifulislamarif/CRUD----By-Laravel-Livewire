<div>

    <div class="row justify-content-center">

        <div class="col-8">
            <div class="card">
            <div class="card-header bg-dark text-light">
                    Post List
                </div>
                <div class="card-body">
                    @if (session()->has('delete'))
                    <div class="alert alert-success">
                        {{ session('delete') }}
                    </div>
                    @endif
                    @if (session()->has('update'))
                    <div class="alert alert-success">
                        {{ session('update') }}
                    </div>
                    @endif
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->last_name }}</td>                         
                            <td>
                                <button wire:click="edit_student({{$item->id}})" class="btn btn-outline-info">Edit</button>
                                <button wire:click="delete_student({{$item->id}})" class="btn btn-outline-danger" >Delete</button>
                            </td>                         
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $student->links() }}
                </div>
            </div>
        </div>
        
        <div class="col-4">
            @if (Session::get('update_data'))
                
           
            <div class="card mt-4">
                <div class="card-header bg-dark text-light">
                    Edit Student
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updatestudent">
                        <div class="modal-body">
                           
                            <input hidden class="form-control" wire:model="edit_id">
                        <div class="form-group">
                            <label>First Name</label>
                            <input wire:model="edit_first_name" type="text" class="form-control @error('edit_first_name') is-invalid @enderror" placeholder="Enter First Name">
                            @error('edit_first_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input wire:model="edit_last_name" type="text" class="form-control @error('edit_last_name') is-invalid @enderror" placeholder="Enter Last Name">
                            @error('edit_last_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select wire:model="edit_gender" class="custom-select @error('edit_gender') is-invalid @enderror">
                                <option>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            @error('edit_gender') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Update Student</button>
                        </div>
                    
                    </form>
                </div>
                
            </div>
            @endif
            
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Add Student
                    <button onclick="add_modal_show()" class="btn btn-primary" type="button"></button>
                </div>
                <div class="card-body">
                    @if (session()->has('insert'))
                        <div class="alert alert-success">
                            {{ session('insert') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="savepost">
                        <div class="modal-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name">
                            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name">
                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select wire:model="gender" class="custom-select @error('gender') is-invalid @enderror">
                                <option>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Save Post</button>
                        </div>
                    
                    </form>
                </div>
                
            </div>

            
        </div>

        
    </div>
 

</div>
