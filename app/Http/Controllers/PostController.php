<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_data(Request $request)
    {
        try {
            // Log the incoming request data
            \Log::info($request->all());

            // Validate the request data
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:30'],
                'phone' => ['required', 'numeric'],
                'address' => ['required', 'string', 'max:255'],
                'department' => ['required', 'string'],
                'stID' => ['required', 'integer', 'max:9999999999'],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
            ]);

            // Create a new Post instance and save the data
            $data = new Post();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->department = $request->department;
            $data->stID = $request->stID;

            // Handle image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $filename);
                $data->image = $filename;
            }

            // Save data to the database
            $data->save();

            // Log successful save
            \Log::info('Student data saved successfully.', ['data' => $data]);

            // Redirect with success message
            return redirect()->back()->with('success', 'Your post has been created successfully.');

        } catch (\Exception $e) {
            // Log the exception error message
            \Log::error('Error while saving student data: ' . $e->getMessage(), ['error' => $e]);

            // Return redirect with error message
            return redirect()->back()->with('error', 'There was an error while saving the data.');
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
            // Validate the request data
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:30'],
                'phone' => ['required', 'numeric'],
                'address' => ['required', 'string', 'max:255'],
                'department' => ['required', 'string'],
                'stID' => ['required', 'integer', 'max:9999999999'],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
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

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($data->image && file_exists(public_path('images/' . $data->image))) {
                    unlink(public_path('images/' . $data->image));
                }

                // Upload the new image
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $filename);
                $data->image = $filename;
            }

            // Save the updated data to the database
            $data->save();

            // Redirect with success message
            return redirect()->route('read-student-data')->with('success', 'Student data updated successfully.');

        } catch (\Exception $e) {
            // Log the exception error message
            \Log::error('Error while updating student data: ' . $e->getMessage(), ['error' => $e]);

            // Return redirect with error message
            return redirect()->back()->with('error', 'There was an error while updating the data.');
        }
    }
}
