<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_data(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:30'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string'],
            'stID' => ['required', 'integer', 'max:9999999999'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);


        try {
            $data = new Post();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->department = $request->department;
            $data->stID = $request->stID;

            $imageName = null;

            if (isset($request->image)) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $data->image = $imageName;
            }


            $data->save();
            return redirect()->back()->with('success', 'Your post has been created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'There was an error while saving the data.']);
        }
    }

    public function read_data(){
        $data = Post::all();
        return view("student.readStudentData", compact("data"));
    }

    // PostController.php

    public function editMethod($id)
    {
        $student = Post::find($id); // Find the student by ID
        return view('student.editStudent', compact('student')); // Return the edit view with student data
    }

    public function updateMethod(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:30'],
                'phone' => ['required', 'numeric'],
                'address' => ['required', 'string', 'max:255'],
                'department' => ['required', 'string'],
                'stID' => ['required', 'integer', 'max:9999999999'],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
            ]);


            // Find the student by ID
            $data = Post::find($id);

            // Update the student data
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->department = $request->department;
            $data->stID = $request->stID;

            $imageName = null;

            if (isset($request->image)) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $data->image = $imageName;
            }


            // Save the updated data to the database
            $data->save();

            // Redirect with success message
            return redirect()->route('read-student-data')->with('success', 'Student data updated successfully.');

        } catch (\Exception $e) {
            // Log the exception error message


            // Return redirect with error message
            return redirect()->back()->with('error', 'There was an error while updating the data.');
        }
    }



    // PostController.php
    public function deleteMethod($id)
    {
        try {
            $student = Post::find($id); // Find the student by ID

            // Delete the student image if it exists
            if ($student->image && file_exists(public_path('images/' . $student->image))) {
                unlink(public_path('images/' . $student->image));
            }

            $student->delete(); // Delete the student record

            return redirect()->route('read-student-data')->with('success', 'Student deleted successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'There was an error while deleting the student.');
        }
    }
}
