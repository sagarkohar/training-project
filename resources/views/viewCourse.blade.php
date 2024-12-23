@extends("masterLayout")

@section("content")



<h5>Course: {{ $data->title }}</h5>


    <div class="card shadow-sm p-3 mb-5 bg-white rounded">


        @csrf
        <div class="row">

            <div class="row">
                <div class="col-4">
                    <label for="Title">Title</label><br>
                    <input type="text" value="{{ $data->title }}" name="title" id="">

                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="col-4">
                    <label for="status">Status</label>
                    <br>
                    <select name="status" id="status">
                        <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>




            </div>
        </div>


        <div class="mt-5">
            <label for="description">Description</label><br>
            <textarea name="description" id="description" cols="80" rows="10">{{ $data->description }}"</textarea>

            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <script>
            CKEDITOR.replace('description');

        </script>


        <div class="row mt-3">
            <!-- Department Dropdown -->
            <div class="col-4">
                <label for="department">Department</label>
                <br><br>
                <select name="department" id="department">
                    <option value="computer" {{ $data->department == 'computer' ? 'selected' : '' }}>Computer</option>
                    <option value="biology" {{ $data->department == 'biology' ? 'selected' : '' }}>Biology</option>
                </select>
            </div>

            <!-- Designation Dropdown -->
            <div class="col-4">
                <label for="designation">Designation</label>
                <br><br>
                <select name="designation" id="designation">
                    <option value="designation1" {{ $data->Designation == 'designation1' ? 'selected' : '' }}>Designation1</option>
                    <option value="design2" {{ $data->Designation == 'design2' ? 'selected' : '' }}>Designation2</option>
                </select>
            </div>

            <!-- Brands Dropdown -->
            <div class="col-4">
                <label for="brand">Brands</label>
                <br><br>
                <select name="brand" id="brand">
                    <option value="brand1" {{ $data->Brand == 'brand1' ? 'selected' : '' }}>Brand1</option>
                    <option value="brand2" {{ $data->Brand == 'brand2' ? 'selected' : '' }}>Brand2</option>
                </select>
            </div>
        </div>



        <div class="row mt-5">
            <!-- Stores Dropdown -->
            <div class="col-4">
                <label for="store">Stores</label>
                <br><br>
                <select name="store" id="store">
                    <option value="store1" {{ $data->store == 'store1' ? 'selected' : '' }}>Store1</option>
                    <option value="store2" {{ $data->store == 'store2' ? 'selected' : '' }}>Store2</option>
                </select>
            </div>

            <!-- Skills Dropdown -->
            <div class="col-4">
                <label for="skill">Skills</label>
                <br><br>
                <select name="skill" id="skill">
                    <option value="skill1" {{ $data->skill == 'skill1' ? 'selected' : '' }}>Skill1</option>
                    <option value="skill2" {{ $data->skill == 'skill2' ? 'selected' : '' }}>Skill2</option>
                </select>
            </div>

            <!-- Rating Dropdown -->
            <div class="col-4">
                <label for="rating">Rating</label>
                <br><br>
                <select name="rating" id="rating">
                    <option value="1" {{ $data->rating == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $data->rating == '2' ? 'selected' : '' }}>2</option>
                </select>
            </div>
        </div>




    </div>



    {{-- Modal --}}

    <div id="add_module">


        @foreach ($data->getModule as $cm )

        <div class="card shadow-sm border-2 p-3 mb-5 bg-white rounded" id="module-{{ $cm->id }}">
            <div class="row">
                <div class="row">
                    <div class="col-8">
                        <h3>Modal{{ $cm->id }}</h3>

                    </div>
                    <div class="col-4">

                        <button class="remove-module btn btn-danger" data-module-id="{{ $cm->id}}">Remove</button>
                    </div>
                </div>

                <div class="row">



                    <div class="col-4">
                        <label for="Title"> Title</label><br>
                        <input type="text" value="{{ $cm->title }}" name="module[{{ $cm->id }}][title]" id="title">
                    </div>
                    <div class="col-4">
                        <label for="status">Status</label><br>
                        <select name="module[{{ $cm->id }}][status]" id="status">
                            <option value="1" {{ $cm->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $cm->status == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>


                    <div class="col-4">
                        <label for="status">Is Testable</label><br>
                        <select name="module[{{ $cm->id }}][isTestable]" id="mySelect" onchange="handleSelectChange({{ $cm->id }})">
                            <option value="yes" {{ $cm->test_title != null ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ $cm->test_title == null ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                </div>
                <div class="mt-5">
                    <label for="description">Description</label><br>
                    <textarea name="module[{{ $cm->id }}][description]" id="description" cols="80" rows="10">{{ $cm->description }}</textarea>

                </div>
                <hr>


                {{-- Add Material  --}}





                @foreach ($cm->getMaterial as $mt )
                <div data-module-id=" material-{{ $cm->id }}" class="material-{{ $mt->id }}">

                    <div class="row box box-shadow border-2" id="de-module{{ $cm->id }}-material{{ $mt->id }}-type">

                        <div class="row">
                            <div class="col-8">
                                <h3>Material{{ $mt->id }}</h3>

                            </div>
                            <div class="col-4">

                                <div class="btn btn-danger removeMaterial" data-module-id="module{{ $cm->id }}-material{{ $mt->id }}-type">
                                    Remove
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <select name="materialtype" id="module{{ $cm->id }}-material{{ $mt->id }}-type" onchange="materialType({{  $cm->id}},{{ $mt->id }})">
                                <option value="file" {{ $mt->file=="AnyDesk.exe"? 'selected' : ' ' }}>File</option>
                                <option value="link" {{ $mt->file!="AnyDesk.exe"? 'selected' : ' ' }}>Link</option>

                            </select>
                        </div>
                        <div class="col-6 my-5">
                            @if ($mt->file=="AnyDesk.exe")
                            <h3>File is: {{ $mt->file }}</h3>
                            <input type="file" name="module[{{ $cm->id }}][file][]" id="module{{$cm->id }}-material{{ $mt->id }}-file">

                            @else
                            <input type="text" value={{$mt->link }} name="module[{{ $cm->id }}][link][]" id="module{{$cm->id }}-material{{ $mt->id }}-link">


                            @endif



                        </div>
                    </div>
                    <hr>




                </div>

                @endforeach


                <button type="button" class="btn btn-outline-primary w-25 add-material" data-module-id="{{ $cm->id }}"> + Add Material</button>

                <hr>



                <!-- Test Section -->
                <div class="test" id="testSection{{ $cm->id }}" style="{{ $cm->test_title ? '' : 'display:none' }}">
                    <h5>Course Test {{ $cm->id }}</h5>

                    <div class="row">
                        <div class="col-6">
                            <label for="test">Test Title</label><br>
                            <input type="text" class="w-50" value="{{ $cm->test_title }}" name="module[{{ $cm->id }}][test-title]" id="test">
                        </div>

                        <div class="col-6">
                            <label for="test">Duration</label><br>


                            <input type="text" class="w-50" value="{{ $cm->test_duration }}" name="module[{{ $cm->id }}][test-duration]" id="test">

                        </div>
                    </div>

                    <label for="instruction">Instructions:</label>
                    <textarea class="w-100" name="module[{{ $cm->id }}][instruction]" id="instruction" cols="30" rows="8">{{ $cm->instruction }}</textarea>



                    {{-- Question sections --}}



                    @foreach ($cm->getQuestion as $qns )


                    <div class="questions box questionContainer-{{ $cm->id }}" id="">


                        <div class="border-2" id="qns-module-{{ $cm->id }}question-{{ $qns->id}}">

                            <div class="row mt-3">
                                <div class="col-8">
                                    <h5>Question{{ $qns->id }}</h5>


                                    <input type="text" value="{{ $qns->question }}" name="module[{{ $cm->id }}][question][]" class="w-100" placeholder="Enter your question" required>


                                </div>
                                <div class="col-4">

                                    <label for="status">Status</label><br>
                                    <select name="module[{{ $cm->id }}][question-status][]" id="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-6">
                                    <input type="checkbox" value="1" {{ $qns->answer=='1'? 'checked':' ' }} name="module[{{ $cm->id }}][answer][]" id="qns${q}Option1">


                                    <input type="text" name="module[{{ $cm->id }}][option1][]" value="{{ $qns->getOption->option1 }}" placeholder="Option 1" class="w-75" required>


                                </div>
                                <div class="col-6">
                                    <input type="checkbox" value="2" {{ $qns->answer=='2'? 'checked':' ' }} name="module[{{ $cm->id }}][answer][]" id="qns${q}Option2">


                                    <input type="text" name="module[{{ $cm->id }}][option2][]" value="{{ $qns->getOption->option2 }}" placeholder="Option 2" class="w-75" required>



                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-6">
                                    <input type="checkbox" value="3" {{ $qns->answer=='3'? 'checked':' ' }} name="module[{{ $cm->id }}][answer][]" id="qns${q}Option3">



                                    <input type="text" name="module[{{ $cm->id }}][option3][]" value="{{ $qns->getOption->option3 }}" placeholder="Option 3" class="w-75" required>


                                </div>
                                <div class="col-6">
                                    <input type="checkbox" {{ $qns->answer=='4'? 'checked':' ' }} value="4" name="module[{{ $cm->id }}][answer][]" id="qns${q}Option4">



                                    <input type="text" name="module[{{ $cm->id }}][option4][]" placeholder="Option 4" value="{{ $qns->getOption->option4 }}" class="w-75" required>



                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-danger removeQuestion" data-question-id="module-{{ $cm->id }}question-{{ $qns->id}}">Remove</button>

                        </div>




                    </div>

                    @endforeach

                    <button type="button" class="btn btn-outline-primary w-25 my-3 addQuestion" data-module-id="{{ $cm->id }}">+ Add Question</button>
                </div>

            </div>
        </div>
        


    </div>



    @endforeach










@endsection

