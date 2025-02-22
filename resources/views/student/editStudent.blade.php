<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="container mx-auto">
        <h1 class="py-10 text-3xl font-bold text-center text-red-500">Edit Student Information</h1>
        <form action="{{ route('update_data', $student->id) }}" method="POST" enctype="multipart/form-data" class="w-2/5 p-4 mx-auto border rounded-md shadow-md">
            @csrf
            <div class="flex items-center justify-between py-2">
                <label for="name">Name</label>
                <input name="name" type="text" placeholder="Student Name" value="{{ $student->name }}" required class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
            </div>
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-between py-2">
                <label for="email">Email</label>
                <input name="email" type="email" placeholder="Email" value="{{ $student->email }}" required class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
            </div>
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-between py-2">
                <label for="phone">Phone</label>
                <input name="phone" type="number" placeholder="Number" value="{{ $student->phone }}" required class="w-3/5 p-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-gray-300">
            </div>
            @error('phone')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-between py-2">
                <label for="address">Address</label>
                <input name="address" type="text" placeholder="address" value="{{ $student->address }}" required class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
            </div>
            @error('address')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-between py-2">
                <label for="department">Department</label>
                <input name="department" type="text" placeholder="department" value="{{ $student->department }}" required class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
            </div>
            @error('department')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-between py-2">
                <label for="stID">Student ID</label>
                <input name="stID" type="number" placeholder="Student ID" value="{{ $student->stID }}" required class="w-3/5 p-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-gray-300">
            </div>
            @error('stID')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-between py-2">
                <label for="image">Student Image</label>
                <input name="image" type="file" class="w-3/5 p-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-gray-300">
            </div>
            @error('image')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

            <button class="w-full py-3 text-xl font-bold bg-orange-600 text-[#FFF] rounded-md mt-5">Update Student</button>
        </form>
    </div>
</body>
</html>
