<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="w-2/5 p-4 mx-auto border rounded-md shadow-md">
        @csrf
        <div class="flex items-center justify-between py-2">
            <label for="name">Name</label>
            <input name="name" type="text" placeholder="Student Name"  class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
        </div>
        <div class="flex items-center justify-between py-2">
            <label for="email">Email</label>
            <input name="email" type="email" placeholder="Email "  class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
        </div>
        <div class="flex items-center justify-between py-2">
            <label for="phone">Phone</label>
            <input name="phone" type="number" placeholder="Number"  class="w-3/5 p-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-gray-300">
        </div>
        <div class="flex items-center justify-between py-2">
            <label for="address">Address</label>
            <input name="address" type="text" placeholder="address"  class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
        </div>
        <div class="flex items-center justify-between py-2">
            <label for="department">Department</label>
            <input name="department" type="text" placeholder="department"  class="w-3/5 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300">
        </div>
        <div class="flex items-center justify-between py-2">
            <label for="stID">Student ID</label>
            <input name="stID" type="number" placeholder="Student ID"  class="w-3/5 p-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-gray-300">
        </div>
        <button class="w-full py-3 text-xl font-bold bg-orange-600 text-[#FFF] rounded-md mt-5">Update</button>
    </form>
</body>
</html>
