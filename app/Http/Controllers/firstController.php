<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\material;
use App\Models\module;
use App\Models\options;
use App\Models\question;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class firstController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function learningHome(Request $request)
    {
        if ($request->ajax()) {
            $courses = Course::query();

            return DataTables::of($courses)
                ->addColumn('action', function ($row) {
                    // Generate action buttons with inline styling
                    $editBtn = '<a href="' . route('edit-course', $row->id) . '" class="btn btn-sm btn-primary" style="display:inline-block; margin-right:5px;">Edit</a>';
                    $viewBtn = '<a href="' . route('view-course', $row->id) . '" class="btn btn-sm btn-info" style="display:inline-block; margin-right:5px;">View</a>';
                    $deleteBtn = '<a href="' . route('delete-course', $row->id) . '" class="btn btn-sm btn-danger" style="display:inline-block;">Delete</a>';

                    return $editBtn . $viewBtn . $deleteBtn;
                })


                ->editColumn('created_at', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i A');
                })
                ->editColumn('status', function ($row) {
                    // Add alert-danger class if status is not 'active'
                    $class = $row->status == "active" ? '' : 'alert-warning';
                    return '<span class="' . $class . '">' . $row->status . '</span>';
                })
                ->rawColumns(['action', 'status']) // Render HTML in 'action' and 'status' columns

                ->smart(true)  // Search on runtime if ture. if false then search if all the words matches
                // ->startsWithSearch()  // Search the keyword start with

                ->make(true);
        }

        return view('learning_home');
    }






    public function addCourse()
    {
        return view('addcourse');
    }


    public function addMaterial($module_id, $material_id)
    {
        return response()->json([
            'material_page' => view("material", compact('material_id', 'module_id'))->render()
        ]);
    }


    public function addModule($module_id)
    {
        return response()->json([
            'module_page' => view("addModule", compact("module_id"))->render()
        ]);
    }

    public function addQuestion($module_id, $question_no)
    {

        return response()->json([
            'addQuestionPage' => view("addQuestion", compact("module_id", "question_no"))->render()
        ]);
    }

    public function addNewCourse(Request $request)
    {
        // Validate main course data
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:50',
            'status' => 'required',
            'description' => 'required|min:10',
            'department' => 'required',
            'designation' => 'required',
            'brand' => 'required',
            'store' => 'required',
            'skill' => 'required',
            'rating' => 'required|integer|between:1,5',

            // Modules validation
            'module.*.title' => 'required|min:3|max:50',
            'module.*.status' => 'required|in:active,inactive',
            'module.*.description' => 'required|min:10',
            'module.*.test-title' => 'required|min:3|max:50',
            'module.*.test-duration' => 'required|integer|min:1',
            'module.*.instruction' => 'required|min:10',

            // Materials (files and links) validation
            'module.*.file.*' => 'nullable|file|max:10240', // Example: max file size 10MB
            'module.*.link.*' => 'nullable|url',

            // Questions validation
            'module.*.question.*' => 'required|min:5',
            'module.*.answer.*' => 'required|min:1',
            'module.*.question-status.*' => 'required|in:active,inactive',
            'module.*.option1.*' => 'required|min:1',
            'module.*.option2.*' => 'required|min:1',
            'module.*.option3.*' => 'required|min:1',
            'module.*.option4.*' => 'required|min:1',
        ]);

        // Main course creation
        $course = new Course();
        $course->title = $validatedData['title'];
        $course->status = $validatedData['status'];
        $course->description = $validatedData['description'];
        $course->department = $validatedData['department'];
        $course->designation = $validatedData['designation'];
        $course->brand = $validatedData['brand'];
        $course->store = $validatedData['store'];
        $course->skill = $validatedData['skill'];
        $course->rating = $validatedData['rating'];
        $course->user = "shivsagarkohar";
        $course->save();

        // Handle modules (same logic)
        // ...

        // After successful insertion, return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Course and related data added successfully!',
        ]);
    }








    public function deleteCourse($id)
    {

        course::where("id", $id)->first()->delete();

        return redirect()->back();
    }


    public function viewCourse($id)
    {
        $data = Course::with('getModule.getMaterial', 'getModule.getQuestion.getOption')->find($id);

        return view("viewCourse", compact("data"));
    }

    public function editCourse($id)
    {



        $data = Course::with('getModule.getMaterial', 'getModule.getQuestion.getOption')->find($id);

        return view("editCourse", compact("data"));
    }


    public function updateCourse(Request $request, $courseId)
    {
        $course = course::where("id", $courseId)->first();

        $modules = module::where("course_id", $courseId)->get();

        foreach ($modules as $module) {

            material::where("module_Id", $module->id)->delete();
            $questions = question::where("module_id", $module->id)->get();

            foreach ($questions as $qns) {
                options::where("question_id", $qns->id)->delete();
                $qns->delete();
            }
            $module->delete();
        }


        $course->title = $request->input('title');
        $course->status = $request->input('status');
        $course->description = $request->input('description');
        $course->department = $request->input('department');
        $course->designation = $request->input('designation');
        $course->brand = $request->input('brand');
        $course->store = $request->input('store');
        $course->skill = $request->input('skill');
        $course->rating = $request->input('rating');
        $course->user = "shivsagarkohar";
        $course->save();

        // Handle modules if provided
        if ($request->has('module') && is_array($request->module)) {
            foreach ($request->module as $md) {
                // Create new module
                $module = new Module();
                $module->title = $md['title'];
                $module->status = $md['status'];
                $module->description = $md['description'];
                $module->test_title = $md['test-title'];
                $module->test_duration = $md['test-duration'];
                $module->instruction = $md['instruction'];
                $module->course_id = $course->id;
                $module->save();

                // Handle files if provided
                if (isset($md['file']) && is_array($md['file'])) {
                    foreach ($md['file'] as $f) {
                        if (!empty($f)) { // Check if the file is not null or empty
                            $material = new Material();
                            $material->file = $f;
                            $material->module_id = $module->id;
                            $material->save();
                        }
                    }
                }

                // Handle links if provided
                if (isset($md['link']) && is_array($md['link'])) {
                    foreach ($md['link'] as $l) {
                        if (!empty($l)) { // Check if the link is not null or empty
                            $material = new Material();
                            $material->link = $l;
                            $material->module_id = $module->id;
                            $material->save();
                        }
                    }
                }

                // Handle questions, answers, and statuses
                if (
                    isset($md['question'], $md['answer'], $md['question-status']) &&
                    is_array($md['question']) &&
                    is_array($md['answer']) &&
                    is_array($md['question-status'])
                ) {

                    foreach ($md['question'] as $index => $question) {
                        // Ensure corresponding elements exist
                        $answer = $md['answer'][$index] ?? null;
                        $status = $md['question-status'][$index] ?? null;
                        $op1 = $md['option1'][$index] ?? null;
                        $op2 = $md['option2'][$index] ?? null;
                        $op3 = $md['option3'][$index] ?? null;
                        $op4 = $md['option4'][$index] ?? null;




                        // Skip if any value is null
                        if ($question === null || $answer === null || $status === null) {
                            continue;
                        }



                        $insert_question = new question();

                        $insert_question->question = $question;
                        $insert_question->answer = $answer;
                        $insert_question->status = $status;
                        $insert_question->module_id = $module->id;

                        $insert_question->save();


                        $insert_option = new options();

                        $insert_option->question_id = $insert_question->id;
                        $insert_option->option1 = $op1;
                        $insert_option->option2 = $op2;
                        $insert_option->option3 = $op3;
                        $insert_option->option4 = $op4;

                        $insert_option->save();
                    }
                }
            }
        }



        return redirect("learning-home");
    }
}
