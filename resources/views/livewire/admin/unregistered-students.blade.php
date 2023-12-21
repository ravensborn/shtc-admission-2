<div>

    <div class="mt-4"></div>

    <div class="rounded text-end p-3 mb-3" style="background-color: #f8f9fa;">
        <h4>پەیوەندی نەکراوەکان</h4>


        <hr>

    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div
                        x-data="{ uploading: false, progress: 0 }"
                        x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false"
                        x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <div x-show="!uploading">
                            <label for="file">Upload Excel File</label>
                            <input type="file" class="form-control" wire:model="file">
                            @error('file')
                            <div class="mt-1">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                            @enderror
                            <small class="text-secondary mt-1">
                                Allowed file types are xlsx and xls. The file cannot be larger than 5MB.
                            </small>
                            <div class="text-secondary mt-1">
                                <a href="{{ asset('examples/example.xlsx') }}" download>Download Template</a>
                            </div>
                            <div class="text-secondary mt-1">
                                <a href="{{ asset('examples/example-with-data.xlsx') }}" download>Download Template with Data</a>
                            </div>
                        </div>


                       @if(auth()->user()->hasRole('admin'))
                            <div class="mt-3">
                                <label for="department_id">Department</label>
                                <select wire:model="department_id" id="department_id" class="form-control">
                                    <option value="0">Select an option</option>
                                    @foreach($availableDepartments as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <div class="mt-1">
                                    <small class="text-danger">{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                           @endif


                        <!-- Progress Bar -->
                        <div x-show="uploading">
                            <progress class="w-100" max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>

                    <div class="mt-3">
                        @if($file)
                            <button class="btn btn-info" wire:loading.attr="disabled" wire:target="startImport"
                                    wire:click="startImport">Import
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">

            <div class="row my-2">
               <div class="col-4">
                   <label for="search">Search</label>
                   <input wire:model.debounce.500ms="search" type="search" id="search" class="form-control">
               </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Date Imported</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->code }}</td>
                            <td>{{ $student->department_name }}</td>
                            <td>{{ $student->date->format('Y-m-d') }}</td>
                            <td>{{ $student->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger" wire:click="deleteItem({{ $student->id }})">
                                    @if($student->id == $deletingItemId)
                                        Are you sure?
                                    @else
                                        Delete
                                    @endif
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="5">There are no items at the moment.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>


</div>
